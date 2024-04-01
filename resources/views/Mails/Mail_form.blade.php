<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Form</title>
    <style>
        body {
            /* font-family: Arial, sans-serif; */
            background-color: #fff;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .form_body {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="email"],
        input[type="text"],
        textarea {
            width: 95%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            transition: border-color 0.3s ease;
            color: #333;
        }

        input[type="email"]:focus,
        input[type="text"]:focus,
        textarea:focus {
            outline: none;
            border-color: #6c63ff;
        }

        textarea {
            height: 120px;
            resize: vertical;
        }

        .file-label {
            margin-top: 10px;
            display: block;
            font-weight: bold;
            color: #333;
        }

        .submit {
            padding: 12px 24px;
            background-color: green;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .submit:hover {
            background-color: #39e600;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form_body">
            <center>
            <h1 style="color:green; ">Email Form</h1>
            </center>
            <form action="{{ route('send_mail') }}" method="post"  enctype="multipart/form-data">
                @csrf
                <label for="email">To</label>
                <input type="email" name="email" id="email" placeholder="Enter email address">

                <label for="cc">CC</label>
                <input type="email" name="cc" id="cc" placeholder="Enter email address">

                <label for="bcc">BCC</label>
                <input type="email" name="bcc" id="bcc" placeholder="Enter email address">

                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" placeholder="Enter subject">

                <label for="details">Message</label>
                <textarea name="details" id="details" cols="30" rows="5"></textarea>

                <!-- <h2>Attachments</h2>
                <label for="file" class="file-label">Add files:</label>
                <input type="file" name="file" id="file" multiple> -->
                <h2>Attach File</h2>
                <label for="">Please Upload file here</label> <small>&nbsp;(required|files:pdf,doc,docx,xls,xlsx,csv,zip,rar,jpg,jpeg,png,txt|max:45MB)</small><br><br><br><br>
                <input type="file" name="file" ><br><br>
                <center>
                <input class="submit" type="submit" name="SubmitButton" value="Send">
                </center>
            </form>
        </div>
    </div>
</body>
</html>
