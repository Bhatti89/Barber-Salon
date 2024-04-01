<!DOCTYPE html>
<html lang="en">
<head>
<title>Read Department</title>
</head>
<body>
<h3 style="background-color:lightgrey; color:blue; width:50%;">
DEPARTMENT
</h3>
<table>
<thead>
<tr>
<th>Name</th>

</tr>
</thead>
<tbody>
<!-- Using Blade Loop. -->
<!-- From controller, the values have been
received in the array 'students'. -->
@foreach ($departments as $department) 
<tr>
<td>{{$department->name}}</td>

<td>
<form action="{{ route('department.destroy', $department->id) }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $department->id }}">
            <button type="submit">Delete</button>
        </form>
</td>
<td>
    <form action="{{ route('departments.edit', $department->id) }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $department->id }}">
            <button type="submit">Edit</button>
        </form>
</td>
</tr>

@endforeach
</tbody>
</table>

</body>
</html>