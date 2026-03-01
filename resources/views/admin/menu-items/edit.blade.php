@extends('layouts.admin')

@section('content')

<div class="bg-black text-white min-h-screen py-12">

    <div class="max-w-3xl mx-auto px-6">

        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold">Edit Menu Item</h2>
            <p class="text-gray-400 text-sm mt-1">
                Update details for this menu item
            </p>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="mb-6 bg-red-500/20 border border-red-500 text-red-400 px-4 py-3 rounded-lg">
                <ul class="list-disc pl-5 space-y-1 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Card -->
        <div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-lg p-8">

            <form action="{{ route('admin.menu-items.update', $menu_item->id) }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="space-y-6">

                @csrf
                @method('PUT')

                <!-- Item Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        Item Name
                    </label>
                    <input type="text"
                           name="name"
                           value="{{ old('name', $menu_item->name) }}"
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
                                     focus:border-yellow-500 transition">{{ old('description', $menu_item->description) }}</textarea>
                </div>

                <!-- Price -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        Price ($)
                    </label>
                    <input type="number"
                           step="0.01"
                           name="price"
                           value="{{ old('price', $menu_item->price) }}"
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
                            required
                            class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3
                                   focus:outline-none focus:ring-2 focus:ring-yellow-500
                                   focus:border-yellow-500 transition">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}"
                                {{ $menu_item->category_id == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Current Image -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-3">
                        Current Image
                    </label>

                    @if($menu_item->image)
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('storage/'.$menu_item->image) }}"
                                 class="w-28 h-28 object-cover rounded-xl border border-gray-700 shadow">
                            <span class="text-gray-500 text-sm">
                                Uploaded image preview
                            </span>
                        </div>
                    @else
                        <p class="text-gray-500 text-sm">No image uploaded</p>
                    @endif
                </div>

                <!-- Replace Image -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        Replace Image
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
                        <option value="1" {{ $menu_item->status ? 'selected' : '' }}>
                            Active
                        </option>
                        <option value="0" {{ !$menu_item->status ? 'selected' : '' }}>
                            Inactive
                        </option>
                    </select>
                </div>

                <!-- Buttons -->
                <div class="flex items-center gap-4 pt-4">

                    <button type="submit"
                            class="bg-yellow-500 hover:bg-yellow-400 text-black
                                   px-6 py-3 rounded-lg font-semibold transition shadow">
                        Update Item
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