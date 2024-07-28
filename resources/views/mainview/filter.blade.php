

{{-- {{$data}} --}}
@if (!$data->isEmpty())
<div class="row featured__filter ms-1">
@foreach ($data as $item)
<div class="card ms-1 mt-3" style="width: 18rem;">
   
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
