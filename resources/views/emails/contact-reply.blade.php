<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Reply from Hangry Joe's</title>
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
Customer Support Reply
</h2>

<p style="color:#ccc;font-size:14px;">
Hi {{ $contact->first_name }},
</p>

<p style="color:#ccc;font-size:14px;line-height:1.6;">
Thank you for contacting Hangry Joe's Glendale Heights.  
Our team has reviewed your message and here is our response:
</p>

</td>
</tr>

<!-- CUSTOMER MESSAGE -->
<tr>
<td style="padding:0 30px 20px 30px;color:#fff;">

<div style="background:#222;padding:16px;border-radius:8px;color:#ddd;font-size:14px;line-height:1.6;">
{{ $contact->message }}
</div>

</td>
</tr>

<!-- REPLY MESSAGE -->
<tr>
<td style="padding:0 30px 30px 30px;color:#fff;">

<p style="color:#aaa;font-size:13px;margin-bottom:6px;">
Our Reply:
</p>

<div style="background:#333;padding:16px;border-radius:8px;color:#fff;font-size:14px;line-height:1.6;">
{{ $reply_message }}
</div>

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