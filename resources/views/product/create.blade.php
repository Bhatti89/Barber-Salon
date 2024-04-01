<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    
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
            font-size: 20px;
            line-height: 40px;
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
    <h2>~PRODUCT DETAIL</h2>
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

    <form action="{{ route ('product.store') }}" method="post">
        @csrf
        <label for="product_name">Product Name </label>
        <input type="text" id="product_name" name="product_name"><br><br>
        <label for="weight">Weight &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="text" id="weight" name="weight"><br><br>
        <label for="price">Price &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="text" id="price" name="price"><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" value="Submit">
    </form>
    </div>
    </div>
</body>
</html>
