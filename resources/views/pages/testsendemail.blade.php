<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Document</title>
</head>
<body>
  


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Ticket</th>
      <th scope="col">Send_email</th>

    </tr>
  </thead>
  <tbody>
    @foreach ($tickets as $ticket)
    <tr>
      <th scope="row">{{$ticket->id}}</th>
      <td>{{$ticket->title}}</td>
      <td>
        <a href="{{ route('re_send',['id'=>$ticket->id]) }}">
      <button type="button" class="btn btn-primary">{{$ticket->send_email}}</button>
      </a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>


                        

</body>
</html>