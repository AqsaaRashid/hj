@extends('layouts.admin')

@section('content')

<div class="bg-black text-white min-h-screen py-12">

    <div class="max-w-3xl mx-auto px-6">

        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold">Add Menu Item</h2>
            <p class="text-gray-400 text-sm mt-1">
                Create a new menu item for your restaurant
            </p>
        </div>

        <!-- Card -->
        <div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-lg p-8">

            <form action="{{ route('admin.menu-items.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="space-y-6">

                @csrf

                <!-- Item Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        Item Name
                    </label>
                    <input type="text"
                           name="name"
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
                              class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3
                                     focus:outline-none focus:ring-2 focus:ring-yellow-500
                                     focus:border-yellow-500 transition"></textarea>
                </div>

                <!-- Price -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        Price ($)
                    </label>
                    <input type="number"
                           step="0.01"
                           name="price"
                           required
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3
                                  focus:outline-none focus:ring-2 focus:ring-yellow-500
                                  focus:border-yellow-500 transition">
                </div>

                <!-- Category -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        Category
                    </label>
                    <select name="category_id"
                            class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3
                                   focus:outline-none focus:ring-2 focus:ring-yellow-500
                                   focus:border-yellow-500 transition">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Image Upload -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        Upload Image
                    </label>
                    <input type="file"
                           name="image"
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3
                                  file:bg-yellow-500 file:text-black file:border-0
                                  file:px-4 file:py-2 file:rounded-lg file:mr-4
                                  hover:file:bg-yellow-400 transition">
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

                <!-- Buttons -->
                <div class="flex items-center gap-4 pt-4">

                    <button type="submit"
                            class="bg-yellow-500 hover:bg-yellow-400 text-black
                                   px-6 py-3 rounded-lg font-semibold transition shadow">
                        Save Item
                    </button>

                    <a href="{{ route('admin.menu-items.index') }}"
                       class="text-gray-400 hover:text-white transition">
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection