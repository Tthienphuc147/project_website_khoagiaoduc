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
                        <div class="login-logo">
                            <a href="#">
                                {{-- <img src="images/icon/logo.png" alt="CoolAdmin"> --}}
                            </a>
                            <h2>ĐĂNG NHẬP</h2>
                            <div class="alert alert-danger" id="error_post_login">
                                <center>
                                    <strong>Tài khoản chưa tồn tại!</strong> Vui lòng kiểm tra lại.
                                </center>
                            </div>
                        </div>
                        <div class="login-form">
                            <form method="post" id="loginForm">
                                @csrf
                                <div class="form-group">
                                    <label>Tên tài khoản</label>
                                    <input class="au-input au-input--full" id="tai_khoan" name="tai_khoan" type="text" placeholder="Nhập tên tài khoản hoặc email" title="Please enter you username" required="" value="" name="username" id="username" >
                                	<span class="help-block small error" id="error_name"></span>
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input class="au-input au-input--full"id="mat_khau" name="mat_khau" type="password" placeholder="Nhập vào mật khẩu" required="" value="" name="password" id="password">
                                    <span class="help-block small error" id="error_pass"></span>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="button" id="loginbtn">Đăng nhập</button>
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
    <script>
        function focus(){
            $('#error_name').text("");
            $('#error_pass').text("");
            $("#success_singin").css("display", "none");
        }
        $( "#tai_khoan" ).focus(function() {
            focus();
        });

        $( "#mat_khau" ).focus(function() {
            focus();
        });

        $('#loginbtn').click(function() {
            $('#error_name').text("");
            $('#error_pass').text("");
            $("#success_singin").css("display", "none");

            var check_name = /^[A-Za-z0-9@.]{6,80}$/;
            if(!$('#tai_khoan').val().match(check_name)){
                $('#error_name').text("Tên đăng nhập không hợp lệ");
                return false;
            }
            var check_pass = /^([a-zA-Z0-9@*#]{6,30})$/;
            if(!$('#mat_khau').val().match(check_pass)){
                $('#error_pass').text("Mật khẩu không hợp lệ");
                return false;
            }
            $.ajax({
                type: "POST",
                url: 'quantri/dangnhap',
                data: $('#loginForm').serialize(),
                success: function( msg ) {
                    if(msg != "false"){
                        location.href = msg;
                    }
                    else{
                        $("#error_post_login").css("display", "block");
                    }
                }
            });
            return false;
        });
    </script>

</body>

</html>
<!-- end document-->
