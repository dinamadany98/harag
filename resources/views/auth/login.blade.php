<!DOCTYPE html>
<html  dir="rtl" style="margin-top: -5% " >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
      
    </style>
    <link rel="stylesheet" href="{{URL::asset('/css/register.css')}}">
    {{-- <link rel="stylesheet" href=" {{ URL::asset('css/form.css') }} " > --}}

    <title>  الدخول </title>
</head>
<body style="
  
   
   background-size:cover;
  
  background-repeat: no-repeat;
  
     background-image: url({{URL::asset('/images/m2.PNG')}});
     
" >

<br>
       <x-guest-layout >
        <x-authentication-card>
            {{-- <x-slot name="logo"></x-slot> --}}
            <div id="form-main " class="row col-12 "    >
 
                <div id="form-div">
            <x-validation-errors class="mb-4" />
    
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
    
            <form method="POST" action="{{ route('login') }}">
                @csrf
    
                
                <div class="wrap-input100 validate-input"  >
                    <span class="h3 mb-3">البريد الالكترونى</span>
                    <input class="input100 mt-3" type="email"   name="email" :value="old('email')" required autofocus autocomplete="username" >
                  
                    <span class="focus-input100"></span>
                   
                </div>
               
                <div class="wrap-input100 validate-input"  >
    
                    <span class="h3 mb-3">   &nbsp;كلمه المرور     <i class="bi bi-eye-slash" id="togglePassword"></i> </span>
                    <input   type="password" id="password" class="input100 mt-3"  name="password" required autocomplete="current-password" >
                
                    <span class="focus-input100"></span>
                 
                </div> 
     
                <div class="flex items-center justify-end mt-4">
                   
    
                    <x-button class="ms-4 col-10" style="background-color: rgb(80, 80, 174)">
                        دخول 
                    </x-button>
                </div>
            </form>  <br>
        <a href="/register" class="h2 mt-4" style="margin-right: 90px;margin-top: 50px"> إنشاء حساب </a>

        </div>
     </div>
        </x-authentication-card>
    </x-guest-layout>
    
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