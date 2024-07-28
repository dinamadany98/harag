@extends('saller.nav')
@section('mynav')
<html dir="rtl">
    <header>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href=" {{ URL::asset('css/form.css') }} " >
    <link rel="stylesheet" href=" {{ URL::asset('css/images.css') }} " >
    <script src="{{URL::asset('jquery-3.3.1.min.js')}}"></script> 

<style>
            h1{
                color:brown;
                margin-left: 200px;
                font-family:lucida calligraphy
            }
        </style>
        <title>تعديل إعلان</title>
    </header>
    <body  >
        @if(Session::has('success'))
<div class="alert alert-primary" role="alert" style=" margin-right:200px; width:56%; margin-top:50px;" >
  {{Session::get('success')}}
</div>
@endif 
      <br>
 <div id="form-main">
    
    <div id="form-div">
        
<form action="/announcement/{{$data->id}}" method="POST" enctype="multipart/form-data">
    @method("PUT") 
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">عنوان الاعلان</label>
      <input type="text" class="form-control" id="title"  name="title"  value="{{old('title',$data["title"])}}" required > 
     
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">وصف الاعلان</label>
      {{-- <input  type="text" class="form-control" id="description"  name="description"   > --}}
      
      <div class="form-floating">
        <textarea class="form-control"  id="floatingTextarea2" style="height: 100px" name="description" required >{{$data['description']}}</textarea>
       </div>
    </div>
    <input type="hidden" value="{{$data['id']}}" id="announce_id">


    <div  class="mb-3">
      <label for="floatingSelect" class="form-label">إدخال القسم </label>

        <div class="form-floating">
            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="department"  >
              
               
              <option value="{{$data['department']}}" selected>{{$data['department']}}</option>
              <option value="نجار">نجار</option>
              <option value="حداد">حداد</option>
              <option value="كهربائى">كهربائى</option>
              <option value="سباك">سباك</option>
              <option value="فاتح اقفال">فاتح اقفال</option>
              <option value="مبرمج">مبرمج</option>
              <option value="تقنى">تقنى</option>
              <option value="مصمم">مصمم</option>
              
            </select>
           
          </div>
    </div>
    <br>
    <div class="mb-3">
        <label for="photo" class="form-label">إضافه صوره</label><br>
        <input type="file" name="photo[]" class="box" id="photo"  multiple> 
    
     
      </div>
          
      <br>
    <button type="submit" class="btn btn-primary col-12">تعديل إعلان</button>
  </form>


  <div class="mt-4">
    <label   class="form-label">صوره الاعلان</label><br>
        
      @foreach ($images as $image)
      <div class="col-lg-3 featured__item  data-user-id-{{$image->id}}"    style="display: inline-block;" >
        <div class="featured__item__pic"  >
          <img src="{{URL::asset('/images/anouncements/'.$image->image_name)}}" alt=""  width="100px" height="100px" name=""/>
            <ul class="featured__item__pic__hover">
                <li><button class="deleteimage" id={{$image->id}}><i class="bi bi-trash3"></i></button></li>
                    
                
            </ul>
        </div>
      </div>
      @endforeach
    
  
    </div>
</div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     
    <script>
      $(document).ready(function() {   
      $(".deleteimage").on("click", function(){
              var id = $(this).attr("id");
              var announce_id= $('#announce_id').attr("value");

              $.ajax({

                  url: '/deletephoto/'+id,
                  type: 'GET',
                  dataType: 'json',
                  data:{'announce_id': announce_id}, 
                  success: function(response) {
                      
                      console.log(response);
                     
                      $(".data-user-id-"+id).remove();
                     
 
                  },
                  error: function(xhr, status, error) {
                      console.error(error);
                  }
              });
          });
      });
</script>


</body>
</html>
 




@endsection