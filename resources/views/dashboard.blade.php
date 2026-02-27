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
            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">

                <a href="{{ route('dashboard') }}"
                   class="flex items-center px-4 py-3 rounded-md
                          bg-yellow-500 text-black font-semibold">
                    Dashboard
                </a>
                <div class="pt-4 text-xs uppercase tracking-wider text-gray-500">
                    Your Menu
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
            <div class="p-6 space-y-6">

               
 <!-- Recent Activities -->



            </div>

        </main>

    </div>
</x-app-layout>
