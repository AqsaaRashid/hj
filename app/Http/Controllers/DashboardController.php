<?php

namespace App\Http\Controllers;

use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        // Basic Counts
        $totalOrders = Order::count();

        $pendingOrders = Order::where('order_status', 'pending')->count();

        $completedOrders = Order::where('order_status', 'completed')->count();

        $preparingOrders = Order::where('order_status', 'preparing')->count();

        // Revenue (only completed orders)
        $totalRevenue = Order::where('order_status', 'completed')
                            ->sum('total');

        // Today Revenue
        $todayRevenue = Order::whereDate('created_at', today())
                            ->where('order_status', 'completed')
                            ->sum('total');

        // Recent Orders (latest 5)
        $recentOrders = Order::latest()
                            ->take(5)
                            ->get();

        return view('dashboard', compact(
            'totalOrders',
            'pendingOrders',
            'completedOrders',
            'preparingOrders',
            'totalRevenue',
            'todayRevenue',
            'recentOrders'
        ));
    }
}