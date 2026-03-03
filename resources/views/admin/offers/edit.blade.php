@extends('layouts.admin')

@section('content')

<div class="bg-black text-white min-h-screen py-12">

    <div class="max-w-3xl mx-auto px-6">

        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold">Edit Offer</h2>
            <p class="text-gray-400 text-sm mt-1">
                Update exclusive savings details
            </p>
        </div>

        <!-- Card -->
        <div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-lg p-8">

           <form method="POST"
      action="{{ route('admin.offers.update', $offer->id) }}"
      class="space-y-6">

    @csrf
    @method('PUT')

    <!-- Title -->
    <div>
        <label class="block text-sm font-medium text-gray-300 mb-2">
            Offer Title
        </label>
        <input type="text"
               name="title"
               value="{{ old('title', $offer->title) }}"
               required
               class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3
                      focus:outline-none focus:ring-2 focus:ring-yellow-500
                      focus:border-yellow-500 transition">
    </div>

    <!-- Description -->
    <div>
        <label class="block text-sm font-medium text-gray-300 mb-2">
            Description
        </label>
        <textarea name="description"
                  rows="4"
                  required
                  class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3
                         focus:outline-none focus:ring-2 focus:ring-yellow-500
                         focus:border-yellow-500 transition">{{ old('description', $offer->description) }}</textarea>
    </div>

    <!-- Promo Code -->
    <div>
        <label class="block text-sm font-medium text-gray-300 mb-2">
            Promo Code
        </label>
        <input type="text"
               name="promo_code"
               value="{{ old('promo_code', $offer->promo_code) }}"
               placeholder="HJGH10"
               class="uppercase w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3
                      focus:outline-none focus:ring-2 focus:ring-yellow-500
                      focus:border-yellow-500 transition">
        <p class="text-xs text-gray-500 mt-2">
            Leave empty if you want this offer to show only (no promo apply).
        </p>
    </div>

    <!-- Discount Type -->
    <div>
        <label class="block text-sm font-medium text-gray-300 mb-2">
            Discount Type
        </label>
        <select name="discount_type"
                class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3
                       focus:outline-none focus:ring-2 focus:ring-yellow-500
                       focus:border-yellow-500 transition">
            <option value="percentage" {{ old('discount_type', $offer->discount_type) === 'percentage' ? 'selected' : '' }}>
                Percentage (%)
            </option>
            <option value="fixed" {{ old('discount_type', $offer->discount_type) === 'fixed' ? 'selected' : '' }}>
                Fixed Amount ($)
            </option>
        </select>
    </div>

    <!-- Discount Value -->
    <div>
        <label class="block text-sm font-medium text-gray-300 mb-2">
            Discount Value
        </label>
        <input type="number"
               step="0.01"
               name="discount_value"
               value="{{ old('discount_value', $offer->discount_value) }}"
               placeholder="10"
               class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3
                      focus:outline-none focus:ring-2 focus:ring-yellow-500
                      focus:border-yellow-500 transition">
    </div>

    <!-- Minimum Order -->
    <div>
        <label class="block text-sm font-medium text-gray-300 mb-2">
            Minimum Order Amount (Optional)
        </label>
        <input type="number"
               step="0.01"
               name="min_order_amount"
               value="{{ old('min_order_amount', $offer->min_order_amount) }}"
               placeholder="50"
               class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3
                      focus:outline-none focus:ring-2 focus:ring-yellow-500
                      focus:border-yellow-500 transition">
    </div>

    <!-- Expiry Date -->
    <div>
        <label class="block text-sm font-medium text-gray-300 mb-2">
            Expiry Date (Optional)
        </label>
        <input type="datetime-local"
               name="expires_at"
               value="{{ old('expires_at', optional($offer->expires_at)->format('Y-m-d\TH:i')) }}"
               class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3
                      focus:outline-none focus:ring-2 focus:ring-yellow-500
                      focus:border-yellow-500 transition">
    </div>

    <!-- Status -->
    <div>
        <label class="block text-sm font-medium text-gray-300 mb-2">
            Offer Status
        </label>
        <select name="status"
                class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3
                       focus:outline-none focus:ring-2 focus:ring-yellow-500
                       focus:border-yellow-500 transition">
            <option value="1" {{ old('status', $offer->status) == 1 ? 'selected' : '' }}>
                Active
            </option>
            <option value="0" {{ old('status', $offer->status) == 0 ? 'selected' : '' }}>
                Inactive
            </option>
        </select>
    </div>

    <!-- Highlight -->
    <div>
        <label class="block text-sm font-medium text-gray-300 mb-2">
            Highlight Card
        </label>
        <select name="is_active"
                class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3
                       focus:outline-none focus:ring-2 focus:ring-yellow-500
                       focus:border-yellow-500 transition">
            <option value="0" {{ old('is_active', $offer->is_active) == 0 ? 'selected' : '' }}>
                Normal
            </option>
            <option value="1" {{ old('is_active', $offer->is_active) == 1 ? 'selected' : '' }}>
                Highlighted
            </option>
        </select>
    </div>

    <!-- Sort Order -->
    <div>
        <label class="block text-sm font-medium text-gray-300 mb-2">
            Sort Order
        </label>
        <input type="number"
               name="sort_order"
               value="{{ old('sort_order', $offer->sort_order) }}"
               placeholder="0"
               class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3
                      focus:outline-none focus:ring-2 focus:ring-yellow-500
                      focus:border-yellow-500 transition">
    </div>

    <!-- Buttons -->
    <div class="flex items-center gap-4 pt-4">

        <button type="submit"
                class="bg-yellow-500 hover:bg-yellow-400 text-black
                       px-6 py-3 rounded-lg font-semibold transition shadow">
            Update Offer
        </button>

        <a href="{{ route('admin.offers.index') }}"
           class="text-gray-400 hover:text-white transition">
            Cancel
        </a>

    </div>

</form>

        </div>

    </div>

</div>

@endsection