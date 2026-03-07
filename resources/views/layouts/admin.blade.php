<x-app-layout>
   
    <div class="bg-black min-h-screen">

        <!-- SIDEBAR (FIXED, NEVER SQUEEZES) -->
        <aside class="fixed top-0 left-0 w-64 h-screen
                      bg-black text-white
                      flex flex-col
                      border-r border-gray-800
                      z-40">

            <!-- Brand -->
            <div class="px-6 py-5 border-b border-gray-800">
                <h1 class="text-xl font-bold tracking-wide">
                    <span class="text-white">Hangry </span>
                    <span class="text-yellow-500">Joes</span>
                </h1>
            </div>

            <!-- Menu -->
            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">

                <!-- Dashboard -->
                <a href="{{ route('dashboard') }}"
                   class="flex items-center px-4 py-3 rounded-md
                   {{ request()->routeIs('dashboard')
                        ? 'bg-yellow-500 text-black font-semibold'
                        : 'text-white hover:bg-white hover:text-black transition' }}">
                    Dashboard
                </a>
                <div class="pt-4 text-xs uppercase tracking-wider text-gray-500">
                    Menu
                </div>
 <!-- Categories -->
    <a href="{{ route('admin.categories.index') }}"
       class="flex items-center px-4 py-3 rounded-md
              hover:bg-gray-800 transition">
        Categories
    </a>

    <!-- Menu Items -->
    <a href="{{ route('admin.menu-items.index') }}"
       class="flex items-center px-4 py-3 rounded-md
              hover:bg-gray-800 transition">
        Menu Items
    </a>
      <!-- Offers -->
<a href="{{ route('admin.offers.index') }}"
   class="flex items-center px-4 py-3 rounded-md
          hover:bg-gray-800 transition">
    Offers
</a>        
               
<!-- Orders -->
<a href="{{ route('admin.orders.index') }}"
   class="flex items-center px-4 py-3 rounded-md
   {{ request()->routeIs('admin.orders.*')
        ? 'bg-yellow-500 text-black font-semibold'
        : 'text-white hover:bg-white hover:text-black transition' }}">
    Orders
</a>
<!-- Addon Groups -->
<a href="{{ route('admin.addon-groups.index') }}"
   class="flex items-center px-4 py-3 rounded-md
          {{ request()->routeIs('admin.addon-groups.*')
            ? 'bg-yellow-500 text-black font-semibold'
            : 'text-white hover:bg-white hover:text-black transition' }}">
    Addon Groups
</a>

<!-- Addons -->
<a href="{{ route('admin.addons.index') }}"
   class="flex items-center px-4 py-3 rounded-md
          {{ request()->routeIs('admin.addons.*')
            ? 'bg-yellow-500 text-black font-semibold'
            : 'text-white hover:bg-white hover:text-black transition' }}">
    Addons
</a>

<!-- Flavors -->
<a href="{{ route('admin.addon-flavors.index') }}"
   class="flex items-center px-4 py-3 rounded-md
          {{ request()->routeIs('admin.addon-flavors.*')
            ? 'bg-yellow-500 text-black font-semibold'
            : 'text-white hover:bg-white hover:text-black transition' }}">
    Flavors
</a>

            </nav>

            <!-- Footer -->
            <div class="px-6 py-4 border-t border-gray-800 text-sm text-gray-500">
                © {{ date('Y') }} HANGRY JOES
            </div>
        </aside>

        <!-- MAIN CONTENT (SHIFTED RIGHT) -->
        <main class="ml-64 min-h-screen bg-black text-white">

            <!-- Header -->
            <div class="border-b border-gray-800 px-6 py-4 sticky top-0 bg-black z-30">
                <h2 class="text-xl font-semibold">
                    {{ $title ?? '' }}
                </h2>
            </div>

            <!-- Page Content -->
            <div class="p-6">
                @yield('content')
                @stack('scripts')
            </div>

        </main>

    </div>
</x-app-layout>
