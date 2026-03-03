@extends('layouts.admin')

@section('content')

<div class="bg-black text-white min-h-screen py-10">

    <div class="max-w-5xl mx-auto px-6">

        <!-- HEADER -->
        <div class="flex justify-between items-start mb-10">

            <div>
                <h2 class="text-2xl font-bold">
                    Order {{ $order->order_number }}
                </h2>
                <p class="text-gray-400 text-sm">
                    {{ $order->created_at->format('d M Y, h:i A') }}
                </p>
            </div>

            <!-- STATUS BADGE -->
            <div>
                @if($order->status == 'pending')
                    <span class="px-4 py-2 text-xs rounded-full bg-yellow-500/20 text-yellow-400 border border-yellow-500/30">
                        Pending
                    </span>
                @elseif($order->status == 'paid')
                    <span class="px-4 py-2 text-xs rounded-full bg-green-500/20 text-green-400 border border-green-500/30">
                        Paid
                    </span>
                @elseif($order->status == 'cancelled')
                    <span class="px-4 py-2 text-xs rounded-full bg-red-500/20 text-red-400 border border-red-500/30">
                        Cancelled
                    </span>
                @endif
            </div>

        </div>

        <!-- CUSTOMER INFO -->
        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6 mb-8">

            <h3 class="text-lg font-semibold mb-6">Customer Details</h3>

            <div class="grid md:grid-cols-2 gap-6 text-sm">

                <div>
                    <p class="text-gray-400">Full Name</p>
                    <p class="font-medium">{{ $order->customer_name }}</p>
                </div>

                <div>
                    <p class="text-gray-400">Email</p>
                    <p class="font-medium">{{ $order->customer_email }}</p>
                </div>

                <div>
                    <p class="text-gray-400">Phone</p>
                    <p class="font-medium">{{ $order->customer_phone ?: 'N/A' }}</p>
                </div>

                <div>
                    <p class="text-gray-400">Delivery Address</p>
                    <p class="font-medium">
                        {{ $order->street }}, {{ $order->city }}, {{ $order->zip }}
                    </p>
                </div>

            </div>

        </div>

        <!-- ORDER ITEMS -->
        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6">

            <h3 class="text-lg font-semibold mb-6">Order Items</h3>

            <div class="space-y-5">

                @foreach($order->items as $item)
                    <div class="flex justify-between items-center bg-gray-800/50 rounded-xl px-5 py-4 hover:bg-gray-800 transition">

                        <div>
                            <p class="font-medium text-white">
                                {{ $item->product_name }}
                            </p>
                            <p class="text-xs text-gray-400">
                                Quantity: {{ $item->quantity }}
                            </p>
                        </div>

                        <div class="text-right">
                            <p class="text-sm text-gray-400">
                                ${{ number_format($item->price,2) }} each
                            </p>
                            <p class="font-semibold text-white">
                                ${{ number_format($item->price * $item->quantity,2) }}
                            </p>
                        </div>

                    </div>
                @endforeach

            </div>

            <!-- TOTAL SECTION -->
            <div class="border-t border-gray-800 mt-8 pt-6 text-right space-y-2">

                <p class="text-gray-400">
                    Subtotal:
                    <span class="text-white font-medium">
                        ${{ number_format($order->subtotal,2) }}
                    </span>
                </p>

                <p class="text-gray-400">
                    Discount:
                    <span class="text-red-400 font-medium">
                        - ${{ number_format($order->discount,2) }}
                    </span>
                </p>

                <p class="text-xl font-bold text-yellow-500 mt-4">
                    Total: ${{ number_format($order->total,2) }}
                </p>

            </div>

        </div>

    </div>

</div>

@endsection