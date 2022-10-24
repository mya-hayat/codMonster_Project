<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CodMonster - Login</title>
    <link rel="icon" type="image/x-icon" href="{{asset('storage/images/cod (2).jpg')}}"/>
    @include('inc.styles')
</head>
<body style="background-image: url('https://img.freepik.com/free-vector/ecommerce-internet-shopping-promotion-campaign_335657-2977.jpg?w=2000');background-repeat: no-repeat;background-size: 50% 100%;background-color: white">
    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20" style="margin-left: 700px">
    <img alt="Logo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzYy107GwgFVxQcMdBFpHm100dwp3capUnvw&usqp=CAU" class="h-60px">
    <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto" style="margin-top: 4%;">

        @if (\Session::has('message'))
        <div id="alert" class="alert alert-warning text-center">
            <span style="display: flex;float: right" onclick="close_alerte()" id="close" class="svg-icon svg-icon-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="rgb(255, 191, 0)"></rect>
                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="rgb(255, 191, 0)"></rect>
                </svg>
            </span>
           <b style="color: rgb(255, 191, 0)">{!! \Session::get('message') !!}<a href="https://www.codmonster.com/" class="link-primary fw-bolder"> <u>Contact Us</u> </a></b>
        </div>
        @endif

        <!--begin::Form-->
        <form method="POST" action="{{ route('login') }}" class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="/metronic8/demo1/../demo1/index.html">
            @csrf
            <!--begin::Heading-->
            <div class="text-center mb-10">
                <!--begin::Title-->
                <h1 class="text-dark mb-3">Sign In </h1>
                <!--end::Title-->
                <!--begin::Link-->
                <div class="text-gray-400 fw-bold fs-4">New Here?
                <a href="{{ route('auth.register') }}" class="link-primary fw-bolder">Create an Account</a></div>
                <!--end::Link-->
            </div>
            <!--begin::Heading-->
            <!--begin::Input group-->
            <div class="fv-row mb-10 fv-plugins-icon-container">
                <!--begin::Label-->
                <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input class="form-control form-control-lg form-control-solid" type="text" name="email" autocomplete="off" required>
                @if($errors->has('email'))
                    <div id="alerteEmail" class="alert alert-danger ">
                        <span onclick="close_alerte_email()" id="close" class="svg-icon svg-icon-1" style="float: right;display:flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="red"></rect>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="red"></rect>
                            </svg>
                        </span>
                        <span>{{ $errors->first('email') }}</span>
                    </div>
                @endif
                <!--end::Input-->
            <div style="color: " class="fv-plugins-message-container invalid-feedback"></div></div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-10 fv-plugins-icon-container">
                <!--begin::Wrapper-->
                <div class="d-flex flex-stack mb-2">
                    <!--begin::Label-->
                    <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                    <!--end::Label-->
                    <!--begin::Link-->
                    <!--end::Link-->
                </div>
                <!--end::Wrapper-->
                <!--begin::Input-->
                <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" required>
                <!--end::Input-->
                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                @if($errors->has('password'))
                        <div id="alert_password" class="alert alert-danger ">
                            <span onclick="close_alerte_password()" id="close" class="svg-icon svg-icon-1" style="display: flex; float:right">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="red"></rect>
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="red"></rect>
                                </svg>
                            </span>
                            <span>{{ $errors->first('password') }}</span>
                        </div>
                @endif
            <!--end::Input group-->
            <!--begin::Actions-->
            <div class="text-center">
                <!--begin::Submit button-->
                <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                    <span class="indicator-label">Sign in</span>
                    <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
                <!--end::Submit button-->
            </div>
            <!--end::Actions-->
        <div></div></form>
        <!--end::Form-->
        <div style="text-align: center;margin-top: 4%;" class="text-gray-400 fw-bold fs-4">
            <a href="https://www.codmonster.com/" class="link-primary fw-bolder"> <u>Contact Us</u> </a>
        </div>
    </div>

    <script>
        function close_alerte_password(){
             document.getElementById('alert_password').style.display = 'none';
        }

        function close_alerte_email(){
            document.getElementById('alerteEmail').style.display = 'none';
       }

       function close_alerte(){
        document.getElementById('alert').style.display = 'none';
   }
    </script>

</body>
</html>
