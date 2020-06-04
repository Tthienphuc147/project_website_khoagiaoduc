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
                            <form method="post" id="form_doi_pass">
                                @csrf
                                <div class="login-form">
                                    <h4 class="login-title"><center>Thay đổi mật khẩu</center></h4>
                                    <div class="alert alert-danger" id="error_post_login">
                                        <center>
                                            <strong>Thay đổi mật khẩu thất bại!</strong> Vui lòng kiểm tra lại.
                                        </center>
                                    </div>
                                    <div class="alert alert-success" id="success_setpass" style="display: none;">
                                        <center>
                                            Đăng ký thành công! Vui lòng <strong><a style="color: #155724" href="quantri/dangnhap">đăng nhập </a></strong>để sử dụng.
                                        </center>
                                    </div>
                                    <div class="form-group">
                                            <label id="loi_mat_khau" class="error"></label>
                                        </div>
                                        <div class="form-group">
                                            <label>Nhập mật khẩu mới *</label>
                                            <input  class="au-input au-input--full" onfocus="onFocusPass()" class="mb-0" type="password" placeholder="Nhập mật khẩu mới" name="mat_khau_moi" id="new_password">
                                        </div>
                                        <div class="form-group">
                                            <label>Nhập lại mật khẩu mới *</label>
                                            <input class="au-input au-input--full"  onfocus="onFocusPass()" class="mb-0" type="password" placeholder="Xác nhận mật khẩu mới" id="set_new_password">
                                        </div>
                                        <input class="au-input au-input--full"  name="email" value="{{Session::get('email_doi_pass')}}" hidden>
                                        <div class="form-group">
                                            <button type="button" id="sub_form_doi_pass" class="au-btn au-btn--block au-btn--green m-b-20">Xác nhận</button>
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
    <script>
        $('#sub_form_doi_pass').click(function(){
            $('#loi_mat_khau').text("");
            var check_pass = /^([a-zA-Z0-9@*#]{6,30})$/;
            if(!$('#new_password').val().match(check_pass)){
                $('#loi_mat_khau').text("Mật khẩu không hợp lệ");
                return false;
            }
            if($('#new_password').val() != $('#set_new_password').val()){
                $('#loi_mat_khau').text("Không khớp mật khẩu");
                return false;
            }
            $.ajax({
                type: "POST",
                url: 'quen-mat-khau/thay-doi-mat-khau.html',
                data: $('#form_doi_pass').serialize(),
                success: function( msg ) {
                    if(msg == "true"){
                        $("#success_setpass").css("display", "block");
                        $('#form_doi_pass').trigger("reset");
                    }
                    else{
                        $("#error_post_login").css("display", "block");
                    }
                }
            });
            return false;
        });
        function onFocusPass(){
            $('#loi_mat_khau').text("");
        }
    </script>

</body>

</html>
<!-- end document-->
