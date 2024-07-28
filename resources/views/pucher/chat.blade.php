<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href=" {{ URL::asset('css/pucherchat.css') }} ">
   
    <title>الرسائل</title>
</head>
<body style="margin: 0%">
    <nav class="navbar navbar-expand-lg " style="background-color:#c3d6e0">
        <div class="container-fluid">
      
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent" >
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              @auth
              @if (auth()->user()->role =="pucher")
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/showpucherchat" ><span style="font-weight: bold;color:rgb(45, 33, 33);font-size:1.5rem">الرسائل</span></a>
              </li>

              <li class="nav-item ms-3">
                <a class="nav-link" href="/favorat"><span style="font-weight: bold;color:rgb(18, 16, 16);font-size:1.5rem"> المفضله</span></a>
              </li> 
              @endif
              
              @endauth
              
              <li class="nav-item ms-3">
                <a class="nav-link   " href="/" tabindex="-1" aria-disabled="true"> <span style="font-weight: bold;color:rgb(18, 16, 16);font-size:1.5rem">من  نحن</span> </a>
              </li>
            
              <li class="nav-item ms-3">
                <a class="nav-link   " href="/" tabindex="-1" aria-disabled="true"><span style="font-weight: bold;color:rgb(18, 16, 16);font-size:1.5rem">الرئيسيه</span></a> 
              </li>
            </ul>
            <form class="d-flex" style="margin-left:150px;margin-top:-2px" method="POST" action="/searchdata">
              @csrf
              <input class="form-control me-2" type="search" placeholder="ابحث باسم الاعلان" aria-label="Search" name="search" required>
              <button class="btn btn-outline-success" type="submit">بحث</button>
            </form>
          </div>
          @if (Auth::check())
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="route('logout')"
                    onclick="event.preventDefault();
                    this.closest('form').submit();"><button type="button" class="btn btn-outline-primary h1"   ><i class="bi bi-box-arrow-right"></i> تسجيل&nbsp; خروج</button>

            </a>
        </form> 
          @else
          <a type="button" class="btn btn-outline-primary h1" href="/login" > الدخول <i class="bi bi-box-arrow-in-left"></i></a>&nbsp; &nbsp;
          <a type="button" class="btn btn-outline-primary h1"   href="/register" > التسجيل  <i class="bi bi-r-circle"></i> </a> 
          @endif
          

          <img src="{{URL::asset('/images/IMG-20240429-WA0091.jpg')}}" alt="" width="60px" height="60px" style="border-radius: 10px;margin-right:50px">
          
        </div>
      </nav>
 

<br>

{{-- {{$data}} --}}
      
      @if (!$data->isEmpty())

        
      <div class="container" >
          <div class="row clearfix" > 
              <div class="col-lg-12"  >
                  <div class="card chat-app" >
                     <div class="chat" id="chatlistdiv"  style="height:500px;overflow: auto;width:700px" dir="ltr">

                       
                         @if(Session::has('message'))
                          @include('pucher.getmessage',["data"=>Session::get('message'),"id"=>Session::get('id')])
                          @else
                          <div style="text-align: center;margin-top:100px">
                              <h1 style="color: rgb(12, 59, 100)" > ابدأ محادثه   </h1>
                          </div>
                         @endif
                      
                      </div>
                      <div id="plist" class="people-list " style="height:500px;overflow: auto;" dir="ltr">
                          <ul class="list-unstyled chat-list mt-2 mb-0 ">
                              



                              @foreach($data as  $value)

                              @foreach ($value as $item)
                              @if($loop->first)
                              {{-- {{$item->pucher_id}} --}}
                              @foreach (App\Models\User::where('id',$item->saller_id)->get() as $daitem)
                          
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

                                      <a   href="/get_saller_chat/{{$daitem->id}}" role="button" class="getpucherchat btn btn-outline-primary  " id="{{$daitem->id}}"><i class="bi bi-chat-square-text"></i></a>

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