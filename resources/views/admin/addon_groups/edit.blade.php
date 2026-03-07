@extends('layouts.admin')

@section('content')

<div class="bg-black text-white min-h-screen py-12">

<div class="max-w-3xl mx-auto px-6">

    <!-- Header -->
    <div class="mb-8">
        <h2 class="text-2xl font-bold">Edit Addon Group</h2>
        <p class="text-gray-400 text-sm mt-1">
            Update addon group details
        </p>
    </div>

    <!-- Card -->
    <div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-lg p-8">

        <form action="{{ route('admin.addon-groups.update',$addon_group->id) }}" method="POST" class="space-y-6">

            @csrf
            @method('PUT')

            <!-- Name -->
            <div>
                <label class="block text-sm font-medium mb-2 text-gray-300">
                    Group Name
                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name',$addon_group->name) }}"
                       required
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3
                              focus:outline-none focus:ring-2 focus:ring-yellow-500
                              focus:border-yellow-500 transition">
            </div>

            <!-- Status -->
            <div>
                <label class="block text-sm font-medium mb-2 text-gray-300">
                    Status
                </label>

                <select name="status"
                        class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3
                               focus:outline-none focus:ring-2 focus:ring-yellow-500
                               focus:border-yellow-500 transition">

                    <option value="1" {{ $addon_group->status ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="0" {{ !$addon_group->status ? 'selected' : '' }}>
                        Inactive
                    </option>

                </select>
            </div>

            <!-- Buttons -->
            <div class="flex items-center gap-4 pt-4">

                <button type="submit"
                        class="bg-yellow-500 hover:bg-yellow-400 text-black
                               px-6 py-3 rounded-lg font-semibold transition shadow">
                    Update Group
                </button>

                <a href="{{ route('admin.addon-groups.index') }}"
                   class="text-gray-400 hover:text-white transition">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

</div>

@endsection
