
{{-- select AVG(rate) FROM rate WHERE language_partners_email='{$row['email']}' GROUP BY language_partners_email"; --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">











<html lang="en-US"  >
<head> 
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  
<style>
    
 
</style>

</head>
<body>
    
    <div class="row ">
        <div class="col-5">

            <img src="{{URL::asset('/image/a.png')}}" >
    
        </div>
        <div class="col-6" style="padding-top: 100px">

            <h1 style="font-family:lucida calligraphy,cursive;color:brown">About Us</h1>
            <h5>
                Paragraph. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur id suscipit 
                ex. Suspendisse rhoncus laoreet purus quis elementum. Phasellus sed efficitur dolor, 
                et ultricies sapien. Quisque fringilla sit amet dolor commodo efficitur.
                 Aliquam et sem odio. In ullamcorper nisi nunc, et molestie ipsum iaculis sit amet.
            </h5>
    
        </div>
    </div>

</body></html>







@forelse (App\Models\Rate::get()->groupBy('announcement_id')  as $item)
{{$item}}: {{$item->AVG('rate')}} <br>
 @php
 $duplicates[] = $item->AVG('rate');
@endphp


@empty

@endforelse
@php
$collection = collect($duplicates);
$sorted = $collection->sortDesc()->toArray();
// $sorted->values()->toArray();

//  $asd=$duplicates->all()->sortByDesc();
    
@endphp
<hr>


<div class="row col-6">


<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src={{URL::asset('/images/anouncements/IMG-20240429-WA0091.jpg')}} class="d-block w-100" alt="" height="100px">
    </div>
  
    @foreach (App\Models\Rate::get()->groupBy('announcement_id')  as $itemss)
 
    @if (in_array($itemss->AVG('rate'), array_slice( $sorted, 0, 5)))
    @foreach ($itemss as $item)
    @if ($loop->first)
 {{-- {{$item}}<br> --}}
    @foreach(App\Models\Announcement::where('id',$item->announcement_id)->get() as $itemannounce) 
    {{-- {{$itemannounce["title"]}} --}}
 <div class="carousel-item ">
    
  <h5> <span style="color: black">{{$itemannounce["title"]}}</span></h5>

  <img  src="{{URL::asset('/images/anouncements/LZ40lNkY2FhvO4ogNE400v5JnQvVU9XdJkNO8BuO.jpg')}}"  class="d-block w-100" alt="..." height="100px">
  {{-- <div class="carousel-caption d-none d-md-block">
    <h5> <span style="color: black">{{$itemannounce["title"]}}</span></h5>
    <p>Some representative placeholder content for the second slide.</p>
  </div> --}}

</div>
 @endforeach
 
    @endif
       
    @endforeach
    
    @endif
 @endforeach


     
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





<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    {{-- <div class="carousel-item active">
      <img  src="{{URL::asset('/images/anouncements/123.jpg')}}"  class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div> --}}
    

 
    @foreach (App\Models\Rate::get()->groupBy('announcement_id')  as $itemss)
 
    @if (in_array($itemss->AVG('rate'), array_slice( $sorted, 0, 5)))
    @foreach ($itemss as $item)
    @if ($loop->first)
 {{-- {{$item}}<br> --}}
    @foreach(App\Models\Announcement::where('id',$item->announcement_id)->get() as $itemannounce) 
    {{-- {{$itemannounce["title"]}} --}}
 <div class="carousel-item">
    {{$itemannounce["title"]}}

  <img  src="{{URL::asset('/images/anouncements/123.jpg')}}"  class="d-block w-100" alt="..." height="100px">
  <div class="carousel-caption d-none d-md-block">
    <h5>{{$itemannounce["title"]}} </h5>
    <p>Some representative placeholder content for the second slide.</p>
  </div>
</div>
 @endforeach
 
    @endif
       
    @endforeach
    
    @endif
 @endforeach


     
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>










<hr>


 
@foreach (App\Models\Rate::get()->groupBy('announcement_id')  as $itemss)
 
   @if (in_array($itemss->AVG('rate'), array_slice( $sorted, 0, 5)))
   @foreach ($itemss as $item)
   @if ($loop->first)
{{-- {{$item}}<br> --}}
   @foreach(App\Models\Announcement::where('id',$item->announcement_id)->get() as $itemannounce) 
{{$itemannounce["title"]}}<br>
@endforeach

   @endif
      
   @endforeach
   
   @endif
@endforeach

{{-- 
@forelse (App\Models\Announcement::get() as $item)
<div class="card ms-1 mt-3" style="width: 18rem;">
  
  @forelse (App\Models\AnoynceImage::where('announce_id',$item->id)->take(1)->get() as $imges)
  <img src="{{URL::asset('/images/anouncements/'.$imges->image_name)}}" class="card-img-top mt-2" alt="..." height="200px" width="100px" height="200px">
      
  @empty
  <img src="{{URL::asset('/images/anouncements/123.jpg')}}" class="card-img-top mt-2" alt="..." height="200px" width="100px" height="200px">
      
  @endforelse

  <div class="card-body">
    <h5 class="card-title" style="height: 150px">{{substr($item->title,0,2000)}}  ....</h5>
  
    
    <a href="#" class="btn btn-primary mb-3" style="margin-bottom: 2px">تفاصيل</a>
  </div>
</div>   
@empty
<div style="text-align: center;margin-top:100px">
  <h1 style="color: rgb(12, 59, 100)" > لا توجد إعلانات متاحه  </h1>
</div>
            </div>
@endforelse

 --}}
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script></head> 
