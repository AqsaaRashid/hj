<?php

namespace App\Http\Controllers;

use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        // Order counts
        $totalOrders = Order::count();

        $pendingOrders = Order::where('order_status', 'pending')->count();

        $preparingOrders = Order::where('order_status', 'preparing')->count();

        $completedOrders = Order::where('order_status', 'completed')->count();

        // Revenue
        $totalRevenue = Order::where('order_status', 'completed')
                            ->sum('total');

        // Today's Revenue
        $todayRevenue = Order::whereDate('created_at', today())
                            ->where('order_status', 'completed')
                            ->sum('total');

        // Latest Orders
        $recentOrders = Order::latest()
                            ->take(5)
                            ->get();

        return view('dashboard', compact(
            'totalOrders',
            'pendingOrders',
            'preparingOrders',
            'completedOrders',
            'totalRevenue',
            'todayRevenue',
            'recentOrders'
        ));
    }
}