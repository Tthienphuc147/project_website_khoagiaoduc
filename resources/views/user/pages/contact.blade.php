@extends('user.master')
@section('content')
<div class="about-area">
    <div class="container">
            <!-- Hot Aimated News Tittle-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending-tittle">
                        <strong>Thông báo mới</strong>
                        <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                        <div class="trending-animated">
                            <ul id="js-news" class="js-hidden">
                                @foreach ($thong_bao_noi_bat as $item)
                                <li class="news-item"><a href="/bai-viet/a{{$item->id}}">{{$item->tieu_de}}</a></li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item active">Liên hệ</li>
              </ol>

              <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Góc hỏi đáp</h2>
                </div>
                <div class="container mb-60">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d245368.26105001228!2d107.93803908361146!3d16.07176349225733!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219c792252a13%3A0x1df0cb4b86727e06!2zxJDDoCBO4bq1bmcsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1587573479975!5m2!1svi!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="col-lg-8">
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
                    <form class="form-contact contact_form" method="post" action="lien-he" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="noi_dung_lien_he"  cols="30" rows="9"  placeholder="Nội dung liên hệ" required></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="ten" type="text"  placeholder="Họ và tên" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="email"  type="email"  placeholder="Email" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="lop_lien_he" type="text"  placeholder="Lớp" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="so_dien_thoai"  type="text"  placeholder="Số điện thoại" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="tieu_de_lien_he"  type="text"  placeholder="Tiêu đề liên hệ" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm boxed-btn">Gửi liên hệ</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Khoa Giáo dục Mầm non</h3>
                            <p class="mb-0">P.302 - Nhà B1</p>
                            <p class="mb-0">Trường Đại học Sư phạm</p>
                            <p>Đại học Đà Nẵng</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3>0898.204 204 (#112) </h3>
                            <p>Hotline tuyển sinh</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3>Email liên hệ</h3>
                            <p>khoamamnon@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
    </div>

</div>
@endsection
