<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OrderController extends Controller
{
   public function index(Request $request)
{
    $query = Order::query()->latest();

    if ($request->status) {
        $query->where('order_status', $request->status);
    }

    if ($request->payment) {
        $query->where('payment_status', $request->payment);
    }

    if ($request->method) {
        $query->where('payment_method', $request->method);
    }

    $orders = $query->paginate(15);

    // Mark all unseen orders as seen when admin opens Orders page
    Order::where('is_seen', false)->update([
        'is_seen' => true
    ]);

    return view('admin.orders.index', compact('orders'));
}

    public function trash()
    {
        // Auto permanently delete after 30 days
        Order::onlyTrashed()
            ->where('deleted_at', '<', Carbon::now()->subDays(30))
            ->forceDelete();

        $orders = Order::onlyTrashed()->latest()->paginate(15);

        return view('admin.orders.trash', compact('orders'));
    }


   public function bulkDelete(Request $request)
{
    if (!$request->orders) {
        return back()->with('success', 'No orders selected.');
    }

    Order::whereIn('id', $request->orders)->forceDelete();

    return back()->with('success', 'Orders deleted permanently.');
}


    public function restore($id)
    {
        Order::withTrashed()->find($id)->restore();

        return back()->with('success', 'Order restored successfully.');
    }


    public function forceDelete($id)
    {
        Order::withTrashed()->find($id)->forceDelete();

        return back()->with('success', 'Order permanently deleted.');
    }


    public function updateStatus(Request $request, Order $order)
    {
        $order->order_status = $request->order_status;

        if ($order->payment_method === 'cod' &&
            $request->order_status === 'completed') {

            $order->payment_status = 'paid';
        }

        $order->save();

        return back()->with('success', 'Order status updated successfully.');
    }
      public function show(Order $order)
    {
        $order->load('items');

        return view('admin.orders.show', compact('order'));
    }
}