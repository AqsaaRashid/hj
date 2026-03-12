@extends('layouts.admin')

@section('content')

<div class="bg-black text-white min-h-screen py-10">

    <div class="max-w-6xl mx-auto px-6">

        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-2xl font-bold">Contact Messages</h2>
                <p class="text-gray-400 text-sm">Messages submitted from website contact form</p>
            </div>
        </div>

        <div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-lg overflow-hidden">

            <div class="overflow-x-auto">
                <table class="w-full text-sm">

                    <thead class="bg-gray-800 text-gray-300 uppercase text-xs tracking-wider">
                        <tr>
                            <th class="px-6 py-4 text-left">Name</th>
                            <th class="px-6 py-4 text-left">Email</th>
                            <th class="px-6 py-4 text-left">Phone</th>
                            <th class="px-6 py-4 text-left">Subject</th>
                            <th class="px-6 py-4 text-left">Date</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-800">

                        @forelse($contacts as $contact)

                        <tr class="hover:bg-gray-800/60 transition">

                            <td class="px-6 py-4 font-medium">
                                {{ $contact->first_name }} {{ $contact->last_name }}
                            </td>

                            <td class="px-6 py-4 text-gray-300">
                                {{ $contact->email }}
                            </td>

                            <td class="px-6 py-4 text-gray-300">
                                {{ $contact->phone ?? '—' }}
                            </td>

                            <td class="px-6 py-4 text-gray-300">
                                {{ $contact->subject }}
                            </td>

                            <td class="px-6 py-4 text-gray-400 text-sm">
                                {{ $contact->created_at->format('M d, Y') }}
                            </td>

                            <td class="px-6 py-4 text-right space-x-4">

                                <a href="{{ route('admin.contacts.show',$contact->id) }}"
                                   class="text-yellow-500 hover:text-yellow-400 font-medium transition">
                                    View Details
                                </a>

                                <form action="{{ route('admin.contacts.destroy',$contact->id) }}"
                                      method="POST"
                                      class="inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="text-red-500 hover:text-red-400 font-medium transition"
                                            onclick="return confirm('Delete this message?')">
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>
                            <td colspan="6" class="text-center py-12 text-gray-500">
                                No contact messages found.
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