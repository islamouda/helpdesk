
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>METTCO</title>

    <style>
        .ld{
            color: red;
        }
    </style>

</head>
<body>


    <div class="jumbotron">
        <h4 class="display-4 ld" >Hi {{ $user }}</h4>
        <p class="lead"> Ticket was closed by {{ $user_id }}</p>
        <hr >
        <a href="http://172.16.0.177/ticket/{{ $ticket->id }}"><p>ticket</p></a>
        <p class="text-center">Title :{{ $title }}</p>
        <p>Subject :{{ $subject }}</p>
        <p>replay :{{ $ticket->replay }}</p>
      </div>

</body>
</html>
