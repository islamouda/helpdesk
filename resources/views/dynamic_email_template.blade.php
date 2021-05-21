
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .ld{
            color: red;
        }
    </style>

</head>
<body>


    <div class="jumbotron">
        <h1 class="display-4 ld" >Help Desk</h1>
        <p class="lead">This is a Ticket From .{{ $user }}</p>
        <hr>
        <a href="http://172.16.0.177/ticket/{{ $ticket }}"><p>Click here to show Ticket</p></a>
        <p class="text-center">Title :{{ $title }}</p>
        <p>Subject :{{ $subject }}</p>
       




      </div>

</body>
</html>
