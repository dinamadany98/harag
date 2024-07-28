<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   
    
    <link rel="stylesheet" href="{{URL::asset('/css/maintwo.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/css/main.css')}}">
    
   
</head>
<body>
    <div class="container" >
        <div class="menu">
        <table class="menu-container" border="0">
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <td width="30%" style="padding-right:20px" >
                                    
                                    <img src="{{URL::asset('/images/'.auth()->user()->photo)}}" alt="" width="100%" style="border-radius:50%">
                                </td>
                                <td style="padding:0px;margin-right: 0%; ">
                                    <p class="profile-title" > {{substr(auth()->user()->name,0,20)}} </p>
                                    <p class="profile-subtitle">{{substr(auth()->user()->email,0,20)}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"class="mb-2">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();"><button type="button" class=" btn-outline-primary btn-primary-soft btn-lg col-11" id="openModal2" ><i class="bi bi-box-arrow-right"></i> تسجيل&nbsp; خروج</button>

                                        </a>
                                    </form> 
                                </td>
                                
                            </tr>
                    </table>
                    </td>
                </tr>
                <tr class="menu-row mt-6">
                    <td class="menu-btn menu-icon-appoinment   {{ (request()->is('/')) ? 'menu-active menu-icon-appoinment-active' : '' }}">
                        <a href="/" class="non-style-link-menu {{ (request()->is('/')) ? 'non-style-link-menu-active' : '' }}"><div><p class="menu-text"><i class="bi bi-house h2"></i>  الرئيسيه </p></a></div>
                    </td>
                </tr>
                <tr class="menu-row " >
                    <td class="menu-btn menu-icon-dashbord  {{ (request()->is('dashboard')) ? 'menu-active menu-icon-appoinment-active' : '' }}" >
                        <a href="/dashboard" class="non-style-link-menu {{ (request()->is('dashboard')) ? 'non-style-link-menu-active' : '' }} "><div><p class="menu-text">  <i class="bi bi-speedometer2 h2"></i> لوحه قياده </p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-appoinment   {{ (request()->is('announcement/create')) ? 'menu-active menu-icon-appoinment-active' : '' }}">
                        <a href="/announcement/create" class="non-style-link-menu {{ (request()->is('announcement/create')) ? 'non-style-link-menu-active' : '' }}"><div><p class="menu-text"><i class="bi bi-file-earmark-plus h2"></i> إضافة إعلان  </p></a></div>
                    </td>
                </tr>
                
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-session {{ (request()->is('sallerannounce')) ? 'menu-active menu-icon-appoinment-active' : '' }}">
                        <a href="/sallerannounce" class="non-style-link-menu {{ (request()->is('sallerannounce')) ? 'non-style-link-menu-active' : '' }}"><div><p class="menu-text"><i class="bi bi-bookmark h2"></i> إعلاناتى </p></div></a>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-patient {{ (request()->is('showsallerchat')) ? 'menu-active menu-icon-appoinment-active' : '' }}">
                        <a href="/showsallerchat" class="non-style-link-menu {{ (request()->is('showsallerchat')) ? 'non-style-link-menu-active' : '' }}"><div><p class="menu-text"><i class="bi bi-chat-left-dots h2"></i>  الرسائل </p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-patient {{ (request()->is('mynotification')) ? 'menu-active menu-icon-appoinment-active' : '' }}">
                        <a href="/mynotification" class="non-style-link-menu {{ (request()->is('mynotification')) ? 'non-style-link-menu-active' : '' }}"><div><p class="menu-text"><i class="bi bi-bell h2"></i>  الإشعارات </p></a></div>
                    </td>
                </tr>
                {{-- <tr class="menu-row" >
                    <td class="menu-btn menu-icon-settings">
                        <a href="settings.php" class="non-style-link-menu"><div><p class="menu-text">Settings</p></a></div>
                    </td>
                </tr> --}}
                 
            </table>
        </div>
        <div class="dash-body">
            
            @yield('mynav')


        </div>
</body>
</html>