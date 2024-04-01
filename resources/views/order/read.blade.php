<!DOCTYPE html>
<html lang="en">
<head>
<title>Read Orders</title>
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
            font-size: 17px;
            line-height: 30px;
            text-align:center;          
            letter-spacing: 1.3px;
        }
        label{
            color:goldenrod;
            font-size: 20px;
            line-height: 40px;
            text-align:center;          
            letter-spacing: 1.5px;
            font-weight:bold;
        }
        th,td{
        padding:5px;
        }
        th{
        font-size: 20px;
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
        <img src = "{{asset('logo.jpg')}}" height="80" width="110" >
        </div>
        <h1>BARBERSHOP</h1>
        <h2>~ORDER DETAIL</h2>
    </div>
    
    <div class="imageindiv">
        <img style="opacity: 0.3" src = "{{asset('salon.jpg')}}"  width="100%"> 
    
        @csrf
        
        <div class="centered" style="top:200px" >
        @if (session('status'))
    <div class="alert alert-success alert-dismissible" style="background-color:lightgreen;color:black;">
       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('status') }}
    </div> 
    @endif
            <form action="{{ route ('order.mail') }}" method="post">
                @csrf
            <label for="CusEmail"> Enter Your Email: </label>
            <input type="email" id="email" name="email" style="width:180px;"><br><br>
            <input  type="submit" value="Submit">
        </form>
        @if($orders)
            <table style="padding-top:15%">

                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Customer Email</th>
                        <th>Purchase Date</th>
                        <th>Payment Method</th>  
                        <th>Ordered Products</th>                 
                        <th>Delete/Update</th>
                    </tr>
                </thead>
                <tbody>

<!-- Using Blade Loop. -->
<!-- From controller, the values have been
received in the array 'products'. -->
@foreach ($orders as $order)
@if($client==$order->client_id) 
<tr>
    <td>{{$order->client->first_name}}{{" "}}{{$order->client->last_name}}</td>
    <td>{{$order->client->email}}</td>
    <td>{{$order->purchase_date}}</td>
    <td>{{$order->payment_method}}</td>
    <td>
        @foreach ($per as $p)
            @if ($order->id == $p->order_id)
                {{$p->product->product_name}}
            @endif
        @endforeach

    <td>
        <form action="{{ route('order.destroy', $order->id) }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $order->id }}">
            <button type="submit"><i class="fa fa-trash"></i></button>
        </form>
        <form action="{{ route('orders.edit', $order->id) }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $order->id }}">
            <button type="submit"><i class="fa-sharp fa-solid fa-pen-to-square"></i></button>
        </form>
    </td>
</tr>
@endif
@endforeach

</tbody>
</table>
@endif
</div>

</div>
</body>
</html>