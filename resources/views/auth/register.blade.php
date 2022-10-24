<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CodMonster - Sign Up</title>
    <link rel="icon" type="image/x-icon" href="{{asset('storage/images/cod (2).jpg')}}"/>
    @include('inc.styles')
</head>
<body style="background-image: url('https://img.freepik.com/free-vector/ecommerce-internet-shopping-promotion-campaign_335657-2977.jpg?w=2000');background-repeat: no-repeat;background-size: 50% 100%;background-color: white;">
    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20" style="margin-left: 700px">
        {{--  <img alt="Logo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzYy107GwgFVxQcMdBFpHm100dwp3capUnvw&usqp=CAU" class="h-60px">  --}}

    <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto" style="margin-top: 4%">
        <!--begin::Form-->
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!--begin::Heading-->
            <div class="text-center mb-10">
                <!--begin::Title-->
                <h1 style="font-size: 30px" class="text-dark mb-3">Sign Up </h1>
                <!--end::Title-->
                <!--begin::Link-->
                <div class="text-gray-400 fw-bold fs-4">Already have an account?
                <a href="{{ route('login') }}" class="link-primary fw-bolder">Sign In </a></div>
                <!--end::Link-->
            </div>
            <!--begin::Heading-->

            <div class="fv-row mb-10 fv-plugins-icon-container">
                    <label class="form-label fs-6 fw-bolder text-dark">Full Name</label>
                    <input id="name" type="text" placeholder="Full NAme" class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

            </div>

            <div class="fv-row mb-10 fv-plugins-icon-container">
                    <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                    <input id="email" type="email" placeholder="Email" class="form-control orm-control-lg form-control-solid @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="fv-row mb-10 fv-plugins-icon-container">
                    <label class="form-label fs-6 fw-bolder text-dark">Phone Number</label>
                    <input id="phone" type="text" placeholder="Phone Number" class="form-control form-control-lg form-control-solid @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="fv-row mb-10 fv-plugins-icon-container">
                <div class="d-flex flex-stack mb-2">
                    <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                </div>
                    <input  id="password" type="password" placeholder="Password" class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="fv-row mb-10 fv-plugins-icon-container">
                <div class="d-flex flex-stack mb-2">
                    <label class="form-label fs-6 fw-bolder text-dark">Confirm Password</label>
                </div>
                    <input id="password-confirm" type="password" placeholder="Confirm your password" class="form-control form-control-lg form-control-solid" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="form-group d-flex flex-wrap flex-center">
                <button type="submit" id="kt_login_signup_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Submit</button>
                <a href="{{ route('login') }}">
                <button type="button" id="kt_login_signup_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-4">Cancel</button>
                </a>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!--end::Actions-->
        <div></div></form>
        <!--end::Form-->
    </div>
</body>
</html>

