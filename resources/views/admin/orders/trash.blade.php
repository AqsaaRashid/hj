@extends('layouts.admin')

@section('content')

<div class="bg-black text-white min-h-screen py-10">
<div class="max-w-7xl mx-auto px-6">

<h2 class="text-2xl font-bold mb-6">Deleted Orders (Bin)</h2>

<div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-lg overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full text-sm">

<thead class="bg-gray-800 text-gray-300 uppercase text-xs">
<tr>
<th class="px-6 py-4">Order #</th>
<th class="px-6 py-4">Customer</th>
<th class="px-6 py-4">Deleted At</th>
<th class="px-6 py-4 text-right">Actions</th>
</tr>
</thead>

<tbody class="divide-y divide-gray-800">

@forelse($orders as $order)
<tr class="hover:bg-gray-800/60 transition">

<td class="px-6 py-4 text-yellow-500">
{{ $order->order_number }}
</td>

<td class="px-6 py-4">
{{ $order->customer_name }}
</td>

<td class="px-6 py-4 text-gray-400 text-sm">
{{ $order->deleted_at->format('d M Y') }}
</td>

<td class="px-6 py-4 text-right space-x-4">

<form action="{{ route('admin.orders.restore', $order->id) }}"
      method="POST"
      class="inline">
@csrf
@method('PATCH')
<button class="text-green-400 hover:text-green-300">
Restore
</button>
</form>

<form action="{{ route('admin.orders.forceDelete', $order->id) }}"
      method="POST"
      class="inline"
      onsubmit="return confirm('Permanently delete?')">
@csrf
@method('DELETE')
<button class="text-red-400 hover:text-red-300">
Delete Forever
</button>
</form>

</td>

</tr>
@empty
<tr>
<td colspan="4" class="text-center py-12 text-gray-500">
No deleted orders.
</td>
</tr>
@endforelse

</tbody>
</table>
</div>
</div>

<div class="mt-6">
{{ $orders->links() }}
</div>

</div>
</div>

@endsection