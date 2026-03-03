@extends('layouts.admin')

@section('content')

<div class="bg-black text-white min-h-screen py-10">
<div class="max-w-7xl mx-auto px-6">

<!-- HEADER -->
<div class="flex justify-between items-center mb-8">
    <div>
        <h2 class="text-2xl font-bold">Orders Management</h2>
        <p class="text-gray-400 text-sm">
            Track kitchen workflow & payment status
        </p>
    </div>

    <a href="{{ route('admin.orders.trash') }}"
       class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg text-sm">
        Bin
    </a>
</div>

@if(session('success'))
<div class="mb-6 bg-green-500/20 border border-green-500 text-green-400 px-4 py-3 rounded-lg">
    {{ session('success') }}
</div>
@endif


<!-- FILTER BADGES -->
<div class="flex gap-3 mb-6 flex-wrap">

    <a href="{{ route('admin.orders.index') }}"
       class="px-4 py-2 rounded-lg bg-gray-800 text-sm hover:bg-gray-700 transition">
        All
    </a>

    <a href="{{ route('admin.orders.index', ['status'=>'pending']) }}"
       class="px-4 py-2 rounded-lg bg-yellow-500/20 text-yellow-400 text-sm border border-yellow-500/30">
        Pending
    </a>

    <a href="{{ route('admin.orders.index', ['status'=>'approved']) }}"
       class="px-4 py-2 rounded-lg bg-blue-500/20 text-blue-400 text-sm border border-blue-500/30">
        Approved
    </a>

    <a href="{{ route('admin.orders.index', ['status'=>'preparing']) }}"
       class="px-4 py-2 rounded-lg bg-purple-500/20 text-purple-400 text-sm border border-purple-500/30">
        Preparing
    </a>

    <a href="{{ route('admin.orders.index', ['status'=>'completed']) }}"
       class="px-4 py-2 rounded-lg bg-green-500/20 text-green-400 text-sm border border-green-500/30">
        Delivered
    </a>

    <a href="{{ route('admin.orders.index', ['method'=>'cod']) }}"
       class="px-4 py-2 rounded-lg bg-orange-500/20 text-orange-400 text-sm border border-orange-500/30">
        COD
    </a>

    <a href="{{ route('admin.orders.index', ['payment'=>'pending']) }}"
       class="px-4 py-2 rounded-lg bg-red-500/20 text-red-400 text-sm border border-red-500/30">
        Unpaid
    </a>

</div>


<!-- BULK DELETE FORM -->
<form action="{{ route('admin.orders.bulkDelete') }}"
      method="POST"
      onsubmit="return confirm('Move selected orders to bin?')">

@csrf
@method('DELETE')

<div class="mb-4 flex justify-between items-center">
    <div class="text-sm text-gray-400">
        Select orders and move to bin
    </div>

    <button type="submit"
            class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg text-sm">
        Delete Selected
    </button>
</div>


<!-- TABLE -->
<div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-lg overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full text-sm">

<thead class="bg-gray-800 text-gray-300 uppercase text-xs tracking-wider">
<tr>
    <th class="px-6 py-4">
        <input type="checkbox" onclick="toggleAll(this)">
    </th>
    <th class="px-6 py-4 text-left">Order #</th>
    <th class="px-6 py-4 text-left">Customer</th>
    <th class="px-6 py-4 text-left">Total</th>
    <th class="px-6 py-4 text-left">Payment</th>
    <th class="px-6 py-4 text-left">Order Status</th>
    <th class="px-6 py-4 text-left">Date</th>
    <th class="px-6 py-4 text-right">View</th>
</tr>
</thead>

<tbody class="divide-y divide-gray-800">

@forelse($orders as $order)

<tr class="hover:bg-gray-800/60 transition">

<td class="px-6 py-4">
<input type="checkbox"
       name="orders[]"
       value="{{ $order->id }}"
       class="order-checkbox">
</td>

<td class="px-6 py-4 font-semibold text-yellow-500">
{{ $order->order_number }}
</td>

<td class="px-6 py-4">
<div class="font-medium">{{ $order->customer_name }}</div>
<div class="text-gray-400 text-xs">{{ $order->customer_email }}</div>
</td>

<td class="px-6 py-4 font-semibold">
${{ number_format($order->total,2) }}
</td>

<td class="px-6 py-4">
<div class="flex flex-col text-sm">
    <span class="uppercase font-medium">
        {{ $order->payment_method }}
    </span>

    @if($order->payment_status == 'paid')
        <span class="text-green-400 text-xs mt-1">Paid</span>
    @else
        <span class="text-yellow-400 text-xs mt-1">Pending</span>
    @endif
</div>
</td>

<!-- STATUS (NO FORM INSIDE TABLE) -->
<td class="px-6 py-4">

<select
    onchange="submitStatus(this, {{ $order->id }})"
    class="bg-gray-800 border border-gray-700 rounded-lg px-3 py-1 text-white text-sm">

<option value="pending" {{ $order->order_status=='pending'?'selected':'' }}>
Pending
</option>

<option value="approved" {{ $order->order_status=='approved'?'selected':'' }}>
Approved
</option>

<option value="preparing" {{ $order->order_status=='preparing'?'selected':'' }}>
Preparing
</option>

<option value="completed" {{ $order->order_status=='completed'?'selected':'' }}>
Delivered
</option>

<option value="cancelled" {{ $order->order_status=='cancelled'?'selected':'' }}>
Cancelled
</option>

</select>

</td>

<td class="px-6 py-4 text-gray-400 text-sm">
{{ $order->created_at->format('d M Y') }}
</td>

<td class="px-6 py-4 text-right">
<a href="{{ route('admin.orders.show', $order->id) }}"
   class="text-yellow-500 hover:text-yellow-400 font-medium">
View
</a>
</td>

</tr>

@empty

<tr>
<td colspan="8" class="text-center py-12 text-gray-500">
No orders found.
</td>
</tr>

@endforelse

</tbody>
</table>
</div>
</div>
</form>

<div class="mt-6">
{{ $orders->withQueryString()->links() }}
</div>

</div>
</div>


<!-- Hidden Status Form (Outside Table) -->
<form id="statusForm" method="POST" style="display:none;">
    @csrf
    @method('PATCH')
    <input type="hidden" name="order_status" id="statusInput">
</form>


<script>
function toggleAll(source) {
    const checkboxes = document.querySelectorAll('.order-checkbox');
    checkboxes.forEach(cb => cb.checked = source.checked);
}

function submitStatus(select, orderId) {
    const form = document.getElementById('statusForm');
    form.action = `/admin/orders/${orderId}/update-status`;
    document.getElementById('statusInput').value = select.value;
    form.submit();
}
</script>

@endsection