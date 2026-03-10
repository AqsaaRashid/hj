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

   $subtotal = $this->calculateSubtotal($cart);

    $promo = session('promo');
    $discount = 0;

    if (empty($cart)) {
        session()->forget('promo');
    }

    $activeOffers = Offer::where('status', 1)
        ->where(function ($q) {
            $q->whereNull('expires_at')
              ->orWhere('expires_at', '>', now());
        })
        ->get();

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
$subtotal = $this->calculateSubtotal($cart);
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

$subtotal = $this->calculateSubtotal($cart);    $discount = session('promo')['discount'] ?? 0;
    $total = max($subtotal - $discount, 0);

    return view('payment', compact('cart','customer','subtotal','discount','total'));
}


public function clearAfterOrder()
{
    session()->forget(['cart','promo','customer']);
    return redirect()->route('home');
}


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



public function placeOrder(Request $request)
{
    $cart = session('cart', []);
    $customer = session('customer', []);

    if (empty($cart) || empty($customer)) {

        return response()->json([
            'success' => false,
            'message' => 'Session expired. Please try again.'
        ]);
    }

$subtotal = $this->calculateSubtotal($cart);    $discount = session('promo')['discount'] ?? 0;
    $total = max($subtotal - $discount, 0);


   $lastOrder = Order::latest()->first();

if ($lastOrder && $lastOrder->order_number) {
    $num = intval(substr($lastOrder->order_number, 5));
    $nextNumber = $num + 1;
} else {
    $nextNumber = 1;
}

$orderNumber = 'HJGH-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

    $paymentMethod = $request->payment_method ?? 'stripe';


    $order = Order::create([

        'order_number'   => $orderNumber,

        'customer_name'  => $customer['name'] ?? '',
        'customer_email' => $customer['email'] ?? '',
        'customer_phone' => $customer['phone'] ?? '',

        'street' => $customer['street'] ?? '',
        'city'   => $customer['city'] ?? '',
        'zip'    => $customer['zip'] ?? '',

        'subtotal' => $subtotal,
        'discount' => $discount,
        'total'    => $total,

    'payment_method' => 'stripe',
'payment_status' => 'pending',
'order_status'   => 'pending',
    ]);
    session(['order_id' => $order->id]);


   foreach ($cart as $item) {

    $orderItem = OrderItem::create([
        'order_id'     => $order->id,
        'product_name' => $item['name'],
        'price'        => $item['price'],
        'quantity'     => $item['quantity'],
    ]);

    if(isset($item['addons'])){

        foreach($item['addons'] as $addon){

            \App\Models\OrderItemAddon::create([
                'order_item_id' => $orderItem->id,
                'addon_name' => $addon['name'],
                'price' => $addon['price']
            ]);

        }

    }

}


    return response()->json([
        'success' => true,
        'order_id' => $order->id,
        'order_number' => $orderNumber
    ]);
}
private function calculateSubtotal($cart)
{
    $subtotal = 0;

    foreach ($cart as $item) {

        $addonTotal = 0;

        if (isset($item['addons'])) {
            foreach ($item['addons'] as $addon) {
                $addonTotal += $addon['price'];
            }
        }

        $subtotal += ($item['price'] + $addonTotal) * $item['quantity'];
    }

    return $subtotal;
}
}