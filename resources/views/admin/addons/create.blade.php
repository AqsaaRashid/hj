@extends('layouts.admin')

@section('content')

<div class="bg-black text-white min-h-screen py-12">

<div class="max-w-3xl mx-auto px-6">

    <!-- Header -->
    <div class="mb-8">
        <h2 class="text-2xl font-bold">Create Addon</h2>
        <p class="text-gray-400 text-sm mt-1">
            Add a new addon modifier for menu items
        </p>
    </div>

    <!-- Card -->
    <div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-lg p-8">

        <form action="{{ route('admin.addons.store') }}" 
              method="POST" 
              enctype="multipart/form-data"
              class="space-y-6">

            @csrf

            <!-- Addon Group -->
            <div>
                <label class="block text-sm font-medium mb-2 text-gray-300">
                    Addon Group
                </label>

                <select name="group_id"
                        class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3
                               focus:outline-none focus:ring-2 focus:ring-yellow-500
                               focus:border-yellow-500 transition">

                    @foreach($groups as $id=>$name)
                        <option value="{{ $id }}">
                            {{ $name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <!-- Name -->
            <div>
                <label class="block text-sm font-medium mb-2 text-gray-300">
                    Addon Name
                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name') }}"
                       required
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3
                              focus:outline-none focus:ring-2 focus:ring-yellow-500
                              focus:border-yellow-500 transition">
            </div>

            <!-- Price -->
            <div>
                <label class="block text-sm font-medium mb-2 text-gray-300">
                    Price
                </label>

                <input type="text"
                       name="price"
                       value="{{ old('price') }}"
                       required
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3
                              focus:outline-none focus:ring-2 focus:ring-yellow-500
                              focus:border-yellow-500 transition">
            </div>

            <!-- Image -->
            <div>
                <label class="block text-sm font-medium mb-2 text-gray-300">
                    Image
                </label>

                <input type="file"
                       name="image"
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3
                              text-gray-300 file:bg-yellow-500 file:text-black
                              file:border-none file:px-4 file:py-2 file:rounded-lg
                              hover:file:bg-yellow-400 transition">
            </div>

            <!-- Has Flavors -->
            <div>
                <label class="block text-sm font-medium mb-2 text-gray-300">
                    Has Flavors?
                </label>

                <select name="has_flavors"
                        class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3
                               focus:outline-none focus:ring-2 focus:ring-yellow-500
                               focus:border-yellow-500 transition">

                    <option value="0">No</option>
                    <option value="1">Yes</option>

                </select>
            </div>

            <!-- Buttons -->
            <div class="flex items-center gap-4 pt-4">

                <button type="submit"
                        class="bg-yellow-500 hover:bg-yellow-400 text-black
                               px-6 py-3 rounded-lg font-semibold transition shadow">
                    Save Addon
                </button>

                <a href="{{ route('admin.addons.index') }}"
                   class="text-gray-400 hover:text-white transition">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

</div>

@endsection
