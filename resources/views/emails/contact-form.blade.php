<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Thank You for Contacting Us</title>
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
Thank You for Contacting Us!
</h2>

<p style="color:#ccc;font-size:14px;">
Hi {{ $contact->first_name }},
</p>

<p style="color:#ccc;font-size:14px;line-height:1.6;">
We received your message and our team will get back to you shortly.
We appreciate you reaching out to Hangry Joe’s Glendale Heights.
</p>

</td>
</tr>

<!-- MESSAGE SUMMARY -->
<tr>
<td style="padding:0 30px 30px 30px;color:#fff;">

<table width="100%" cellpadding="8" cellspacing="0" style="border-collapse:collapse;">

<tr style="border-bottom:1px solid #333;">
<td style="color:#aaa;">Subject</td>
<td>{{ $contact->subject }}</td>
</tr>

<tr style="border-bottom:1px solid #333;">
<td style="color:#aaa;">Your Message</td>
<td>{{ $contact->message }}</td>
</tr>

</table>

</td>
</tr>

<!-- FOOTER -->
<tr>
<td align="center" style="padding:20px;background:#000;color:#777;font-size:12px;">
Hangry Joe's Glendale Heights <br>
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