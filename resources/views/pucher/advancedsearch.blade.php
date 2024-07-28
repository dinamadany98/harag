<!DOCTYPE html>
<html  dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   
    <title>Document</title>
</head>
<body>
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
 <div class="container mt-4">
    <div class="row">
<div class="col-2" style="width: 300px; "  >
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
<div class="col-8">
 

{{-- {{$data}} --}}
@if (!$data->isEmpty())
<div class="row featured__filter ms-1">
@foreach ($data as $item)
<div class="card ms-1 mt-2 mb-1" style="width: 18rem;">
   
    @forelse (App\Models\AnoynceImage::where('announce_id',$item->id)->take(1)->get() as $imges)
    <img src="{{URL::asset('/images/anouncements/'.$imges->image_name)}}" class="card-img-top mt-2" alt="..." width="100px" height="200px">
        
    @empty
    <img src="{{URL::asset('/images/anouncements/123.jpg')}}" class="card-img-top mt-2" alt="..." width="100px" height="200px">
        
    @endforelse

    <div class="card-body">
      <h5 class="card-title" style="height: 150px">{{substr($item->title,0,2000)}}  ....</h5>
     
       
      <a href="/showmainann/{{$item->id}}" class="btn btn-primary mb-3" style="margin-bottom: 2px">تفاصيل</a>
    </div>
  </div>    
       
    
@endforeach
@else
<div style="text-align: center;margin-top:100px">
  <h1 style="color: rgb(12, 59, 100)" > لا توجد إعلانات متاحه  </h1>
</div>

@endif

</div>

    </div>
<br>
 </div>
</body>
</html>