<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/2661ebd5a7.js" crossorigin="anonymous"></script>
    <title>Email Read</title>
    <style>
        tr{
            /* color:blue; */
            font-size:22px;
           
        }
        th{
            color:blue;
        }
        th,td{
            padding:10px;
            border:2px solid black;
        }
    </style>
</head>

<!-- <body style="background-color:lightyellow;"> -->
<!-- <center> -->
<table>
                    <thead>
                        <tr>
                            
                            <th>Name</th>
                            <th>View</th>
                            <th>Download</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $bar) 
                        <tr>
                            <td>{{$bar->file}}</td>
                            <td><a href="{{URL::to('view_file',$bar->id)}}"><i class="fa-solid fa-eye"></i></a></td>
                            <td><a href="{{URL::to('download_file', $bar->file)}}"><i class="fa-solid fa-download"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
<!-- </center> -->
</body>
</html>