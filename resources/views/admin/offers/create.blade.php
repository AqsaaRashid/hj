@extends('layouts.admin')

@section('content')

<div class="bg-black text-white min-h-screen py-12">

    <div class="max-w-3xl mx-auto px-6">

        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold">Add Offer</h2>
            <p class="text-gray-400 text-sm mt-1">
                Create a new exclusive savings offer
            </p>
        </div>

        <!-- Card -->
        <div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-lg p-8">

            <form action="{{ route('admin.offers.store') }}"
                  method="POST"
                  class="space-y-6">

                @csrf

                <!-- Title -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        Offer Title
                    </label>
                    <input type="text"
                           name="title"
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
                                     focus:border-yellow-500 transition"></textarea>
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        Status
                    </label>
                    <select name="status"
                            class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3
                                   focus:outline-none focus:ring-2 focus:ring-yellow-500
                                   focus:border-yellow-500 transition">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
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
                        <option value="0">Normal</option>
                        <option value="1">Highlighted</option>
                    </select>
                </div>

                <!-- Sort Order -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        Sort Order
                    </label>
                    <input type="number"
                           name="sort_order"
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3
                                  focus:outline-none focus:ring-2 focus:ring-yellow-500
                                  focus:border-yellow-500 transition"
                           placeholder="0">
                </div>

                <!-- Buttons -->
                <div class="flex items-center gap-4 pt-4">

                    <button type="submit"
                            class="bg-yellow-500 hover:bg-yellow-400 text-black
                                   px-6 py-3 rounded-lg font-semibold transition shadow">
                        Save Offer
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