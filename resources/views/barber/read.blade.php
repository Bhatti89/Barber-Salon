<!DOCTYPE html>
<html lang="en">
<head>
<title>Read Barber</title>
</head>
<body>
<h3 style="background-color:lightgrey; color:blue; width:50%;">
Reading the Barber Data 
</h3>
<table>
<thead>
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Gender</th>
<th>User name</th>
<th>Password</th>
</tr>
</thead>
<tbody>
<!-- Using Blade Loop. -->
<!-- From controller, the values have been
received in the array 'students'. -->
@foreach ($barbers as $barber) 
<tr>
<td>{{$barber->first_name}}</td>
<td>{{$barber->last_name}}</td>
<td>{{$barber->email}}</td>
<td>{{$barber->gender}}</td>
<td>{{$barber->user_name}}</td>
<td>{{$barber->password}}</td>
<!-- <td>
<form action="{{ route('students.destroy', $student6A->registration_no) }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $student6A->registration_no }}">
            <button type="submit">Delete</button>
        </form>
</td>
<td>
    <form action="{{ route('students.edit', $student6A->registration_no) }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $student6A->registration_no }}">
            <button type="submit">Edit</button>
        </form>
</td> -->
</tr>

@endforeach
</tbody>
</table>

</body>
</html>