<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Trang quản trị - Khoa Giáo Dục - Mầm Non</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="admin/images/logo.png" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{ asset('') }}">
     <!-- Fontfaces CSS-->
     <link href="{{ asset('admin/css/font-face.css') }}" rel="stylesheet" media="all">
     <link href="{{ asset('admin/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
     <link href="{{ asset('admin/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
     <link href="{{ asset('admin/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

     <!-- Bootstrap CSS-->
     <link href="{{ asset('admin/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

     <!-- Vendor CSS-->
     <link href="{{ asset('admin/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
     <link href="{{ asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
     <link href="{{ asset('admin/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
     <link href="{{ asset('admin/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
     <link href="{{ asset('admin/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
     <link href="{{ asset('admin/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
     <link href="{{ asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">
     <link rel="stylesheet" href="{{ asset('css/notifications/Lobibox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/notifications/notifications.css') }}">
    <script src="{{asset('../ckeditor/ckeditor.js')}}"></script>

     <!-- Main CSS-->
     <link href="{{ asset('admin/css/theme.css') }}" rel="stylesheet" media="all">
     @yield('admin_css')
    {{-- <link rel="shortcut icon" type="image/x-icon" href="user/assets/images/logo.png"> --}}
</head>

<body class="animsition">
    <div class="page-wrapper">
        @include('admin.layout.header-mobile')
        @include('admin.layout.leftmenu')
        <div class="page-container">
            @include('admin.layout.header')
            @yield('admin_content')
        </div>
    </div>
    <script src="{{ asset('admin/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('admin/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('admin/vendor/slick/slick.min.js') }}">
    </script>
    <script src="{{ asset('admin/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <script src="{{ asset('admin/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/counter-up/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ asset('admin/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/select2/select2.min.js') }}">
    </script>

    <!-- Main JS-->
    <script src="{{ asset('admin/js/main.js') }}"></script>
    <script src="{{ asset('js/notifications/Lobibox.js') }}"></script>
    @yield('admin_script')
</body>

</html>
