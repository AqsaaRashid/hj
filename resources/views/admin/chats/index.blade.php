@extends('layouts.admin')

@section('content')

<div class="bg-black text-white min-h-screen py-10">

<div class="max-w-5xl mx-auto px-6">

<!-- PAGE HEADER -->

<div class="flex justify-between items-center mb-10">

<h2 class="text-2xl font-bold">
Live Chat Messages
</h2>

<p class="text-gray-400 text-sm">
Customer Conversations
</p>

</div>


@foreach($messages as $chat)

<div class="bg-gray-900 border border-gray-800 rounded-2xl p-6 mb-8">

<!-- MESSAGE HEADER -->

<div class="flex justify-between items-start mb-6">

<div>

<p class="text-gray-400 text-sm">
{{ $chat->created_at->format('d M Y, h:i A') }}
</p>

</div>

@if($chat->admin_reply)

<span class="px-3 py-1 text-xs rounded-full bg-green-500/20 text-green-400 border border-green-500/30">
Answered
</span>

@else

<span class="px-3 py-1 text-xs rounded-full bg-red-500/20 text-red-400 border border-red-500/30">
Pending
</span>

@endif

</div>


<!-- CUSTOMER MESSAGE -->

<div class="mb-6">

<p class="text-gray-400 text-sm mb-2">
Customer Message
</p>

<div class="bg-gray-800/50 rounded-xl px-5 py-4 text-gray-300 leading-relaxed">

{{ $chat->message }}

</div>

</div>


<!-- ADMIN REPLY (IF EXISTS) -->

@if($chat->admin_reply)

<div class="mb-6">

<p class="text-gray-400 text-sm mb-2">
Your Reply
</p>

<div class="bg-green-900/30 border border-green-600/20 rounded-xl px-5 py-4 text-green-200">

{{ $chat->admin_reply }}

</div>

</div>

@endif


<!-- REPLY FORM -->

@if(!$chat->admin_reply)

<form action="{{ route('admin.chats.reply',$chat->id) }}" method="POST">

@csrf

<textarea
name="reply"
rows="4"
required
class="w-full bg-gray-800 border border-gray-700 rounded-xl p-4 text-white focus:outline-none focus:border-yellow-500"
placeholder="Write your reply here..."></textarea>

<div class="mt-4">

<button
type="submit"
class="bg-yellow-500 hover:bg-yellow-400 text-black px-6 py-2 rounded-lg font-semibold transition">

Send Reply

</button>

</div>

</form>

@endif

</div>

@endforeach

</div>

</div>

@endsection