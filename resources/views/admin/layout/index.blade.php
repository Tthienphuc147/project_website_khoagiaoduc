<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Trang quản trị - Khoa Giáo Dục - Mầm Non</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/public/admin/images/logo.png" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{ asset('') }}">
     <!-- Fontfaces CSS-->
     <link href="{{ asset('/public/admin/css/font-face.css') }}" rel="stylesheet" media="all">
     <link href="{{ asset('/public/admin/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
     <link href="{{ asset('/public/admin/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
     <link href="{{ asset('/public/admin/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

     <!-- Bootstrap CSS-->
     <link href="{{ asset('/public/admin/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

     <!-- Vendor CSS-->
     <link href="{{ asset('/public/admin/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
     <link href="{{ asset('/public/admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
     <link href="{{ asset('/public/admin/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
     <link href="{{ asset('/public/admin/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
     <link href="{{ asset('/public/admin/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
     <link href="{{ asset('/public/admin/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
     <link href="{{ asset('/public/admin/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">
     <link rel="stylesheet" href="{{ asset('/public/css/notifications/Lobibox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/css/notifications/notifications.css') }}">
    <script src="{{asset('/public/ckeditor/ckeditor.js')}}"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
     <!-- Main CSS-->
     <link href="{{ asset('/public/admin/css/theme.css') }}" rel="stylesheet" media="all">
     <link rel="stylesheet" href="/public/admin/css/data-table/bootstrap-table.css">
     <!-- modals CSS
         ============================================ -->
     <link rel="stylesheet" href="/public/admin/css/modals.css">
     <style>
         .modal-edu-general .modal-body.modal-add {
             text-align: left;
             padding: 30px 50px;
         }
     </style>
     @yield('admin_css')
</head>

<body>
    <div class="page-wrapper">
        @include('admin.layout.header-mobile')
        @include('admin.layout.leftmenu')
        <div class="page-container">
            @include('admin.layout.header')
            @yield('admin_content')
        </div>
    </div>
    <script src="{{ asset('/public/admin/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('/public/admin/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('/public/admin/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('/public/admin/vendor/slick/slick.min.js') }}">
    </script>
    <script src="{{ asset('/public/admin/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('/public/admin/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('/public/admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <script src="{{ asset('/public/admin/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('/public/admin/vendor/counter-up/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ asset('/public/admin/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('/public/admin/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('/public/admin/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('/public/admin/vendor/select2/select2.min.js') }}">
    </script>
    <script src="/public/admin/js/data-table/bootstrap-table.js"></script>
    <script src="/public/admin/js/data-table/tableExport.js"></script>
    <script src="/public/admin/js/data-table/data-table-active.js"></script>
    <script src="/public/admin/js/data-table/bootstrap-table-resizable.js"></script>
    <script src="/public/admin/js/data-table/colResizable-1.5.source.js"></script>
    <script src="/public/admin/js/data-table/bootstrap-table-export.js"></script>
    <script src="{{ asset('/public/admin/js/main.js') }}"></script>
</body>

</html>
