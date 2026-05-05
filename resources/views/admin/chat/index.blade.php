@extends('layouts.admin')

@section('content')

<div class="bg-black text-white min-h-screen py-10">

<div class="max-w-6xl mx-auto px-6">

<!-- Header -->
<div class="flex items-center justify-between mb-8">

<div>
<h2 class="text-2xl font-bold">Chat Requests</h2>
<p class="text-gray-400 text-sm">Customers requesting contact</p>
</div>

<button id="notifySelectedBtn"
class="bg-yellow-500 hover:bg-yellow-400 text-black px-5 py-2.5 rounded-lg font-semibold transition shadow">
Notify Selected
</button>

</div>

@if(session('success'))
<div class="mb-6 bg-green-600/20 border border-green-500 text-green-400 px-4 py-3 rounded-lg">
{{ session('success') }}
</div>
@endif


<div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-lg overflow-hidden">

<div class="overflow-x-auto">

<table class="w-full text-sm">

<thead class="bg-gray-800 text-gray-300 uppercase text-xs tracking-wider">

<tr>

<th class="px-6 py-4 text-left">
<input type="checkbox" id="selectAll">
</th>

<th class="px-6 py-4 text-left">ID</th>
<th class="px-6 py-4 text-left">Email</th>
<th class="px-6 py-4 text-left">Phone</th>
<th class="px-6 py-4 text-left">Date</th>

</tr>

</thead>


<tbody class="divide-y divide-gray-800">

@forelse($requests as $request)

<tr class="hover:bg-gray-800/60 transition">

<td class="px-6 py-4">

<input type="checkbox"
class="contactCheckbox"
value="{{ $request->id }}">

</td>

<td class="px-6 py-4 text-gray-400">
#{{ $request->id }}
</td>

<td class="px-6 py-4 text-gray-300">
{{ $request->email }}
</td>

<td class="px-6 py-4 text-gray-300">
{{ $request->phone }}
</td>

<td class="px-6 py-4 text-gray-400">
{{ $request->created_at->format('M d, Y h:i A') }}
</td>

</tr>

@empty

<tr>
<td colspan="5" class="text-center py-12 text-gray-500">
No chat requests found.
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


@push('scripts')

<script>

document.addEventListener("DOMContentLoaded", function(){

/* SELECT ALL CHECKBOX */

const selectAll = document.getElementById("selectAll");

if(selectAll){

selectAll.addEventListener("change", function(){

document.querySelectorAll(".contactCheckbox")
.forEach(cb => cb.checked = this.checked);

});

}


/* NOTIFY SELECTED USERS */

const notifyBtn = document.getElementById("notifySelectedBtn");

notifyBtn.addEventListener("click", function(){

let selected = [];

document.querySelectorAll(".contactCheckbox:checked")
.forEach(function(cb){

selected.push(cb.value);

});

if(selected.length === 0){

alert("Please select customers first");
return;

}


fetch("{{ route('admin.chat.notify') }}",{

method: "POST",

headers: {
"Content-Type": "application/json",
"X-CSRF-TOKEN": "{{ csrf_token() }}"
},

body: JSON.stringify({
ids: selected
})

})

.then(res => res.json())

.then(data => {

alert("Email notification sent successfully!");

});

});

});

</script>

@endpush