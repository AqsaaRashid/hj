@extends('layouts.admin')

@section('content')

<div class="bg-black text-white min-h-screen py-10">

<div class="max-w-6xl mx-auto px-6">

    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-2xl font-bold">Addon Flavors</h2>
            <p class="text-gray-400 text-sm">Manage flavor options for addons</p>
        </div>

        <a href="{{ route('admin.addon-flavors.create') }}"
           class="bg-yellow-500 hover:bg-yellow-400 text-black px-5 py-2.5 rounded-lg font-semibold transition shadow">
            + Add Flavor
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-500/20 border border-green-500 text-green-400 px-4 py-3 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table Card -->
    <div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-lg overflow-hidden">

        <div class="overflow-x-auto">
            <table class="w-full text-sm">

                <thead class="bg-gray-800 text-gray-300 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-6 py-4 text-left">#</th>
                        <th class="px-6 py-4 text-left">Addon</th>
                        <th class="px-6 py-4 text-left">Flavor</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-800">

                    @forelse($flavors as $key => $flavor)

                        <tr class="hover:bg-gray-800/60 transition">

                            <td class="px-6 py-4">
                                {{ $key + 1 }}
                            </td>

                            <td class="px-6 py-4 text-gray-300">
                                {{ $flavor->addon->name ?? '-' }}
                            </td>

                            <td class="px-6 py-4 font-medium">
                                {{ $flavor->flavor }}
                            </td>

                            <td class="px-6 py-4 text-right space-x-3">

                                <a href="{{ route('admin.addon-flavors.edit', $flavor->id) }}"
                                   class="text-yellow-500 hover:text-yellow-400 font-medium">
                                    Edit
                                </a>

                                <form action="{{ route('admin.addon-flavors.destroy', $flavor->id) }}"
                                      method="POST"
                                      class="inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="text-red-500 hover:text-red-400 font-medium"
                                            onclick="return confirm('Delete this flavor?')">
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="4" class="text-center py-12 text-gray-500">
                                No flavors found.
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
