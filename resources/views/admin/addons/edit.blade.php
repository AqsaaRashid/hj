@extends('layouts.admin')

@section('content')

<div class="bg-black text-white min-h-screen py-12">

<div class="max-w-3xl mx-auto px-6">

    <!-- Header -->
    <div class="mb-8">
        <h2 class="text-2xl font-bold">Edit Addon</h2>
        <p class="text-gray-400 text-sm mt-1">
            Update addon modifier details
        </p>
    </div>

    <!-- Card -->
    <div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-lg p-8">

        <form action="{{ route('admin.addons.update',$addon->id) }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-6">

            @csrf
            @method('PUT')

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

                        <option value="{{ $id }}"
                            {{ $addon->group_id == $id ? 'selected' : '' }}>
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
                       value="{{ old('name',$addon->name) }}"
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
                       value="{{ old('price',$addon->price) }}"
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

                @if($addon->image)

                    <div class="mt-4">
                        <p class="text-xs text-gray-400 mb-2">Current Image</p>

                        <img src="{{ asset('storage/'.$addon->image) }}"
                             class="w-20 h-20 rounded-lg object-cover border border-gray-700">

                    </div>

                @endif
            </div>

            <!-- Has Flavors -->
            <div>
                <label class="block text-sm font-medium mb-2 text-gray-300">
                    Has Flavors
                </label>

                <select name="has_flavors"
                        class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3
                               focus:outline-none focus:ring-2 focus:ring-yellow-500
                               focus:border-yellow-500 transition">

                    <option value="0" {{ !$addon->has_flavors ? 'selected' : '' }}>
                        No
                    </option>

                    <option value="1" {{ $addon->has_flavors ? 'selected' : '' }}>
                        Yes
                    </option>

                </select>
            </div>

            <!-- Buttons -->
            <div class="flex items-center gap-4 pt-4">

                <button type="submit"
                        class="bg-yellow-500 hover:bg-yellow-400 text-black
                               px-6 py-3 rounded-lg font-semibold transition shadow">
                    Update Addon
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
