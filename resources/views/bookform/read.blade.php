<!DOCTYPE html>
<html lang="en">
<head>
<title>Read Book Data</title>
</head>
<body>
<h3 style="background-color:lightgrey; color:blue; width:50%;">
Reading the Book Data 
</h3>
<form action="{{ route('bookform.read') }}" method="POST">
    @csrf
    <label for="book_name">Enter Book Title: </label>
    <input type="text" id="book_name" name="book_name">
    <button type="submit">Search</button>
</form>
<table>   
<thead>
<tr>
<th>Title</th>
<th>Author</th>
<th>Publisher</th>
<th>Year of Publish</th>
<th>No of Pages</th>
<th>Language</th>
</tr>
</thead>
<tbody>
<!-- Using Blade Loop. -->
<!-- From controller, the values have been
received in the array 'students'. -->
@foreach ($students as $student6A) 
<tr>
<td>{{$student6A->name}}</td>
<td>{{$student6A->author}}</td>
<td>{{$student6A->publisher}}</td>
<td>{{$student6A->year_of_publisher}}</td>
<td>{{$student6A->Number_of_pages}}</td>
<td>{{$student6A->language}}</td>
</tr>

@endforeach
</tbody>
</table>
</body>
</html>