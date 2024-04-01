<!DOCTYPE html>
<html>
<head>
    <title>Update Client</title>
    <!-- For Success alert that appears after deletion -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     <style>    
        .navdiv{
            display:flex;
            background-color: black;
            width:100%;
            padding-left: 15%;
            border: 2px solid white;
            margin:10px;
        }
        h1{       
            font-family: 'S&s hilborn four',sans-serif;
            color:goldenrod;
            letter-spacing: 15px;
            text-align: center;
        }
         h2{
            font-family: 'S&s hilborn four',sans-serif;
            color:white;
            letter-spacing: 5px;
        } 
         .imageindiv{
            position: relative;                     
        } 
        .centered {
            position: absolute;
            top: 10%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        label{
            color:goldenrod;
            font-size: 19px;
            line-height: 30px;
            text-align:center;          
            letter-spacing: 1.5px;
        }
        input[type=submit] {
            background-color: goldenrod;
            color: white;
            padding: 8px 17px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }
        input[type=submit]:hover {
            background-color: black;
        }
    </style>
</head>
<body style="background-color: black;">
<div class="navdiv">
    <div>
        <img src = "{{asset('logo.jpg')}}" height="80" width="110">
    </div>
    <h1>BARBERSHOP</h1>
    <h2>~CLIENT DETAIL</h2>
</div>
    <div class="imageindiv">
        <img style="opacity: 0.3" src = "{{asset('salon.jpg')}}"  width="100%"> 
        
 <!-- For Redirecting With Flashed Session Data when 'Submit' button -->
 <!-- is pressed in the 'create.blade.php' view which calls the relevant -->
 <!-- function 'store' in the Client_Controller and then this -->
 <!-- view, 'create.blade.php' is again called -->
 <!-- START -->
     @if (session('status'))
    <div class="alert alert-success alert-dismissible">
       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('status') }}
    </div> 
    @endif
    <!-- END -->
    <div class="centered" style="top:25%;" >
    @if ($client)
    <form action="{{ route ('client.update', $client->id) }}" method="post">
        @csrf
        <label for="name">First Name &nbsp;</label>
        <input type="text" id="name" name="name" value="{{$client->first_name}} " required><br><br>
        <label for="L_name">Last Name &nbsp;</label>
        <input type="text" id="L_name" name="L_name" value="{{$client->last_name}} " required><br><br>
        <label for="U_name">User Name &nbsp;</label>
        <input type="text" id="U_name" name="U_name"value="{{$client->user_name}} " required><br><br>
        <label for="pass">Password &nbsp;&nbsp;</label>
        <input type="text" id="pass" name="pass" value="{{$client->password}} " required><br><br>
        <label for="email">Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="email" id="email" name="mail" value="{{$client->email}}" required><br><br>
        <label for="gen">Gender &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="text" id="gen" name="gen" value="{{$client->gender}}" required><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" value="Update">
    </form>
    @endif
</div>
</div>
</body>
</html>
