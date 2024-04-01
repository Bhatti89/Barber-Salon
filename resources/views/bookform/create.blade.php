<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Book Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    
</head>
<body style=font-family: Arial, sans-serif;
    background-color: #f2f2f2;>
<div style="  width: 700px;
    margin: 0 auto;
    background-color: none;
    padding: 20px;
    box-shadow: 0px 0px 5px #ccc;
    height: 600px;">
        <h1>Book form</h1>
        @if (session('status'))
    <div class="alert alert-success alert-dismissible">
       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('status') }}
    </div> 
    @endif
        <form action="{{ route ('bookform.store') }}" method="post" 
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
}" for="name">Title:</label>
            <input type="text" id="name" name="name" required>

            <label style="display: block;
    margin-bottom: 5px;
    font-weight: bold;
    margin-top: 10px;
}" for="author">Author:</label>
            <input type="text" id="author" name="author" required>

            <label style="display: block;
    margin-bottom: 5px;
    font-weight: bold;
    margin-top: 10px;
}" for="publisher">Publisher:</label>
            <input type="text" id="publisher" name="publisher" required>

            <label style="display: block;
    margin-bottom: 5px;
    font-weight: bold;
    margin-top: 10px;
}" for="y_publisher">Select a year:</label>
            <select id="y_publisher" name="y_publisher" required>
                <option value="" selected disabled hidden>Choose a year</option>
                <option value="2022">2022</option>
                <option value="2021">2021</option>
                <option value="2020">2020</option>
                <option value="2019">2022</option>
                <option value="2018">2021</option>
                <option value="2017">2020</option>
                <option value="2016">2022</option>
                <option value="2015">2021</option>
                <option value="2014">2020</option>
                <option value="2013">2022</option>
                <option value="2012">2021</option>
                <option value="2011">2020</option>
                <option value="2010">2022</option>
                <option value="2009">2021</option>
                <option value="2008">2020</option>
                <option value="2007">2022</option>
                <option value="2006">2021</option>
                <option value="2005">2020</option>
            </select>

            <label style="display: block;
    margin-bottom: 5px;
    font-weight: bold;
    margin-top: 10px;
}" for="N_pages">Number of Pages:</label>
            <input type="number" id="N_pages" name="N_pages" min="1" max="2000" required>

            <label style="display: block;
    margin-bottom: 5px;
    font-weight: bold;
    margin-top: 10px;
}" for="language">Language</label>
            <select id="language" name="language" required>
                <option value="" selected disabled hidden>Choose a language</option>
                <option value="Urdu">Urdu</option>
                <option value="English">English</option>
                <option value="Farsi">Farsi</option>
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