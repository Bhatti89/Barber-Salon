<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Barber City</title>
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
            font-size: 20px;
            line-height: 40px;
            text-align:center;          
            letter-spacing: 1.5px;
        }
        
        

    </style>
</head>

<body style="background-color: black;">
<div class="navdiv">
    <div>
        <img src = "{{asset('logo.jpg')}}" height="80" width="110">
    </div>
    <h1>BARBERSHOP</h1>
    <!-- <h2>~ORDER DETAIL</h2> -->
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
 
        <form action="{{ route ('city.store') }}" method="post" >
             @csrf
                <label for="city">City:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                <input type="text" id="cit" name="cit"><br><br>
                
                
                
                <a style="padding-left: 45%;"></a><input class="button" type="submit" value="Submit">
              </form>
              <!-- <form action="http://localhost/SP23_Student_MIS/public/barber/read"> -->
              <!-- <a style="padding-left: 75%;"></a><input class="button" type="submit" value="Available Barber"> -->
              <!-- </form> -->
                  
        </div>
    </div>

</body>
</html>