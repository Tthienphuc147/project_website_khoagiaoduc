<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Khoa Giáo Dục - Mầm Non</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ asset('/public/favicon.ico')}}" type="image/x-icon" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('user.layout.css')
        <script src="{{ asset('/public/user/js/vendor/jquery-1.12.4.min.js') }}"></script>

   </head>

   <body>
    @include('user.layout.header')
    <main>
        @yield('content')
    </main>
    @include('user.layout.footer')
    </body>
    @include('user.layout.script')
</html>
