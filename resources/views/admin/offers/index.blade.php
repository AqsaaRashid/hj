@extends('layouts.admin')

@section('content')

<div class="bg-black text-white min-h-screen py-10">

    <div class="max-w-6xl mx-auto px-6">

        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-2xl font-bold">Offers</h2>
                <p class="text-gray-400 text-sm">Manage exclusive savings section</p>
            </div>

            <a href="{{ route('admin.offers.create') }}"
               class="bg-yellow-500 hover:bg-yellow-400 text-black px-5 py-2.5 rounded-lg font-semibold transition shadow">
                + Add Offer
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
                            <th class="px-6 py-4 text-left">Title</th>
                            <th class="px-6 py-4 text-left">Promo Code</th>
                            <th class="px-6 py-4 text-left">Discount</th>
                            <th class="px-6 py-4 text-left">Min Order</th>
                            <th class="px-6 py-4 text-left">Expiry</th>
                            <th class="px-6 py-4 text-left">Status</th>
                            <th class="px-6 py-4 text-left">Highlight</th>
                            <th class="px-6 py-4 text-left">Sort</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-800">

                        @forelse($offers as $offer)
                            <tr class="hover:bg-gray-800/60 transition">

                                <td class="px-6 py-4 font-medium">
                                    {{ $offer->title }}
                                    <div class="text-xs text-gray-500 mt-1 line-clamp-1">
                                        {{ $offer->description }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-gray-300">
                                    {{ $offer->promo_code ? $offer->promo_code : '—' }}
                                </td>

                                <td class="px-6 py-4 text-gray-300">
                                    @if($offer->discount_type && $offer->discount_value !== null)
                                        @if($offer->discount_type === 'percentage')
                                            {{ rtrim(rtrim(number_format($offer->discount_value, 2), '0'), '.') }}%
                                        @else
                                            ${{ number_format($offer->discount_value, 2) }}
                                        @endif
                                    @else
                                        —
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-gray-300">
                                    {{ $offer->min_order_amount !== null ? '$'.number_format($offer->min_order_amount, 2) : '—' }}
                                </td>

                                <td class="px-6 py-4 text-gray-300">
                                    {{ $offer->expires_at ? \Carbon\Carbon::parse($offer->expires_at)->format('M d, Y') : '—' }}
                                </td>

                                <td class="px-6 py-4">
                                    @if($offer->status)
                                        <span class="px-3 py-1 text-xs rounded-full bg-green-500/20 text-green-400 border border-green-500/30">
                                            Active
                                        </span>
                                    @else
                                        <span class="px-3 py-1 text-xs rounded-full bg-red-500/20 text-red-400 border border-red-500/30">
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4">
                                    @if($offer->is_active)
                                        <span class="px-3 py-1 text-xs rounded-full bg-yellow-500/20 text-yellow-400 border border-yellow-500/30">
                                            Highlighted
                                        </span>
                                    @else
                                        <span class="px-3 py-1 text-xs rounded-full bg-gray-500/20 text-gray-400 border border-gray-500/30">
                                            Normal
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-gray-400">
                                    {{ $offer->sort_order ?? 0 }}
                                </td>

                                <td class="px-6 py-4 text-right space-x-3">

                                    <a href="{{ route('admin.offers.edit',$offer->id) }}"
                                       class="text-yellow-500 hover:text-yellow-400 font-medium transition">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.offers.destroy',$offer->id) }}"
                                          method="POST"
                                          class="inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="text-red-500 hover:text-red-400 font-medium transition"
                                                onclick="return confirm('Delete this offer?')">
                                            Delete
                                        </button>
                                    </form>

                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-12 text-gray-500">
                                    No offers found.
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