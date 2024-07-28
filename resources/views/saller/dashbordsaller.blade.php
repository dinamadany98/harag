@extends('saller.nav')
@section('mynav')
<html dir="rtl">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="{{URL::asset('/css/saller.css')}}">
<style>
 
    .asd{
        color:aliceblue;
        background-size:contain;
  /* background-position: center center; */
  background-repeat: no-repeat;
     background-image: url({{URL::asset('/images/IMG-20240429-WA0091.jpg')}});
    
 
    }
</style>
    <title>الرئيسيه</title>
</head>
<body>
    
    <div class="dash-body" style="margin-top: 15px" >
        <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;" >
                    
                  
            <tr>
               
                    
                 
                <table class="filter-container  " style="border: none;" border="0" >
                <tr  class="col-12"  style="background-color: rgba(0, 0, 0, 0.891)" >
                    <td  class="pe-8 asd col-12" style="padding-right: 15px ;padding-top: 15px" >
                        <h3 class="mt-8"> مرحبا !</h3>
                        <h1>{{auth()->user()->name}}</h1>
                        <p style="font-weight: bolder" class="h4 pt-4">شكرا لانضمامك معنا  .<br><br> نحن نحاول دائمًا أن نقدم لك خدمات متكاملة<br><br> يمكنك نشر إعلانات  لسهوله التواصل مع خدماتك<br>
                        </p>
                         <br>
                        <br>
                    </td>
                </tr>
                </table>
                 
            </td>
            </tr>
            <tr>
                <td colspan="4">
                    <table border="0" width="100%"">
                        <tr>
                            <td width="50%">

                                




                                
                                    <table class="filter-container" style="border: none;" border="0">
                                     
                                        <tr>
                                            <td style="width: 25%;">
                                                <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex">
                                                    <div>
                                                            <div class="h1-dashboard">
                                                                التقييم
                                                            </div><br>
                                                            <div class="h3-dashboard">
                                                                {{-- @if(App\Models\Rate::avg('rate')->where('saller_id',auth()->user()->id)->get()->groupBy('saller_id') !=null) --}}
                                                                @if(App\Models\Rate::where('saller_id',auth()->user()->id)->pluck('rate')->avg() !=null)
                                                                {{-- Where('column', $case)->pluck('column')->avg( --}}
                                                                 {{ROUND(App\Models\Rate::where('saller_id',auth()->user()->id)->pluck('rate')->avg(),2)}}

                                                                 
                                                                @else
                                                                    ليس لديك تقييم
                                                                
                                                                @endif
                                                                 {{-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}
                                                            </div>
                                                    </div>
                                                            <div    ><i class="bi bi-star h2"></i></div>
                                                </div>
                                            </td>
                                            <td style="width: 25%;">
                                                <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex;">
                                                    <div>
                                                            <div class="h1-dashboard">
                                                         الإبلاغ
                                                            </div><br>
                                                            <div class="h3-dashboard">
                                                                @if(!(App\Models\Report::where('saller_id',auth()->user()->id)->get())->isEmpty())
                                                                   <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                                   {{App\Models\Report::where('saller_id',auth()->user()->id)->count()}}
                                                                     
                                                                  </button>
                                                                  @else
                                                            ليس لديك إبلاغات
                                                                
                                                                @endif
                                                                
                                                                
                                                               {{-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}
                                                            </div>
                                                    </div>
                                                            <div > <i class="bi bi-flag h2 ms-2"></i></div>
                                                </div>
                                            </td>
                                            </tr>
                                            <tr>
                                            <td style="width: 25%;">
                                                <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex; ">
                                                    <div>
                                                            <div class="h1-dashboard" >
                                                                إعلاناتى
                                                            </div><br>
                                                            <div class="h3-dashboard" >
                                                                @if(!(App\Models\Announcement::where('user_id',auth()->user()->id)->get())->isEmpty())
                                                                {{App\Models\Announcement::where('user_id',auth()->user()->id)->count()}}
                                                              
                                                               @else
                                                        ليس لديك إعلانات
                                                             
                                                             @endif
                                                             
                                                              
                                                             </div>
                                                    </div>
                                                            <div ><i class="bi bi-bookmark-check h2 ms-2"></i></div>
                                                </div>
                                             </td>

                                            <td style="width: 25%;">
                                                <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex;padding-top:21px;padding-bottom:21px;">
                                                    <div>
                                                            <div class="h1-dashboard">
                                                                التعليقات
                                                            </div><br>
                                                            <div class="h3-dashboard"  >
                                                                @if(!(App\Models\Comment::where('saller_id',auth()->user()->id)->get())->isEmpty())
                                                                {{App\Models\Comment::where('saller_id',auth()->user()->id)->count()}}
                                                              
                                                               @else
                                                        ليس لديك تعليقات
                                                             
                                                             @endif                                                            </div>
                                                    </div>
                                                            <div ><i class="bi bi-chat-square-text h2 ms-2"></i></div>
                                                </div>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td style="width: 25%;">
                                                <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex; ">
                                                    <div>
                                                            <div class="h1-dashboard" >
                                                              إشعارات
                                                            </div><br>
                                                            <div class="h3-dashboard" >
                                                              
                                                               @if(auth()->user()->unreadNotifications->count() > 0)
                                                                
                                                               {{ auth()->user()->unreadNotifications->count() }}
                                                               
                                                               @else
                                                        ليس لديك إشعارات
                                                             
                                                             @endif
                                                             
                                                              
                                                             </div>
                                                    </div>
                                                            <div ><i class="bi bi-bell-slash h2 ms-2"></i></div>
                                                </div>
                                             </td>

                                            
                                            
                                        </tr>

                                    </table>
 







                            </td>
                            




                            </td>
                        </tr>
                    </table>
                </td>
            <tr>
        </table>
    </div>




        <!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">قائمه الابلاغات</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          

@forelse (App\Models\Report::where('saller_id',auth()->user()->id)->get()  as $item)

   <div class="col-12">
    @foreach(App\Models\User::where('id',$item->pucher_id)->get() as $data)
   
     قام {{$data->name}} بالابلاغ  عنك
        
    @endforeach
    بسبب  {{$item->reson}}
    

    </div><br>
@empty
    <h1> ليس لديك ابلاغات</h1>
@endforelse


        </div>
       
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script></head> 

</body>
</html>
@endsection
