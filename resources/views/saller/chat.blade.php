@extends('saller.nav')
@section('mynav')
<html dir="rtl">
    <header>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
 
        <meta charset="UTF-8">
        <link rel="stylesheet" href=" {{ URL::asset('css/chat.css') }} ">
        {{-- <script src="{{URL::asset('jquery-3.3.1.min.js')}}"></script> --}}

        <title>محادثات</title>
    </header>
    <body  >
        {{-- @foreach($data as  $value)

        @foreach ($value as $item)
        @if($loop->last)
        {{$item->messagecontent}}
        {{substr($item->messagecontent,0,8)}} 
        {{$item->pucher_id}}
        @foreach (App\Models\User::where('id',$item->pucher_id)->get() as $daitem)
            {{$daitem->name}}
        @endforeach
    @endif

            
        @endforeach
       
        <br  />
        @endforeach --}}
        


        @if (!$data->isEmpty())

        
        <div class="container" >
            <div class="row clearfix" > 
                <div class="col-lg-12"  >
                    <div class="card chat-app" >
                       <div class="chat" id="chatlistdiv"  style="height:500px;overflow: auto;width:500px" dir="ltr">

                         
                           @if(Session::has('message'))
                            @include('saller.getmessage',["data"=>Session::get('message'),"id"=>Session::get('id')])
                            @else
                            <div style="text-align: center;margin-top:100px">
                                <h1 style="color: rgb(12, 59, 100)" > ابدأ محادثه   </h1>
                            </div>
                           @endif
                        
                        </div>
                        <div id="plist" class="people-list" style="height:500px;overflow: auto;" dir="ltr">
                            <ul class="list-unstyled chat-list mt-2 mb-0">
                                
 


                                @foreach($data as  $value)

                                @foreach ($value as $item)
                                @if($loop->first)
                                {{-- {{$item->pucher_id}} --}}
                                @foreach (App\Models\User::where('id',$item->pucher_id)->get() as $daitem)
                            
                                <li class="clearfix" >
                                    <img src="{{URL::asset('/images/'.$daitem->photo)}}" alt=""  width="200px" height="60px" />
                                    {{-- <img src="" alt="avatar"> --}}
                                     <div class="about col-6">
                                         
                                        <div class="name" style="font-weight: bold"> 
                                            {{-- {{$daitem->name}}  --}}
                                            {{substr($daitem->name,0,20)}}
                                         
                                        </div>
                                        <div class="status"> ...{{substr($item->messagecontent,0,8)}}</div>                                            
                                    </div>
                                    {{-- <a class="btn btn-outline-primary" href="#" role="button"><i class="bi bi-chat-square-text"></i></a> --}}

                                        <a   href="/get_pucher_chat/{{$daitem->id}}" role="button" class="getpucherchat btn btn-outline-primary  " id="{{$daitem->id}}"><i class="bi bi-chat-square-text"></i></a>
 
                                </li>
                                @endforeach
                            @endif    
                                @endforeach
                                @endforeach




{{-- 

                                <li class="clearfix">
                                    <img src="" alt="avatar">
                                    <div class="about">
                                        <div class="name">name sender</div>
                                        <div class="status"> <i class="fa fa-circle offline"></i>messagecontent </div>                                            
                                    </div>
                                </li> --}}
                                
                                
                              
                            </ul>
                        </div>







                    </div>
                </div>
            </div>
            </div>
    @else
<div style="text-align: center;margin-top:40px">
    <h1 style="color: rgb(12, 59, 100)" >   ليس لديك رسائل </h1>
</div>
    @endif



    <script>
                var btn = document.getElementById("butone");
                var ddiv = document.getElementById("getmessagespage");
                btn.onclick(function () {
           console.log("aaa");
           ddiv.empty();
      ddiv.append("helooo");
         });

        // $(document).ready(function() {
        //     $('#butone').click(function() {
        //         // var id = $(this).attr("id");
        //    console.log("aaa");
        // });
        </script>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     

    </body>
    </html>
     
    
    {{-- <li class='clearfix'>
                                      
        <div class='message other-message float-right'> Hi Aiden, how are you? How is the project coming along? </div>
    </li>
    <li class='clearfix'>
      
        <div class='message other-message float-right'> ok hello </div>
    </li>)
    <li class='clearfix'>
      
        <div class='message my-message float-start'>Are we  </div>                                    
    </li>                               
    <li class='clearfix'>
       
        <div class='message my-message float-start'>Project has been already finished and I have results to show you.</div>
    </li> --}}
    
    
    @endsection        