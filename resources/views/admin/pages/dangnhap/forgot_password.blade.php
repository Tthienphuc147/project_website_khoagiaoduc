<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Trang quản trị - Khoa Giáo Dục - Mầm Non</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

     <!-- Main CSS-->
     <link href="{{ asset('/public/admin/css/theme.css') }}" rel="stylesheet" media="all">
    {{-- <link rel="shortcut icon" type="image/x-icon" href="user/assets/images/logo.png"> --}}
    <style>
     #checkbox-rmb{
			margin-left: 20px;
		}
		.error-pagewrap{
			margin-top: 100px;
		}
		.error{
			color: red;
		}
		#error_post_login{
			display: none;
		}
    </style>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-form">
                            @if ( Session::has('success') )
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <strong>{{ Session::get('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                        @endif
                        @if ( Session::has('error') )
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <strong>{{ Session::get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>
                        @endif
                            <form method="post" action="quen-mat-khau">
                                @csrf
                                <div class="login-form">
                                    <h4 class="login-title"><center>Nhập email xác thực tài khoản</center></h4>
                                    @if(Session::has('loi_email_xac_thuc'))
                                    <div class="alert alert-danger" id="error_post_singin">
                                        <center>
                                            {{Session::get('loi_email_xac_thuc')}}
                                        </center>
                                    </div>
                                    @endif
                                        <div class="form-group">
                                                <label>Nhập Email của bạn *</label>
                                                <input class="au-input au-input--full" id="mail_tai_khoan" class="mb-0" type="email" placeholder="Nhập địa chỉ Email" name="email" style="width:100%">
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="au-btn au-btn--block au-btn--green m-b-20">Nhận mã xác thực</button>
                                        </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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

    <!-- Main JS-->
    <script src="{{ asset('/public/admin/js/main.js') }}"></script>


</body>

</html>
<!-- end document-->
