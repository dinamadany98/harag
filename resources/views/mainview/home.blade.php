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

    .asd{
	margin-right: 30px;
	list-style: none;
	font-size: 18px;
	color: #962c2c;
	display: inline-block;
	margin-right: 25px;
	position: relative;
	cursor: pointer;
	font-family: Poppins-Regular, sans-serif;
}
.menu-active{

color:#0A76D8;
border-bottom: 4px solid black;

}
</style>
    

    <body >
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
          <a type="button" class="btn btn-outline-primary h1"   href="/register" >  التسجيل  جديد <i class="bi bi-r-circle"></i> </a> 
          @endif
          

          <img src="{{URL::asset('/images/IMG-20240429-WA0091.jpg')}}" alt="" width="60px" height="60px" style="border-radius: 10px;margin-right:50px">
          
        </div>
      </nav>
 






      <section class="featured spad" style="margin-top: -40px;margin-right:20px" >
        <div style="width: 100%;" class="row"  >
          <div class="col-2" style="width: 300px; "    >
            <div class="card">
              <div class="card-header" style="background-color: blue;color:white">
                <i class="bi bi-search"></i> بحث متقدم
              </div>
              <div class="card-body">
                <form  method="POST"  action="/advancedsearch" > 
                  @csrf
              
                <h5 class="card-title"> اختر الخدمه
                  <select class="form-select mt-2" aria-label=" select example" name="selectannounce">
                    <option  value="نجار">نجار</option>
                    <option value="حداد">حداد</option>
                    <option value="كهربائى">كهربائى</option>
                    <option value="سباك">سباك</option>
                    <option  value="تقنى">تقنى</option>
                    <option value="مبرمج">مبرمج</option>
                    <option value="مصمم">مصمم</option>
                    <option value="فاتح اقفال">فاتح اقفال</option>
                  </select>
                </h5>
                <h5 class="card-title">اختر المنطقه
                  <select class="form-select mt-2" aria-label=" select example" name="selectcontary">
                    <option >الرياض</option>
                    <option  >جدة</option>
                    <option  >مكة</option>
                    <option  >المدينة المنوره</option>
                    <option  >الدمام</option>
                    <option >تبوك</option>
                    <option  >بريدة</option>
                    <option > الطائف</option>
                  </select>
                </h5>
                 <button type="submit"   class="btn btn-primary" >بحث </button>
                </form>
              </div>
            </div>
          </div> 
        <div class="col-10" style="width: 70%;display:inline"    >
            <div class="row">
                <div style="">
                   
                    <div class="featured__controls" style="border: 2px solid rgb(206, 202, 202);border-radius: 50px;padding:5px" >
                        <ul  >
                           <a href="/"><li class="asd" style="margin-right: 35px;font-size: 25px;font-weight: bold;"><span class="{{ (request()->is('/') && !Session::has('data')) ? 'menu-active' : '' }}">الكل</span>   </li></a> 
                            <a href="/filterdata/نجار" ><li   style="margin-right: 30px;font-size: 30px;font-weight: bold;" > <span class="{{ (Session::get('data')=='نجار') ? 'menu-active' : '' }}">نجار</span></li></a>
                            <a href="/filterdata/حداد" class=asd"><li style="margin-right: 30px;font-size: 30px;font-weight: bold;"><span class="{{ (Session::get('data')=='حداد') ? 'menu-active' : '' }}" >حداد</span> </li></a>
                            <a href="/filterdata/كهربائى" class=asd"><li style="margin-right: 30px;font-size: 30px;font-weight: bold;"><span class="{{ (Session::get('data')=='كهربائى') ? 'menu-active' : '' }}">كهربائى</span></li></a>
                            <a href="/filterdata/سباك" class=asd"><li style="margin-right: 30px;font-size: 30px;font-weight: bold;"><span class="{{ (Session::get('data')=='سباك') ? 'menu-active' : '' }}">سباك</span>  </li></a>
                            <a href="/filterdata/فاتح اقفال" class=asd"><li style="margin-right: 30px;font-size: 30px;font-weight: bold;" ><span class="{{ (Session::get('data')=='فاتح اقفال') ? 'menu-active' : '' }}">فاتح اقفال</span></li></a>
                            <a href="/filterdata/تقنى" class=asd"><li style="margin-right: 30px;font-size: 30px;font-weight: bold;"><span class="{{ (Session::get('data')=='تقنى') ? 'menu-active' : '' }}">تقنى</span> </li></a>
                            <a href="/filterdata/مصمم" class=asd"><li style="margin-right: 30px;font-size: 30px;font-weight: bold;"><span class="{{ (Session::get('data')=='مصمم') ? 'menu-active' : '' }}">مصمم</span></li></a>
                            <a href="/filterdata/مبرمج" class=asd"><li style="margin-right: 30px;font-size: 30px;font-weight: bold;"><span class="{{ (Session::get('data')=='مبرمج') ? 'menu-active' : '' }}">مبرمج</span></li></a>

                        </ul>
                    </div>
                </div>
            </div>
            @if(Session::has('message'))
            @include('mainview.filter',["data"=>Session::get('message')])
            @else
            <div class="row featured__filter ms-1">
                @forelse (App\Models\Announcement::get() as $item)
                <div class="card ms-1 mt-3" style="width: 18rem;">
                  
                  @forelse (App\Models\AnoynceImage::where('announce_id',$item->id)->take(1)->get() as $imges)
                  <img src="{{URL::asset('/images/anouncements/'.$imges->image_name)}}" class="card-img-top mt-2" alt="..." height="200px" width="100px" height="200px">
                      
                  @empty
                  <img src="{{URL::asset('/images/anouncements/123.jpg')}}" class="card-img-top mt-2" alt="..." height="200px" width="100px" height="200px">
                      
                  @endforelse

                  <div class="card-body">
                    <h5 class="card-title" style="height: 150px">{{substr($item->title,0,2000)}}  ....</h5>
                  
                    
                    <a href="/showmainann/{{$item->id}}" class="btn btn-primary mb-3" style="margin-bottom: 2px">تفاصيل</a>
                  </div>
                </div>   
                @empty
                <div style="text-align: center;margin-top:100px">
                  <h1 style="color: rgb(12, 59, 100)" > لا توجد إعلانات متاحه  </h1>
                </div>
                            </div>
                @endforelse





           @endif
        </div>
  
        
      </div>
    </section>

<div><br>
  @php
  $duplicates= [];
  @endphp

  @foreach (App\Models\Rate::get()->groupBy('announcement_id')  as $item)
  @php
   $duplicates[] = $item->AVG('rate');
  @endphp    
  @endforeach
  @php
  if ($duplicates !=null) {
    $collection = collect($duplicates);
  $sorted = $collection->sortDesc()->toArray(); 
  }
   
  @endphp



<div style="margin-right: 20px;width:85%;" >
  <div class="row">
    <div class="col-5 ">
      
      

<h3>  أخر الاعلانات ظهورا</h3>
<br>
      <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src={{URL::asset('/images/anouncements/IMG-20240429-WA0091.jpg')}} class="d-block w-100" alt="" height="200px">
            
          </div>
       @forelse (App\Models\Announcement::orderBy('id', 'desc')->get() as $itemannounce) 
       <div class="carousel-item">

 
        @forelse (App\Models\AnoynceImage::where('announce_id',$itemannounce->id)->take(1)->get() as $imges)
          
        <a href="/showmainann/{{$itemannounce->id}}"><img  src="{{URL::asset('/images/anouncements/'.$imges->image_name)}}"  class="d-block w-100" alt="..." height="200px"></a>
                
            @empty
            
            <a href="/showmainann/{{$itemannounce->id}}"><img  src="{{URL::asset('/images/anouncements/123.jpg')}}" class="d-block w-100" alt="..." height="200px"></a>
                
            @endforelse


         <p >  <span style="color: black">{{substr($itemannounce["title"],0,2000)}}  ....</span>


      </div>
       @empty
       {{-- <div style="text-align: center;margin-top:100px">
        <h1 style="color: rgb(12, 59, 100)" > لا توجد إعلانات متاحه  </h1>
      </div> --}}
       @endforelse
          
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

    </div>
<div class="col-5 ms-1">
 


  <h3>الاعلانات الاعلى  تقييما</h3>
<br>
  <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
    
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src={{URL::asset('/images/anouncements/IMG-20240429-WA0091.jpg')}} class="d-block w-100" alt="" height="200px">
      </div>



      @forelse (App\Models\Rate::get()->groupBy('announcement_id')  as $itemss)
 
      @if (in_array($itemss->AVG('rate'), array_slice( $sorted, 0, 5)))
      @foreach ($itemss as $item)
      @if ($loop->first)
   
      @foreach(App\Models\Announcement::where('id',$item->announcement_id)->get() as $itemannounce) 
      
      <div class="carousel-item">

         
        
            @forelse (App\Models\AnoynceImage::where('announce_id',$itemannounce->id)->take(1)->get() as $imges)
          
            <a href="/showmainann/{{$itemannounce->id}}"><img  src="{{URL::asset('/images/anouncements/'.$imges->image_name)}}"  class="d-block w-100" alt="..." height="200px"></a>
                
            @empty
            
            <a href="/showmainann/{{$itemannounce->id}}"> <img  src="{{URL::asset('/images/anouncements/123.jpg')}}" class="d-block w-100" alt="..." height="200px"></a>
                
            @endforelse


        
        <p >  <span style="color: black">{{substr($itemannounce["title"],0,2000)}}  ....</span>
        </p>
      
      </div>
   @endforeach
   
      @endif
         
      @endforeach
      
      @endif

      @empty


      @forelse(App\Models\Announcement::get() as $itemannounce) 
      
      <div class="carousel-item">

         
        
            @forelse (App\Models\AnoynceImage::where('announce_id',$itemannounce->id)->take(1)->get() as $imges)
          
            <a href="/showmainann/{{$itemannounce->id}}"> <img  src="{{URL::asset('/images/anouncements/'.$imges->image_name)}}"  class="d-block w-100" alt="..." height="200px"></a>
                
            @empty
            
            <a href="/showmainann/{{$itemannounce->id}}"> <img  src="{{URL::asset('/images/anouncements/123.jpg')}}" class="d-block w-100" alt="..." height="200px"></a>
                
            @endforelse


            <p >  <span style="color: black">{{substr($itemannounce["title"],0,2000)}}  ....</span>
            </p>
      
      </div>
  
   @empty

 {{-- <div style="text-align: center;margin-top:100px">
                  <h1 style="color: rgb(12, 59, 100)" > لا توجد إعلانات متاحه  </h1>
                </div> --}}


   @endforelse
  
  
   @endforelse



 
     
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>




</div>
  </div>
</div>
</div>
       <br>
       <br>
{{-- 
       @foreach (  $item)
           
       @endforeach --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script></head> 

</body>
</html>