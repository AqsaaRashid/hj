<x-app-layout>
   

    <div class="bg-black min-h-screen">

        <!-- SIDEBAR (FIXED, NEVER SQUEEZES) -->
        <aside class="fixed top-0 left-0 w-64 h-screen
                      bg-black text-white
                      border-r border-gray-800
                      flex flex-col z-40">

            <!-- Brand -->
            <div class="px-6 py-5 border-b border-gray-800">
                <h1 class="text-xl font-bold tracking-wide">
                    <span class="text-white">HANGRY</span>
                    <span class="text-yellow-500">JOES</span>
                </h1>
            </div>

            <!-- Menu -->
           <nav class="flex-1 px-4 py-6 space-y-6 overflow-y-auto">

<!-- Dashboard -->
<div>
    <p class="text-xs uppercase text-gray-500 mb-2 px-2">Overview</p>

    <a href="{{ route('dashboard') }}"
       class="flex items-center px-4 py-3 rounded-md
       {{ request()->routeIs('dashboard')
            ? 'bg-yellow-500 text-black font-semibold'
            : 'text-white hover:bg-gray-800 transition' }}">
        Dashboard
    </a>
</div>


<!-- MENU MANAGEMENT -->
<div>
    <p class="text-xs uppercase text-gray-500 mb-2 px-2">Menu Management</p>

    <a href="{{ route('admin.categories.index') }}"
       class="flex items-center px-4 py-3 rounded-md
       {{ request()->routeIs('admin.categories.*')
            ? 'bg-yellow-500 text-black font-semibold'
            : 'hover:bg-gray-800 transition' }}">
        Categories
    </a>

    <a href="{{ route('admin.menu-items.index') }}"
       class="flex items-center px-4 py-3 rounded-md
       {{ request()->routeIs('admin.menu-items.*')
            ? 'bg-yellow-500 text-black font-semibold'
            : 'hover:bg-gray-800 transition' }}">
        Menu Items
    </a>

    <a href="{{ route('admin.offers.index') }}"
       class="flex items-center px-4 py-3 rounded-md
       {{ request()->routeIs('admin.offers.*')
            ? 'bg-yellow-500 text-black font-semibold'
            : 'hover:bg-gray-800 transition' }}">
        Offers
    </a>
</div>


<!-- ORDERS -->
<div>
    <p class="text-xs uppercase text-gray-500 mb-2 px-2">Orders</p>

    <a href="{{ route('admin.orders.index') }}"
       class="flex items-center px-4 py-3 rounded-md
       {{ request()->routeIs('admin.orders.*')
            ? 'bg-yellow-500 text-black font-semibold'
            : 'hover:bg-gray-800 transition' }}">
        Orders
    </a>
</div>


<!-- ADDONS -->
<div>
    <p class="text-xs uppercase text-gray-500 mb-2 px-2">Customization</p>

    <a href="{{ route('admin.addon-groups.index') }}"
       class="flex items-center px-4 py-3 rounded-md
       {{ request()->routeIs('admin.addon-groups.*')
            ? 'bg-yellow-500 text-black font-semibold'
            : 'hover:bg-gray-800 transition' }}">
        Addon Groups
    </a>

    <a href="{{ route('admin.addons.index') }}"
       class="flex items-center px-4 py-3 rounded-md
       {{ request()->routeIs('admin.addons.*')
            ? 'bg-yellow-500 text-black font-semibold'
            : 'hover:bg-gray-800 transition' }}">
        Addons
    </a>

    <a href="{{ route('admin.addon-flavors.index') }}"
       class="flex items-center px-4 py-3 rounded-md
       {{ request()->routeIs('admin.addon-flavors.*')
            ? 'bg-yellow-500 text-black font-semibold'
            : 'hover:bg-gray-800 transition' }}">
        Flavors
    </a>
</div>

</nav>

            <!-- Footer -->
            <div class="px-6 py-4 border-t border-gray-800 text-sm text-gray-500">
                © {{ date('Y') }} HANGRY JOES
            </div>
        </aside>

        <!-- MAIN CONTENT (SHIFTED RIGHT, SCROLLABLE) -->
        <main class="ml-64 min-h-screen bg-black text-white">

            <!-- Header -->
            <div class="border-b border-gray-800 px-6 py-4 sticky top-0 bg-black z-30">
                <h2 class="text-xl font-semibold text-white">
                    Dashboard
                </h2>
            </div>

            <!-- Page Content -->
          <!-- Page Content -->
<div class="p-6 space-y-6">

    <!-- STATS GRID -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        <!-- Total Orders -->
        <div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-lg p-6">
            <p class="text-gray-400 text-sm">Total Orders</p>
            <h3 class="text-3xl font-bold text-yellow-500 mt-2">
                {{ $totalOrders ?? 0 }}
            </h3>
        </div>

        <!-- Pending Orders -->
      <!-- Preparing Orders -->
<div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-lg p-6">
    <p class="text-gray-400 text-sm">Preparing Orders</p>
    <h3 class="text-3xl font-bold text-purple-400 mt-2">
        {{ $preparingOrders ?? 0 }}
    </h3>
</div>

        <!-- Completed Orders -->
        <div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-lg p-6">
            <p class="text-gray-400 text-sm">Completed Orders</p>
            <h3 class="text-3xl font-bold text-green-400 mt-2">
                {{ $completedOrders ?? 0 }}
            </h3>
        </div>

        <!-- Revenue -->
        <div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-lg p-6">
    <p class="text-gray-400 text-sm">Total Revenue</p>
    <h3 class="text-3xl font-bold text-white mt-2">
        ${{ number_format($totalRevenue ?? 0, 2) }}
    </h3>

    <p class="text-xs text-green-400 mt-2">
        Today: ${{ number_format($todayRevenue ?? 0, 2) }}
    </p>
</div>

    </div>


    <!-- RECENT ORDERS TABLE -->
    <div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-lg overflow-hidden">

        <div class="px-6 py-4 border-b border-gray-800">
            <h3 class="text-lg font-semibold text-white">
                Recent Orders
            </h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">

                <thead class="bg-gray-800 text-gray-300 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-6 py-4 text-left">Order #</th>
                        <th class="px-6 py-4 text-left">Customer</th>
                        <th class="px-6 py-4 text-left">Total</th>
                        <th class="px-6 py-4 text-left">Status</th>
                        <th class="px-6 py-4 text-left">Date</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-800">

                    @forelse($recentOrders ?? [] as $order)

                        <tr class="hover:bg-gray-800/60 transition">

                            <td class="px-6 py-4 font-semibold text-yellow-500">
                                {{ $order->order_number }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $order->customer_name }}
                            </td>

                            <td class="px-6 py-4 font-semibold">
                                ${{ number_format($order->total,2) }}
                            </td>

                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs rounded-full
                                    @if($order->order_status == 'pending')
                                        bg-yellow-500/20 text-yellow-400 border border-yellow-500/30
                                    @elseif($order->order_status == 'completed')
                                        bg-green-500/20 text-green-400 border border-green-500/30
                                    @elseif($order->order_status == 'preparing')
                                        bg-purple-500/20 text-purple-400 border border-purple-500/30
                                    @else
                                        bg-gray-700 text-gray-300 border border-gray-600
                                    @endif">
                                    {{ ucfirst($order->order_status) }}
                                </span>
                            </td>

                            <td class="px-6 py-4 text-gray-400 text-sm">
                                {{ $order->created_at->format('d M Y') }}
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="text-center py-12 text-gray-500">
                                No recent orders.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>
        </div>

    </div>

</div>

        </main>

    </div>
</x-app-layout>
