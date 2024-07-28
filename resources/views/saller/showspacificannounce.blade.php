@extends('saller.nav')
@section('mynav')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{URL::asset('/css/showannounce.css')}}">

    <title>show</title>
</head>
<body>
    
    
    
        <div class="container py-2">
     
            <article class="postcard light  ">
                <a class="postcard__img_link" href="#">
                    {{-- <img class="postcard__img" src="https://picsum.photos/1000/1000" alt="Image Title" /> --}}
                </a>
                <div class="postcard__text t-dark">
                    <h1 class="postcard__title  ">    عنوان الاعلان : </h1>
                    <div class="h3 " style="margin-right: 100px"> {{$data['title']}}</div>
                    <h1 class="postcard__title  "> وصف الاعلان :</h1>
                    <div class="h5 " style="margin-right: 100px"> {{$data['description']}}</div>
                    <br>
                    <h1 class="postcard__title  ">  صور الاعمال :</h1>
                    <div class="h3 " style="margin-top: 10px"> 
                    
                        @foreach ( App\Models\AnoynceImage::where('announce_id',$data->id)->get() as $imges)
                        
                         <img src="{{URL::asset('/images/anouncements/'.$imges->image_name)}}" alt=""  width="150px" height="150px"/> 
                             
                        @endforeach
                    </div>
                     <br>
                    <h1 class="postcard__title  ">  تعليقات الاعلان:</h1>
                    <div  style="margin-top: 10px"> 
                        <div class="feedback">
                            @if(!$comments->isEmpty())
                            @foreach ($comments as $item)
                            <h3>{{App\Models\User::where('id',$item->user_id)->first()->name }}</h3>
                            <p>{{$item['body']}}</p>
                  
                            @endforeach
                           
                           @else
                              <h1>  ليس لديك تعليقات</h1>                         
                         @endif  
                                 </div>
                     
                    </div>
                     
                </div>
            </article>
           
        </div>
     
    
</body>
</html>
@endsection