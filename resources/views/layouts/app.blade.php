<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo csrf_token(); ?>">

    <title>{{@$name}} - COD Monster</title>
    <link rel="icon" type="image/x-icon" href="{{asset('storage/images/cod (2).jpg')}}"/>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <script src="https://kit.fontawesome.com/46a02c0f3f.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    @include('inc.styles')
</head>
<body>
    <!--  BEGIN MAIN CONTAINER  -->
    <div id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed {{ (@$slug != 'store') ? "aside-enabled" : "" }} aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
        <div class="d-flex flex-column flex-root">
            <div class="page d-flex flex-row flex-column-fluid">
                @if( @$slug != "store" )
                    @if(@Auth::user()->permissionID == 1)
                    @include('inc.admin_sidbar')
                    @else
                    @include('inc.sidbar')
                    @endif
                @endif
                <!--begin::Wrapper-->

                <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                    @include('inc.header')
                    <!--begin::Content-->
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        @include('inc.toolbar')
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('inc.scripts')
    @yield('scripts')
</body>
</html>
