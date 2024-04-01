<!DOCTYPE html>
<html>
<head>
    <title>Update Student</title>
    <!-- For Success alert that appears after deletion -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <h2 style="border: 1px solid black; background-color:DodgerBlue; text-align:center;">
    Update Student Record
    </h2>
 <!-- For Redirecting With Flashed Session Data when 'Submit' button -->
 <!-- is pressed in the 'create.blade.php' view which calls the relevant -->
 <!-- function 'store' in the StudentController and then this -->
 <!-- view, 'create.blade.php' is again called -->
 <!-- START -->
     @if (session('status'))
    <div class="alert alert-success alert-dismissible">
       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('status') }}
    </div> 
    @endif
 <!-- END -->

 @if ($student)
    <form action="{{ route ('student.update', $student->registration_no) }}" method="post">
        @csrf
        <label for="name">Name: &nbsp;</label>
        <input type="text" id="name" name="name" value="{{$student->name}} " required><br><br>
        
        <label for="email">Email: &nbsp;</label>
        <input type="email" id="email" name="email" value="{{$student->email}}" required><br><br>
        <label for="gen">Gender: &nbsp;</label>
        <input type="text" id="gen" name="gen" value="{{$student->gender}}" required><br><br>
        <label for="Dob">Date of Birth: &nbsp;</label>
        <input type="text" id="Dob" name="Dob" value="{{$student->dob}}" required><br><br>
        
        <input type="submit" value="Update">
    </form>
@endif
</body>
</html>
