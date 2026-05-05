<table border="1" cellpadding="10">

<tr>
<th>ID</th>
<th>Name</th>
<th>Phone</th>
<th>Date</th>
</tr>

@foreach($requests as $req)

<tr>
<td>{{ $req->id }}</td>
<td>{{ $req->name }}</td>
<td>{{ $req->phone }}</td>
<td>{{ $req->created_at }}</td>
</tr>

@endforeach

</table>