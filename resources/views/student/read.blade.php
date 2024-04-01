<!DOCTYPE html>
<html lang="en">
<head>
<title>Read Students</title>
</head>
<body>
<h3 style="background-color:lightgrey; color:blue; width:50%;">
Reading the Student Data 
</h3>
<table>
<thead>
<tr>
<th>Name</th>
<th>Registration No</th>
<th>Email</th>
<th>Gender</th>
<th>Date of Birth</th>
<th>City</th>

</tr>
</thead>
<tbody>
<!-- Using Blade Loop. -->
<!-- From controller, the values have been
received in the array 'students'. -->
@foreach ($students as $student6A) 
<tr>
<td>{{$student6A->name}}</td>
<td>{{$student6A->registration_no}}</td>
<td>{{$student6A->email}}</td>
<td>{{$student6A->gender}}</td>
<td>{{$student6A->dob}}</td>

<td>{{$student6A->cit->city}}</td>

<td>
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
</td>
</tr>

@endforeach
</tbody>
</table>

</body>
</html>