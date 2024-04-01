<!DOCTYPE html>
<html lang="en">
<head>
<title>Read Products</title>
<script src="https://kit.fontawesome.com/2661ebd5a7.js" crossorigin="anonymous"></script>
<style> 
        .navdiv{
            display:flex;
            background-color: black;
            width:84.8%;
            padding-left: 15%;
            border: 2px solid white;     
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
        table,td{
            font-size: 20px;
            line-height: 40px;
            text-align:center;          
            letter-spacing: 1.5px;
        }
        th,td{
        padding:10px;
        }
        th{
        background:goldenrod;
        color:black;
        }
        td{
        background:black;
        color: #e7e7e6;
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
    </style>
</head>
<body style="background-color: black;">
    <div class="navdiv">
        <div>
            <img src = "{{asset('logo.jpg')}}" height="80" width="110" >
        </div>
        <h1>BARBERSHOP</h1>
        <h2>~PRODUCT DETAIL</h2>   
    </div>
  
    <div class="imageindiv">
        <img style="opacity: 0.3" src = "{{asset('salon.jpg')}}"  width="100%"> 
        <div class="centered" style="top:25%;" >
            <table>
                <thead>
                    <tr>
                    @if (session('status'))
    <div class="alert alert-success alert-dismissible" style="color :white;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('status') }}
    </div> 
    @endif
                        <th>Product Name</th>
                        <th>Weight</th>
                        <th>Price</th>
                        <th>Delete/Update</th>
                    </tr>
                </thead>
                <tbody>

<!-- Using Blade Loop. -->
<!-- From controller, the values have been
received in the array 'products'. -->
@foreach ($products as $product) 
<tr>
    <td>{{$product->product_name}}</td>
    <td>{{$product->weight}}</td>
    <td>{{$product->price}}</td>
    <td>
        <form action="{{ route('product.destroy', $product->id) }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}">
            <button type="submit"><i class="fa fa-trash"></i></button>
        </form>
        <form action="{{ route('products.edit', $product->id) }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}">
            <button type="submit"><i class="fa-sharp fa-solid fa-pen-to-square"></i></button>
        </form>
    </td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</body>
</html>