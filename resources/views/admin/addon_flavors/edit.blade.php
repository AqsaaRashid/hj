@extends('layouts.admin')

@section('content')

<div class="bg-black text-white min-h-screen py-12">

<div class="max-w-3xl mx-auto px-6">

    <!-- Header -->
    <div class="mb-8">
        <h2 class="text-2xl font-bold">Edit Flavor</h2>
        <p class="text-gray-400 text-sm mt-1">
            Update flavor details for the selected addon
        </p>
    </div>

    <!-- Card -->
    <div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-lg p-8">

        <form action="{{ route('admin.addon-flavors.update',$addon_flavor->id) }}"
              method="POST"
              class="space-y-6">

            @csrf
            @method('PUT')

            <!-- Addon -->
            <div>
                <label class="block text-sm font-medium mb-2 text-gray-300">
                    Select Addon
                </label>

                <select name="addon_id"
                        class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3
                               focus:outline-none focus:ring-2 focus:ring-yellow-500
                               focus:border-yellow-500 transition">

                    @foreach($addons as $id=>$name)

                        <option value="{{ $id }}"
                            {{ $addon_flavor->addon_id == $id ? 'selected' : '' }}>
                            {{ $name }}
                        </option>

                    @endforeach

                </select>
            </div>

            <!-- Flavor -->
            <div>
                <label class="block text-sm font-medium mb-2 text-gray-300">
                    Flavor Name
                </label>

                <input type="text"
                       name="flavor"
                       value="{{ old('flavor',$addon_flavor->flavor) }}"
                       required
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3
                              focus:outline-none focus:ring-2 focus:ring-yellow-500
                              focus:border-yellow-500 transition">
            </div>

            <!-- Buttons -->
            <div class="flex items-center gap-4 pt-4">

                <button type="submit"
                        class="bg-yellow-500 hover:bg-yellow-400 text-black
                               px-6 py-3 rounded-lg font-semibold transition shadow">
                    Update Flavor
                </button>

                <a href="{{ route('admin.addon-flavors.index') }}"
                   class="text-gray-400 hover:text-white transition">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

</div>

@endsection
