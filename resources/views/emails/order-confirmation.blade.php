<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Order Confirmation</title>
</head>

<body style="margin:0;padding:0;background:#111;font-family:Arial,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background:#111;padding:40px 0;">
<tr>
<td align="center">

<table width="600" cellpadding="0" cellspacing="0" style="background:#1a1a1a;border-radius:12px;overflow:hidden;">

<!-- HEADER -->
<tr>
<td align="center" style="padding:30px;background:#000;border-bottom:1px solid #333;">
<img src="{{ asset('images/logo.png') }}" alt="Hangry Joes" width="160">
</td>
</tr>

<!-- TITLE -->
<tr>
<td style="padding:30px;color:#fff;">
    <h2 style="margin:0 0 10px;color:#facc15;">
        Order Confirmed
    </h2>

    <p style="color:#ccc;font-size:14px;">
        Hi {{ $order->customer_name }},
    </p>

    <p style="color:#ccc;font-size:14px;line-height:1.6;">
        Thank you for your order! Your delicious meal is now being prepared.
        Below are your order details:
    </p>
</td>
</tr>

<!-- ORDER DETAILS -->
<tr>
<td style="padding:0 30px 30px 30px;color:#fff;">

<table width="100%" cellpadding="8" cellspacing="0" style="border-collapse:collapse;">

<tr style="background:#222;">
<th align="left" style="color:#aaa;">Item</th>
<th align="center" style="color:#aaa;">Qty</th>
<th align="right" style="color:#aaa;">Price</th>
</tr>

@foreach($order->items as $item)
<tr style="border-bottom:1px solid #333;">
<td>{{ $item->product_name }}</td>
<td align="center">{{ $item->quantity }}</td>
<td align="right">${{ number_format($item->price * $item->quantity,2) }}</td>
</tr>
@endforeach

</table>

<br>

<table width="100%" style="color:#fff;font-size:14px;">
<tr>
<td>Subtotal:</td>
<td align="right">${{ number_format($order->subtotal,2) }}</td>
</tr>
<tr>
<td>Discount:</td>
<td align="right">${{ number_format($order->discount,2) }}</td>
</tr>
<tr>
<td style="font-weight:bold;font-size:16px;">Total:</td>
<td align="right" style="font-weight:bold;font-size:16px;color:#facc15;">
${{ number_format($order->total,2) }}
</td>
</tr>
</table>

<br>

<p style="color:#aaa;font-size:13px;line-height:1.8;">

Payment Method: {{ strtoupper($order->payment_method) }} <br>

Payment Status:
@if($order->payment_status == 'paid')
<span style="background:#22c55e;color:#fff;padding:4px 10px;border-radius:6px;font-size:12px;font-weight:bold;">
PAID
</span>
@else
<span style="background:#ef4444;color:#fff;padding:4px 10px;border-radius:6px;font-size:12px;font-weight:bold;">
PENDING
</span>
@endif

<br>
Order Number: {{ $order->order_number }}

</p>

</td>
</tr>

<!-- FOOTER -->
<tr>
<td align="center" style="padding:20px;background:#000;color:#777;font-size:12px;">
    Hangry Joes Glendale Heights <br>
    252 Town Center Lane, Glendale Heights, IL <br>
    (224) 653-8034
</td>
</tr>

</table>

</td>
</tr>
</table>

</body>
</html>