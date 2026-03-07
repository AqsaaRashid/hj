<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Webhook;
use App\Models\Order;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Mail;

class StripeWebhookController extends Controller
{

    public function handleWebhook(Request $request)
    {

        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');

        try {

            $event = Webhook::constructEvent(
                $payload,
                $sigHeader,
                $endpoint_secret
            );

        } catch (\Exception $e) {

            return response()->json([
                'error' => 'Webhook signature verification failed'
            ], 400);

        }

        // PAYMENT SUCCESS EVENT
        if ($event->type == 'checkout.session.completed') {

            $session = $event->data->object;

            // Get order id from Stripe metadata
            $orderId = $session->metadata->order_id ?? null;

            if (!$orderId) {
                return response()->json(['error' => 'Order ID missing'], 400);
            }

            $order = Order::find($orderId);

            if (!$order) {
                return response()->json(['error' => 'Order not found'], 404);
            }

            // Prevent duplicate updates
            if ($order->payment_status == 'paid') {
                return response()->json(['status' => 'already processed']);
            }

            // Update order payment status
            $order->update([
                'payment_status' => 'paid',
                'order_status'   => 'confirmed'
            ]);

            // Load items for email
            $order->load('items');

            // Send confirmation email
            Mail::to($order->customer_email)
                ->send(new OrderConfirmationMail($order));

        }

        return response()->json(['status' => 'success']);
    }
}