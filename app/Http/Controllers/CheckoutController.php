<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Mail;
class CheckoutController extends Controller
{
    public function index()
{
    $cart = session('cart', []);

    $subtotal = collect($cart)->sum(function ($item) {
        return $item['price'] * $item['quantity'];
    });

    $promo = session('promo');
    $discount = 0;

    // Auto remove promo if cart empty
    if (empty($cart)) {
        session()->forget('promo');
    }

    // Get active offers
    $activeOffers = Offer::where('status', 1)
        ->where(function ($q) {
            $q->whereNull('expires_at')
              ->orWhere('expires_at', '>', now());
        })
        ->get();

    // Check if eligible for at least one offer
    $promoEligible = false;
    $nextMinimum = null;

    foreach ($activeOffers as $offer) {
        if (!$offer->min_order_amount || $subtotal >= $offer->min_order_amount) {
            $promoEligible = true;
            break;
        }

        if ($nextMinimum === null || $offer->min_order_amount < $nextMinimum) {
            $nextMinimum = $offer->min_order_amount;
        }
    }

    // Revalidate promo if exists
    if ($promo && $subtotal > 0) {

        $offer = $activeOffers->firstWhere('promo_code', $promo['code']);

        if (!$offer || ($offer->min_order_amount && $subtotal < $offer->min_order_amount)) {
            session()->forget('promo');
        } else {

            if ($offer->discount_type === 'percentage') {
                $discount = ($subtotal * $offer->discount_value) / 100;
            } else {
                $discount = $offer->discount_value;
            }

            session([
                'promo' => [
                    'code' => $offer->promo_code,
                    'discount' => $discount
                ]
            ]);
        }
    }

    $discount = session('promo')['discount'] ?? 0;
    $total = max($subtotal - $discount, 0);

    return view('checkout', compact(
        'cart',
        'subtotal',
        'discount',
        'total',
        'promoEligible',
        'nextMinimum'
    ));
}

    public function applyPromo(Request $request)
    {
        $code = strtoupper(trim($request->promo_code));

        if (!$code) {
            return response()->json([
                'success' => false,
                'message' => 'Please enter promo code'
            ]);
        }

        $offer = Offer::whereRaw('UPPER(promo_code) = ?', [$code])
            ->where('status', 1)
            ->where(function ($q) {
                $q->whereNull('expires_at')
                  ->orWhere('expires_at', '>', now());
            })
            ->first();

        if (!$offer) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or expired promo code'
            ]);
        }

        $cart = session('cart', []);
        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        if ($offer->min_order_amount && $subtotal < $offer->min_order_amount) {
            return response()->json([
                'success' => false,
                'message' => 'Minimum order amount not met'
            ]);
        }

        if ($offer->discount_type === 'percentage') {
            $discount = ($subtotal * $offer->discount_value) / 100;
        } else {
            $discount = $offer->discount_value;
        }

        session([
            'promo' => [
                'code' => $offer->promo_code,
                'discount' => $discount
            ]
        ]);

        return response()->json([
            'success' => true,
            'discount' => $discount
        ]);
    }

    public function storeCustomer(Request $request)
    {
        if (!$request->name || !$request->email) {
            return response()->json([
                'success' => false,
                'message' => 'Please fill required fields'
            ]);
        }

        session([
            'customer' => [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'street' => $request->street,
                'city' => $request->city,
                'zip' => $request->zip,
            ]
        ]);

        return response()->json(['success' => true]);
    }

    public function payment()
    {
        $cart = session('cart', []);
        $customer = session('customer');

        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        $discount = session('promo')['discount'] ?? 0;

        $total = max($subtotal - $discount, 0);

        return view('payment', compact('cart','customer','subtotal','discount','total'));
    }

    // Call this after successful order
    public function clearAfterOrder()
    {
        session()->forget(['cart','promo','customer']);
        return redirect()->route('home');
    }
    //////
public function next(Request $request)
{
    $cart = session('cart', []);

    if (empty($cart)) {
        return response()->json([
            'success' => false,
            'message' => 'Your cart is empty.'
        ]);
    }

    if (!$request->name || !$request->email) {
        return response()->json([
            'success' => false,
            'message' => 'Please fill required fields.'
        ]);
    }

    session([
        'customer' => [
            'name'   => $request->name,
            'email'  => $request->email,
            'phone'  => $request->phone,
            'street' => $request->street,
            'city'   => $request->city,
            'zip'    => $request->zip,
        ]
    ]);

    return response()->json(['success' => true]);
}

// placeorder
public function placeOrder(Request $request)
{
    $cart = session('cart', []);
    $customer = session('customer');

    if (empty($cart) || !$customer) {
        return response()->json([
            'success' => false,
            'message' => 'Session expired. Please try again.'
        ]);
    }

    $subtotal = collect($cart)->sum(fn ($item) => $item['price'] * $item['quantity']);
    $discount = session('promo')['discount'] ?? 0;
    $total = max($subtotal - $discount, 0);

    // Generate Order Number
    $lastOrder = Order::latest('id')->first();
    $nextNumber = $lastOrder ? ((int) substr($lastOrder->order_number, 5)) + 1 : 1;
    $orderNumber = 'HJGH-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

    $paymentMethod = $request->payment_method ?? 'cod';

    // Create Order
    $order = Order::create([
        'order_number'   => $orderNumber,

        'customer_name'  => $customer['name'],
        'customer_email' => $customer['email'],
        'customer_phone' => $customer['phone'] ?? '',

        'street' => $customer['street'] ?? '',
        'city'   => $customer['city'] ?? '',
        'zip'    => $customer['zip'] ?? '',

        'subtotal' => $subtotal,
        'discount' => $discount,
        'total'    => $total,

        'payment_method' => $paymentMethod,
        'payment_status' => 'pending',
        'order_status'   => 'pending',
    ]);

    // Save Order Items
    foreach ($cart as $item) {
        OrderItem::create([
            'order_id'     => $order->id,
            'product_name' => $item['name'],
            'price'        => $item['price'],
            'quantity'     => $item['quantity'],
        ]);
    }

    // 🔥 LOAD ITEMS FOR EMAIL
    $order->load('items');

    // 🔥 SEND CONFIRMATION EMAIL
    Mail::to($order->customer_email)
        ->send(new OrderConfirmationMail($order));

    // Clear session after everything succeeds
    session()->forget(['cart', 'promo', 'customer']);

    return response()->json([
        'success' => true,
        'order_number' => $orderNumber
    ]);
}
}