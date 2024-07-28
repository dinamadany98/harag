@extends('saller.nav')
@section('mynav')
<html dir="rtl">
    <header>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href=" {{ URL::asset('css/form.css') }} " >

<style>
            h1{
                color:brown;
                margin-left: 200px;
                font-family:lucida calligraphy
            }
        </style>
        <title>إضافه إعلان</title>
    </header>
    <body  >
        @if(Session::has('success'))
<div class="alert alert-success" role="alert" style="background-color: #1b2a47;color:azure;margin-bottom: -20px;margin-right:200px; width:56%; margin-top:50px;font-weight:bolder;text-align:center;" >
  {{Session::get('success')}}
</div>
@endif 
      <br> 
 <div id="form-main">
    
    <div id="form-div">
        
<form action="/announcement" method="POST" enctype="multipart/form-data">
  @csrf
    <div class="mb-3">
      <label for="title" class="form-label">عنوان الاعلان</label>
      <input type="text" class="form-control" id="title"  name="title"  required > 
     
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">وصف الاعلان</label>
      {{-- <input  type="text" class="form-control" id="description"  name="description"   > --}}
      
      <div class="form-floating">
        <textarea class="form-control"  id="floatingTextarea2" style="height: 100px" name="description" required></textarea>
       </div>
    </div>

    <div  class="mb-3">
      <label for="floatingSelect" class="form-label">إدخال القسم </label>
 
        <div class="form-floating">
            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="department">
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
    <div  class="mb-3">
      <label for="floatingSelect" class="form-label">إدخال المدينه </label>
 
    <div class="form-floating">
      <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="country">
        <option >الرياض</option>
        <option  >جدة</option>
        <option  >مكة</option>
        <option  >المدينة المنوره</option>
        <option  >الدمام</option>
        <option >تبوك</option>
        <option  >بريدة</option>
        <option > الطائف</option>
        
      </select>
     
    </div>
</div>
<br>
    <div class="mb-3">
        {{-- <label for="photo" class="form-label">صوره الاعلان</label>
        <input type="file" name="photo[]" class="box" id="" required multiple> 
          --}}
          <label for="" class="form-label"> صوره الاعلان </label>
          <input type="file"   name="photo[]" id="" placeholder="chose photo" aria-describedby="fileHelpId" multiple>
        
      </div>
      <br>
    <button type="submit" class="btn btn-primary col-12">أضافة إعلان</button>
  </form>
</div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     

</body>
</html>
 




@endsection