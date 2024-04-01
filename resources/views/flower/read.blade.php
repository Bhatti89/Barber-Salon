<!DOCTYPE html>
<html lang="en">
<head>
<title>Read Flowers</title>
</head>
<body>
<h3 style="background-color:lightgrey; color:red; width:30%;">
FLOWERS
</h3>
<table>
<thead>
<tr>
<th>Name</th>
<th>Type</th>

</tr>
</thead>
<tbody>
<!-- Using Blade Loop. -->
<!-- From controller, the values have been
received in the array 'flowers'. -->
@foreach ($flowers as $flower) 
<tr>
<td>{{$flower->name}}</td>
<td>{{$flower->type}}</td>



<td>
<form action="{{ route('flowers.delete', $flower->type) }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $flower->type }}">
            <button type="submit">Delete</button>
        </form>
</td>
<td>
    <form action="{{ route('students.edit', $flower->type) }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $flower->type }}">
            <button type="submit">Edit</button>
        </form>
</td>



</tr>
@endforeach
</tbody>
</table>
</body>
</html>