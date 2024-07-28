<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- <link rel="stylesheet" href="{{URL::asset('/css/register.css')}}"> --}}
    {{-- <link rel="stylesheet" href=" {{ URL::asset('css/form.css') }} " > --}}

    <title>تسجيل دخول</title>
</head>
     
     <body style="
             background-color:gray;
            background-size:cover;
  
  background-repeat: no-repeat;
  
     background-image: url({{URL::asset('/images/ma.PNG')}});
    
     ">  
<h1 style="text-align: center;color:blue">تسجيل  جديد</h1>
    
<div   class="container">
     <div  class="row mt-4"  style="border: 1px solid rgb(209, 200, 200)">
<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
         </x-slot>

        <div id="form-main " class="container row col-12">
    
            <div id="form-div">
        {{-- <h1 style="color:green">   إنشاء حساب </h1> <br> --}}
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
<div class="row col-12">
<div class="col-6">
    <span class="h3 mb-3">الإسم بالكامل</span><br>
    <div class="input-group mb-3 mt-4">
        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
        <input type="text" name="name" :value="old('name')" required autofocus autocomplete="name" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
      </div>
</div>
<div class="col-6">
    <span class="h3 mb-3">البريد الالكترونى</span><br>
    <div class="input-group mb-3 mt-4">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="email"   name="email" class="form-control"   aria-label="Username" aria-describedby="basic-addon1" required>
      </div>
</div>
</div>
  

<div class="row col-12 mt-4">
    <div class="col-6">
        <span class="h3 mb-3">رقم الجوال  (966+)</span><br>
        <div class="input-group mb-3 mt-4">
            <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone-plus"></i></span>
            <input type="text"  name="phonenumber"     :value="old('phonenumber')"  class="form-control"  aria-label="Username" aria-describedby="basic-addon1" required>
          </div>
    </div>
    <div class="col-6">
        <span class="h3 mb-3"> كلمه المرور  </span><br>
        <div class="input-group mb-3 mt-4">
            <span class="input-group-text" id="basic-addon1"><i class="bi bi-eye-slash" id="togglePassword"></i> </span>
            <input  type="password" id="password"    name="password" class="form-control"   aria-label="Username" aria-describedby="basic-addon1" required>
          </div>
    </div>
    </div>

       



    <div class="row col-12 mt-4">
        <div class="col-6">
            <span class="h3 mb-3">  إختار صوره</span><br>
            <input type="file" name="photo" class="box mt-4" id="photo">
        </div>
        <div class="col-6">
            <span class="h3 mb-3">  أختار   </span><br>
            <select class="form-select mt-4" aria-label="Default select example" name="role">
                <option value="saller" >بائع</option>
                <option value="pucher" >مشترى</option>
                </select>
        </div>
        </div>



            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="container-login100-form-btn mt-4 " style="margin-right: -400px">
                <div class="wrap-login100-form-btn d-grid gap-4 col-1 mx-auto" >
                    <button   type="submit"  class="login100-form-btn btn-primary  me-6 col-11"  name="submit"  style="padding: 10px;margin-right:-200px" >تسجيل</button>
                </div>
             </div>
        </form>
    </div>
</div>
    </x-authentication-card>
</x-guest-layout>
</div>  
</div>
<br>
<script>
    window.addEventListener("DOMContentLoaded", function () {
  const togglePassword = document.querySelector("#togglePassword");

  togglePassword.addEventListener("click", function (e) {
    // toggle the type attribute
    const type =
      password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);
    // toggle the eye / eye slash icon
    this.classList.toggle("bi-eye");
  });
});
</script>
 </body>
</html>