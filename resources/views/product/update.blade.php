<!DOCTYPE html>
<html>
<head>
    <title>Update Product</title>
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
            margin-top: 1%;   
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
 <!-- function 'store' in the Product_Controller and then this -->
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
@if ($product)
    <form action="{{ route ('product.update', $product->id) }}" method="post">
        @csrf
        <label for="P_N">Product Name </label>
        <input type="text" id="P_N" name="P_N" value="{{$product->product_name}}" required><br><br>
        <label for="weight">Weight &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="text" id="weight" name="weight" value="{{$product->weight}}" required>><br><br>
        <label for="Pr">Price &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="text" id="Pr" name="Pr" value="{{$product->price}}" required><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" value="Update">
    </form>
@endif
</div>
</div>
</body>
</html>
