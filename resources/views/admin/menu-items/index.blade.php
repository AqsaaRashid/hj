@extends('layouts.admin')

@section('content')

<div class="bg-black text-white min-h-screen py-10">

    <div class="max-w-6xl mx-auto px-6">

        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-2xl font-bold">Menu Items</h2>
                <p class="text-gray-400 text-sm">Manage your restaurant menu items</p>
            </div>

            <a href="{{ route('admin.menu-items.create') }}"
               class="bg-yellow-500 hover:bg-yellow-400 text-black px-5 py-2.5 rounded-lg font-semibold transition shadow">
                + Add Item
            </a>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-6 bg-green-600/20 border border-green-500 text-green-400 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table Card -->
        <div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-lg overflow-hidden">

            <div class="overflow-x-auto">
                <table class="w-full text-sm">

                    <thead class="bg-gray-800 text-gray-300 uppercase text-xs tracking-wider">
                        <tr>
                            <th class="px-6 py-4 text-left">Image</th>
                            <th class="px-6 py-4 text-left">Name</th>
                            <th class="px-6 py-4 text-left">Category</th>
                            <th class="px-6 py-4 text-left">Price</th>
                            <th class="px-6 py-4 text-left">Status</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-800">

                        @forelse($items as $item)
                            <tr class="hover:bg-gray-800/60 transition">

                                <td class="px-6 py-4">
                                    @if($item->image)
                                        <img src="{{ asset('storage/'.$item->image) }}"
                                             class="w-14 h-14 object-cover rounded-lg border border-gray-700 shadow">
                                    @else
                                        <div class="w-14 h-14 bg-gray-800 rounded-lg"></div>
                                    @endif
                                </td>

                                <td class="px-6 py-4 font-medium">
                                    {{ $item->name }}
                                </td>

                                <td class="px-6 py-4 text-gray-400">
                                    {{ $item->category->name ?? '—' }}
                                </td>

                                <td class="px-6 py-4 font-semibold text-yellow-500">
                                    ${{ number_format($item->price, 2) }}
                                </td>

                                <td class="px-6 py-4">
                                    @if($item->status)
                                        <span class="px-3 py-1 text-xs rounded-full bg-green-500/20 text-green-400 border border-green-500/30">
                                            Active
                                        </span>
                                    @else
                                        <span class="px-3 py-1 text-xs rounded-full bg-red-500/20 text-red-400 border border-red-500/30">
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-right space-x-3">

                                    <a href="{{ route('admin.menu-items.edit',$item->id) }}"
                                       class="text-yellow-500 hover:text-yellow-400 font-medium transition">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.menu-items.destroy',$item->id) }}"
                                          method="POST"
                                          class="inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="text-red-500 hover:text-red-400 font-medium transition"
                                                onclick="return confirm('Delete this item?')">
                                            Delete
                                        </button>
                                    </form>

                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-12 text-gray-500">
                                    No menu items found.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>
            </div>

        </div>

    </div>

</div>

@endsection