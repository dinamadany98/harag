@extends('saller.nav')
@section('mynav')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Notification</title>
</head>
<body>
   <div class="row ms-4" style="margin-top: 50px">
    @foreach (auth()->user()->Notifications as $notification)
    <div><a class="dropdown-item" href="announcement/{{$notification->data['announcement_id']}}">
      <h3>  قامت  {{$notification->data['user_create']}} بالتعليق على إعلان لك<br></h3> 
       
  <br> فى تمام {{$notification->created_at}} <br>

___ ___ ___ ___ ___ ___ ___ ___ ___ ___ ___ ___ ___ ___ ___ ___ ___ ___</a></div>
        
    @endforeach
    </div> 
</body>
</html>




@endsection