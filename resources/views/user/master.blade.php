<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Khoa Giáo Dục - Mầm Non</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="/user/img/logo/logo.png">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <base href="{{asset('')}}">
        @include('user.layout.css')
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
