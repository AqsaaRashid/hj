<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Order;

class StripeController extends Controller
{

    public function checkout(Request $request)
{
    Stripe::setApiKey(env('STRIPE_SECRET'));

    $cart = session('cart', []);
    $customer = session('customer');

    if (empty($cart) || !$customer) {
        return response()->json([
            'error' => 'Session expired. Please try again.'
        ]);
    }

    $orderId = $request->order_id;

    $order = Order::find($orderId);

    if (!$order) {
        return response()->json([
            'error' => 'Order not found'
        ]);
    }
    if ($order->payment_status === 'paid') {
    return response()->json([
        'error' => 'Order already paid.'
    ]);
}

   $lineItems = [];

foreach ($cart as $item) {

    $addonTotal = 0;
    $addonText = '';

    if(isset($item['addons'])){

        foreach($item['addons'] as $addon){

            $addonTotal += $addon['price'];

            $addonText .= ' + '.$addon['name'];

        }

    }

    $unitPrice = ($item['price'] + $addonTotal) * 100;

    $lineItems[] = [
        'price_data' => [
            'currency' => 'usd',
            'product_data' => [
                'name' => $item['name'] . $addonText,
            ],
            'unit_amount' => (int)$unitPrice,
        ],
        'quantity' => $item['quantity'],
    ];
}

    $session = Session::create([
        'payment_method_types' => ['card'],
        'mode' => 'payment',
'customer_email' => $customer['email'] ?? null,
        'line_items' => $lineItems,
        'metadata' => [
            'order_id' => $order->id
        ],
        'success_url' => route('payment.success') . '?session_id={CHECKOUT_SESSION_ID}',
        'cancel_url' => route('payment.cancel'),
    ]);

    $order->update([
        'stripe_session_id' => $session->id
    ]);

    return response()->json([
        'id' => $session->id
    ]);
}
 
public function success(Request $request)
{
    Stripe::setApiKey(env('STRIPE_SECRET'));

    $sessionId = $request->get('session_id');

    if (!$sessionId) {
        return redirect()->route('home')->with('error','Payment session not found.');
    }

    // Get Stripe session
    $session = \Stripe\Checkout\Session::retrieve($sessionId);

    // Find order using saved stripe_session_id
    $order = Order::where('stripe_session_id', $sessionId)->first();

    if ($order && $session->payment_status === 'paid') {

        $order->payment_status = 'paid';
        $order->order_status = 'approved';

        $order->save();

        session()->forget(['cart','promo','customer']);
    }

return redirect('/payment-success')->with('success','Payment successful!');}
public function cancel()
{
    return view('payment-cancel');
}

}