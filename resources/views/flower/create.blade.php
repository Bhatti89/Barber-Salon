<!DOCTYPE html>
<html>
<head>
    <title>Flower</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    
    <link rel="stylesheet" type="text/css" href="style.css">
    

<body style=font-family: Arial, sans-serif;
    background-color: gray;>
<div style="  width: 700px;
    margin: 0 auto;
    background-color: white;
    padding: 20px;
    box-shadow: 0px 0px 5px #ccc;
    height: 600px;">
        <h1>FLOWERS</h1>
        @if (session('status'))
    <div class="alert alert-success alert-dismissible">
       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('status') }}
    </div> 
    @endif
        <form action="{{ route ('flower.store') }}" method="post" 
         style="display: grid;
    grid-template-columns: 150px 350px;
    grid-gap: 10px;
    margin-top: 50px;
    margin-left: 20px;">
    
    @csrf
            <label style="display: block;
    margin-bottom: 5px;
    font-weight: bold;
    margin-top: 10px;
}" for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label style="display: block;
    margin-bottom: 5px;
    font-weight: bold;
    margin-top: 10px;
}" for="type">Flower Type</label>
            <select id="type" name="type" required>
                <option value="" selected disabled hidden>Choose a flower type</option>
                <option value="Rose">Rose</option>
                <option value="Lily">Lily</option>
                <option value="Jasmine">Jasmine</option>
                <!-- Add more options for other years -->
            </select>

           
            <input style="    background-color: #00ba32;
    color: #fff;
    padding: 15px;
    border: none;
    border-radius: 3px;
    margin-top: 20px;
    margin-left: 80px;" type="submit" value="Submit">
        </form>
    </div>
</body>
</html>