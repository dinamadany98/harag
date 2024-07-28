<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{URL::asset('/css/register.css')}}">
    
    <link rel="stylesheet" href="{{URL::asset('/css/chosefeld.css')}}">


<style>
@import url('https://fonts.googleapis.com/css2?family=Changa:wght@200..800&display=swap');

 
 
</style>
    

    <body  style="background-color: #e5e7eb ;overflow-x: hidden">
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

              @auth
              @if (auth()->user()->role =="saller")
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/dashboard" ><span style="font-weight: bold;color:rgb(45, 33, 33);font-size:1.5rem">لوحه القياده </span></a>
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
 

 
<div   >
<div style="width:70% ; display:inline-block;" class="mt-3">
  <h1> <span style="color: blue ;font-weight:bolder" class="ms-3 mt-1"   onclick="history.back()"><i class="bi bi-arrow-right"></i></span>  </h1>
   
</div>
<div style="width:25% ;display:inline-block;" class="mt-3">
   <h3> <span style="color: blue"> عروض مشابهه </span>  </h3>
    
</div>


</div>
<div class="row " style="margin-right: 0px" >


<div style="width:800px ; display:inline-block;background-color:white;border-radius: 5px " class="mt-3 ms-4 p-1" >
  <div  style="width:790px ;background-color:#e5e7eb;border-radius: 10px;height:160px " class="p-2">
    <h2 style="font-family:lucida calligraphy,cursive;color:green">{{$announcement->title}}  
    
    
    
    </h2> 
<br>

<img src="{{URL::asset('/images/'.$user->photo)}}" alt="" width="80px"  height="80px" style="border-radius: 50%">

<span style="font-weight: bold;color:blue;"  >
  {{$user->name}} &nbsp;&nbsp; 
  
  
<p style="display:inline-block"  >
 
  @forelse (App\Models\Rate::where('announcement_id',$announcement->id)->get()->groupBy('announcement_id')  as $item)
        
   {{ROUND($item->AVG('rate'), 2)}} <i class="bi bi-star-half"></i>
  @empty
    0 <i class="bi bi-star"></i>
  @endforelse
   
  </p>
</span>
 
  </div>
    <br>
  <h4 class="ms-2 mb-2 col-6">
    {{$announcement->description}}
</h4>
<div class="mt-4 ms-2">
  @forelse (App\Models\AnoynceImage::where('announce_id',$announcement->id)->get() as $imges)
          
  <img src="{{URL::asset('/images/anouncements/'.$imges->image_name)}}" alt=""  width="350px" height="300px" class="mt-2"/> 
      
      
  @empty
  <img src="{{URL::asset('/images/anouncements/123.jpg')}}" alt=""  width="350px" height="300px" class="mt-2"/> 
      
  @endforelse
</div>
<br>
<p> <span style="font-weight: bolder" class="h2">التواصل    : </span> <h3 class="me-5"> <i class="bi bi-telephone-plus text-primary"></i> {{$user->phonenumber}}+ <br>  
<br>
</div>
 
<div style="width:25% ;display:inline-block;background-color:white;height:600px;overflow:auto;" class="mt-3 ms-1 p-1">
  <div  >
 @forelse (App\Models\Announcement::where('department',$announcement->department)->get() as $item)
 @forelse (App\Models\AnoynceImage::where('announce_id',$item->id)->get() as $imges)
 

 @if($loop->first)
 <a href="/showmainann/{{$item->id}}"  >   
 <img src="{{URL::asset('/images/anouncements/'.$imges->image_name)}}" alt=""  width="150px" height="100px" class="mt-2"/> 
</a> 
     @endif 


 @empty
 <a href="/showmainann/{{$item->id}}"  >   
 <img src="{{URL::asset('/images/anouncements/123.jpg')}}" alt=""  width="150px" height="100px" class="mt-2"/> 
 </a>
 @endforelse





 @empty
     <h1>لا توجد عروض مشابهه</h1>
 @endforelse
</div>

</div>
</div>
<div style="width:800px ; display:inline-block;background-color:white;border-radius: 5px " class="mt-3 ms-4 p-1" >
<p> 
 
 
  <span style="display:inline">
  
  
  
    @if (!(App\Models\Favorat::where([['announcement_id',$announcement->id],['user_id',auth()->user()->id]])->get())->isEmpty())
               

    <form action="/favorat" method="POST"  style="display: inline" >
     @csrf
     <input type="hidden" name="announcement_id" value="{{$announcement->id}}" style="display: inline">
     <input type="hidden" name="saller_id" value="{{$user->id}}" style="display: inline">
      <button type="submit" class="btn btn-outline-danger  "  style="display: inline"  ><i class="bi bi-suit-heart-fill"></i> مفضله</button>
 </form>




         
    @else
    <form action="/favorat" method="POST" style="display: inline" >
     @csrf
     <input type="hidden" name="announcement_id" value="{{$announcement->id}}" style="display: inline">
     <input type="hidden" name="saller_id" value="{{$user->id}}" style="display: inline">
      <button type="submit" class="btn btn-outline-dark " style="display: inline"  ><i class="bi bi-suit-heart-fill"></i> مفضله</button>
 </form>
         
    @endif
  </span>

  <span style="display:inline;margin-right:100px;">
    <button type="button" class="btn btn-outline-primary " data-bs-toggle="modal" data-bs-target="#exampleModal2" data-bs-whatever="@mdo"><i class="bi bi-chat-square-text"></i> مراسله</button>
  </span>

  <span  style="display:inline;margin-right:100px;">

    <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#rateModal" data-bs-whatever="@mdo"><i class="bi bi-star"></i> تقييم</button>

  </span>
  <span  style="display:inline;margin-right:100px;">

    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="bi bi-flag"></i> إبلاغ</button>

  </span>
</p>

</div>
<br>
<br>
<div   style="width:800px ; display:inline-block;border-radius: 5px ">
  @foreach (App\Models\Comment::where('announcement_id',$announcement->id)->get() as $item)

<div style="width:800px ; display:inline-block;background-color:white;border-radius: 5px " class="mt-3 ms-4 p-1 mb-3" >

  <div class="card">
    <div class="card-header">
      {{App\Models\User::where('id',$item->user_id)->first()->name }}
    </div>
    <div class="card-body">
       
       
      <h5 class="card-title">{{$item['body']}}</h5>
   
    </div>
  </div>
</div>
@endforeach
</div>

<div   style="width:800px ; display:inline-block;border-radius: 5px ">
 
<div style="width:800px ; display:inline-block;background-color:white;border-radius: 5px " class="mt-3 ms-4 p-2 mb-3" >

  <form action="/comment" method="POST" >
    @csrf
    <input type="hidden" name="announcement_id" value="{{$announcement->id}}">
    <input type="hidden" name="saller_id" value="{{$user->id}}">
    <div class="form-floating">
        <textarea class="form-control"  name="body" id="floatingTextarea" style="height: 100px"></textarea>
        <label for="floatingTextarea">اكتب تعليق</label>
      </div>
     <button type="submit" class="btn btn-primary mt-2">أضافة تعليق</button>
</form>

</div>
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/report" method="POST" >
            @csrf
            <input type="hidden" name="saller_id" value="{{$user->id}}">
          <div class="mb-3">
            <label for="message-text" class="col-form-label"> سبب الابلاغ</label>
            <textarea class="form-control" id="message-text" required name="reson"></textarea>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
        <button   type="submit" class="btn btn-primary">إرسال</button>
    </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/chat" method="POST" >
            @csrf
            <input type="hidden" name="saller_id" value="{{$user->id}}">
          <div class="mb-3">
            <label for="message-text" class="col-form-label"> نص الرساله</label>
            <textarea class="form-control" id="message-text" required name="messagecontent"></textarea>
          </div>
        
      </div>
      <div class="modal-footer">
         <button   type="submit" class="btn btn-primary">إرسال</button>
    </form>
      </div>
    </div>
  </div>
</div>






<div class="modal fade" id="rateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">اضف تقييم</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/rate" method="POST" >
        @csrf
      <div class="modal-body">
      
          <input type="hidden" name="announcement_id" value="{{$announcement->id}}">
          <input type="hidden" name="saller_id" value="{{$user->id}}">
         
          <div class="mb-3">
             <input type="number" name="rate" min="1" max="5" class="form-control"   />
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary ">أضافة تقييم</button>
      </div>
    </form>

    </div>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script></head> 
</body>
</html>