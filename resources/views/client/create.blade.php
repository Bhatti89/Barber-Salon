<!DOCTYPE html>
<html>
<head>
    <title>Clients</title>
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
            /* margin-top: 1%;  */
            
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
 <!-- function 'store' in the StudentController and then this -->
 <!-- view, 'create.blade.php' is again called -->
 <!-- START -->
 <div class="centered" style="top:25%;" >
 @if (session('status'))
 <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ session('status') }}
</div> 
@endif
 <!-- END -->
 
    <form action="{{ route ('client.store') }}" method="post">
        @csrf
        <label for="name">First Name &nbsp;</label>
        <input type="text" id="name" name="name"><br><br>
        <label for="L_name">Last Name &nbsp;&nbsp;</label>
        <input type="text" id="L_name" name="L_name"><br><br>
        <label for="U_name">User Name &nbsp;&nbsp;</label>
        <input type="text" id="U_name" name="U_name"><br><br>
        <label for="pass">Password &nbsp;&nbsp;&nbsp;</label>
        <input type="password" id="pass" name="pass" ><br><br>
        <label for="mail">Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="email" id="mail" name="mail"><br><br>
        <label for="gen">Gender &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <select id="gen" name="gen" required style="width:180px; height:27px;">
        <option value="" selected disabled hidden>Select</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
        </select><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" value="Submit">
    </form>
</div>
</div>
</body>
</html>
