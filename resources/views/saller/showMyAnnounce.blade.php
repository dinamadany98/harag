@extends('saller.nav')
@section('mynav')
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{URL::asset('/css/announce.css')}}">

    <title>إعلاناتى</title>
</head>
<body>
    <div class="product-status mg-b-30 mt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="product-status-wrap">
                        
                        <table dir="rtl">
                                
                            
                            @if (!$data->isEmpty())

                            <tr>
                                <th>الصوره</th>
                                <th class="col-2">عنوان الاعلان</th>
                                <th class="col-4">وصف الاعلان</th>
                                <th>القسم</th>
                                <th class="col-3">   حذف  /  تعديل  / مشاهده</th>

                            </tr>
                            @endif

                            @forelse($data as $item)
                            <tr>
                                @forelse (App\Models\AnoynceImage::where('announce_id',$item->id)->take(1)->get() as $imges)
                                <td><img src="{{URL::asset('/images/anouncements/'.$imges->image_name)}}" alt=""  width="50px" height="50px"/></td>
                                    
                                @empty
                                <td><img src="{{URL::asset('/images/anouncements/123.jpg')}}" alt=""  width="50px" height="50px"/></td>
                                    
                                @endforelse
                               
                             
                                <td>{{$item->title}}</td>

                                <td >{{$item->description}}</td>
                                <td>{{$item->department}}</td>
                                
                                 <td>
                                     <form method="POST" action="/announcement/{{$item->id}}">
                                        @method("DELETE")
                                        @csrf
                                        <a href="/announcement/{{$item->id}}" title="حذف الاعلان"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();"><i class="bi bi-trash3 h4 text-danger"></i></a>&nbsp;
                                        <a href="{{route("announcement.edit",$item->id)}}" title="تعديل الاعلان"><i class="bi bi-pencil-square h4 text-success"></i></a>
                                       &nbsp; <a href="{{route("announcement.show",$item->id)}}" title="مشاهده الاعلان"><i class="bi bi-eye h4 text-light"></i></a>
                                    
                                    </td>
                                </form> 
                                     
                                   
                            </tr>
                        
                                
                            @empty
                                <h1 style="color: aliceblue"> ليس لديك اعلانات  لاضافه اعلان اذهب  الى اضافه اعلان</h1>
                            @endforelse
                        </table>
                    </div>    
                        {{-- @else
                        <h1 style="color: aliceblue"> ليس لديك اعلانات  لاضافه اعلان اذهب  الى اضافه اعلان</h1> --}}

                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
