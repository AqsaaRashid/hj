@extends('layouts.admin')

@section('content')

<div class="bg-black text-white min-h-screen py-10">

<div class="max-w-5xl mx-auto px-6">

<!-- HEADER -->
<div class="flex justify-between items-start mb-10">

    <div>
        <h2 class="text-2xl font-bold">
            Contact Message
        </h2>

        <p class="text-gray-400 text-sm">
            {{ $contact->created_at->format('d M Y, h:i A') }}
        </p>
    </div>

    <!-- SUBJECT BADGE -->
    <div>
        <span class="px-4 py-2 text-xs rounded-full bg-yellow-500/20 text-yellow-400 border border-yellow-500/30">
            {{ $contact->subject }}
        </span>
    </div>

</div>


<!-- CUSTOMER INFO -->
<div class="bg-gray-900 border border-gray-800 rounded-2xl p-6 mb-8">

<h3 class="text-lg font-semibold mb-6">
Customer Details
</h3>

<div class="grid md:grid-cols-2 gap-6 text-sm">

<div>
<p class="text-gray-400">Full Name</p>
<p class="font-medium">
{{ $contact->first_name }} {{ $contact->last_name }}
</p>
</div>

<div>
<p class="text-gray-400">Email</p>
<p class="font-medium">
{{ $contact->email }}
</p>
</div>

<div>
<p class="text-gray-400">Phone</p>
<p class="font-medium">
{{ $contact->phone ?? 'N/A' }}
</p>
</div>

<div>
<p class="text-gray-400">Subject</p>
<p class="font-medium">
{{ $contact->subject }}
</p>
</div>

</div>

</div>


<!-- MESSAGE -->
<div class="bg-gray-900 border border-gray-800 rounded-2xl p-6 mb-8">

<h3 class="text-lg font-semibold mb-6">
Customer Message
</h3>

<div class="bg-gray-800/50 rounded-xl px-5 py-4 text-gray-300 leading-relaxed">
{{ $contact->message }}
</div>

</div>


<!-- REPLY SECTION -->
<div class="bg-gray-900 border border-gray-800 rounded-2xl p-6">

<h3 class="text-lg font-semibold mb-6">
Reply to Customer
</h3>

<form action="{{ route('admin.contacts.reply',$contact->id) }}" method="POST">

@csrf

<textarea name="reply_message"
rows="5"
required
class="w-full bg-gray-800 border border-gray-700 rounded-xl p-4 text-white focus:outline-none focus:border-yellow-500"
placeholder="Write your reply here..."></textarea>

<div class="mt-6 flex gap-4">

<button type="submit"
class="bg-yellow-500 hover:bg-yellow-400 text-black px-6 py-2 rounded-lg font-semibold transition">
Send Reply
</button>

<a href="{{ route('admin.contacts.index') }}"
class="text-gray-400 hover:text-white flex items-center">
Back
</a>

</div>

</form>

</div>

</div>

</div>

@endsection