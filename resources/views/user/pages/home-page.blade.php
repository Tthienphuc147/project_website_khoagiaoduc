@extends('user.master')
@section('content')
       <!-- Trending Area Start -->
       <div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <!-- Trending Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-tittle">
                            <strong>Thông báo mới</strong>
                            <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                            <div class="trending-animated">
                                <ul id="js-news" class="js-hidden">
                                    @foreach ($thong_bao_noi_bat as $item)
                                    <li class="news-item"><a href="/bai-viet/{{changeTitle($item->tieu_de)}}a{{$item->id}}" title="{{$item->tieu_de}}">{{$item->tieu_de}}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="carousel slide pb-5" id="main-carousel" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#main-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#main-carousel" data-slide-to="1"></li>
                        <li data-target="#main-carousel" data-slide-to="2"></li>
                        <li data-target="#main-carousel" data-slide-to="3"></li>
                    </ol><!-- /.carousel-indicators -->

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="https://scontent.fsgn2-3.fna.fbcdn.net/v/t1.0-9/75412152_473268519977268_8075841622442508288_o.jpg?_nc_cat=106&_nc_sid=8024bb&_nc_ohc=FJs9R5P14BQAX_RfmCG&_nc_ht=scontent.fsgn2-3.fna&oh=c7d5af1da49e5133089a0b97085bdaac&oe=5EE517E9" alt="">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="https://scontent.fsgn2-2.fna.fbcdn.net/v/t1.0-9/81387568_512066679430785_7295363017271672832_o.jpg?_nc_cat=103&_nc_sid=e007fa&_nc_ohc=IAdGRQEu7L0AX8aAbuw&_nc_ht=scontent.fsgn2-2.fna&oh=0e085970a959320c5538b32d11f2358b&oe=5EE3D2BF" alt="">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="https://scontent.fsgn2-1.fna.fbcdn.net/v/t1.0-9/76619239_478306139473506_812584082708889600_o.jpg?_nc_cat=105&_nc_sid=8024bb&_nc_ohc=wbYt0g9xg6cAX-5BcOB&_nc_ht=scontent.fsgn2-1.fna&oh=6988a6febb5cc343cbc5cf05f8782b7a&oe=5EE6A0A0" alt="">
                        </div>
                    </div><!-- /.carousel-inner -->

                    <a href="#main-carousel" class="carousel-control-prev" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        <span class="sr-only" aria-hidden="true">Prev</span>
                    </a>
                    <a href="#main-carousel" class="carousel-control-next" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="sr-only" aria-hidden="true">Next</span>
                    </a>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        <div class="trending-top mb-30">
                            <div class="trend-top-img">
                                <img src="https://img.giaoduc.net.vn/w1050/Uploaded/2020/zgtzgo/2018_08_15/suphamdanang.jpg" alt="">
                                <div class="trend-top-cap">
                                    <span>{{$tin_tuc_noi_bat->ten_loai}}</span>
                                    <h2 class="pr-2"><a href="/bai-viet/{{changeTitle($tin_tuc_noi_bat->tieu_de)}}a{{$tin_tuc_noi_bat->id}}" title="{{$tin_tuc_noi_bat->tieu_de}}">{{limitStrlen($tin_tuc_noi_bat->tieu_de, 300)}}</h2>
                                </div>
                            </div>
                        </div>
                        <!-- Trending Bottom -->
                        <div class="trending-bottom">
                            <div class="row">
                                @foreach ($tin_tuc_top as $item)
                                <div class="col-lg-4">
                                    <div class="single-bottom mb-35">
                                        <div class="trend-bottom-img mb-30">
                                            <img src="http://ued.udn.vn/uploads/news/2019_12/4.jpg" alt="">
                                        </div>
                                        <div class="trend-bottom-cap">
                                            <span class="color1">{{$item->ten_loai}}</span>
                                            <h4><a href="/bai-viet/{{changeTitle($item->tieu_de)}}a{{$item->id}}" title="{{$item->tieu_de}}">{{limitStrlen($item->tieu_de, 130)}}</a></h4>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <!-- Riht content -->
                    <div class="col-lg-4">
                        <div class="trand-right-single d-flex">
                            <a href="http://ued.udn.vn/" target="_blank"><img src="user/img/sub-banner/1.png" ></a>
                        </div>
                        <div class="trand-right-single d-flex">
                            <a href="http://qlht.ued.udn.vn/" target="_blank"><img src="user/img/sub-banner/3.png"></a>
                        </div>

                        <div class="trand-right-single d-flex">
                            <div class="inner">
                                <select name="weblink" class="w-100" id="cboWebLink" onchange="window.open(this.options[this.selectedIndex].value,'_blank');cboWebLink.option[0].selected=true">
                                    <option  value="#">-- Liên kết website --</option>
                                        <option value="http://chinhphu.vn/portal/page/portal/chinhphu/trangchu">Thư viện Đại học Sư Phạm Đà Nẵng</option>
                                        <option value="http://www.moet.gov.vn/Pages/home.aspx">Hệ thống tích hợp thông tin</option>
                                        <option value="https://www.most.gov.vn/vn/Pages/Trangchu.aspx">Phòng khoa học và hợp tác quốc tế</option>
                                        <option value="http://giaoducthoidai.vn/">Phòng đào tạo</option>
                                        <option value="http://thucnghiem.edu.vn/">Phòng khảo thí và đảm bảo chất lượng giáo dục</option>
                                        <option value="http://thucnghiem.edu.vn/">LCĐ khoa GDMN</option>
                                </select>
                            </div>
                        </div>
                        <div class="trand-right-single d-flex">
                            <div class="trand-right-img">
                                <img src="user/img/td.png" alt="" width="350px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trending Area End -->
    <!--   Weekly-News start -->


    <div class="weekly2-news-area  weekly2-pading gray-bg">
        <div class="container">
            <div class="weekly2-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Thông báo</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="weekly2-news-active dot-style d-flex dot-style">
                            @foreach ($thong_bao as $item)
                            <div class="weekly2-single">
                                <div class="weekly2-img">
                                    <img src="https://www.sonoivu.haugiang.gov.vn/uploads/news/2019_05/thong-bao.jpg" alt="">
                                </div>
                                <div class="weekly2-caption">
                                    <span class="color1">{{$item->ten_loai}}</span>
                                    <p>{{date('d-m-Y', strtotime($item->created_at))}}</p>
                                    <h4><a href="/bai-viet/{{changeTitle($item->tieu_de)}}a{{$item->id}}" title="{{$item->tieu_de}}">{{limitStrlen($item->tieu_de, 100)}}</a></h4>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Weekly-News -->
   <!-- Whats New Start -->
    <section class="whats-news-area pt-50 pb-20">
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-12 col-md-12">
                        <div class="section-tittle mb-30">
                            <h3>Tin tức hoạt động</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Nav Card -->
                        <div class="tab-content" id="nav-tabContent">
                            <!-- card one -->
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="whats-news-caption">
                                    <div class="row">
                                        @foreach ($tin_tuc as $item)
                                        <div class="col-lg-4 col-md-4">
                                            <div class="single-what-news mb-100">
                                                <div class="what-img">
                                                    <img src="https://media.giaoducthoidai.vn/Uploaded/thuyvt/2018_03_11/2NewFolder/truong-dai-hoc-su-pham-da-nang-tra-bang-tot-nghiep-1_jpg_KTVK.JPG" alt="">
                                                </div>
                                                <div class="what-cap">
                                                    <span class="color1">{{$item->ten_loai}}</span>
                                                    <h4><a href="/bai-viet/{{changeTitle($item->tieu_de)}}a{{$item->id}}" title="{{$item->tieu_de}}">{{limitStrlen($item->tieu_de, 100)}}</a></h4>
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach


                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- End Nav Card -->
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!-- Whats New End -->
    <!--   Weekly2-News start -->
    <div class="weekly-news-area pt-50">
        <div class="container">
           <div class="weekly-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Hình ảnh hoạt động</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="weekly-news-active dot-style d-flex dot-style">
                            <div class="weekly-single">
                                <div class="weekly-img">
                                    <img src="http://ued.udn.vn/uploads/news/2020_03/img_8092.jpg" alt="" height="250px">
                                </div>
                            </div>
                            <div class="weekly-single active">
                                <div class="weekly-img">
                                        <img src="http://ued.udn.vn/uploads/news/2019_12/1.jpg" alt="" height="250px">
                                </div>
                            </div>
                            <div class="weekly-single">
                                <div class="weekly-img">
                                        <img src="http://ued.udn.vn/uploads/news/2019_12/2.jpg" alt="" height="250px">
                                </div>
                            </div>
                            <div class="weekly-single">
                                <div class="weekly-img">
                                    <img src="http://ued.udn.vn/uploads/news/2019_12/2.jpg" alt="" height="250px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </div>
    <!-- End Weekly-News -->
    <!-- Start Youtube -->
    <div class="recent-articles">
        <div class="container">
           <div class="recent-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Đào tạo</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="recent-active dot-style d-flex dot-style">
                            @foreach ($dao_tao as $item)
                            <div class="single-recent mb-100">
                                <div class="what-img">
                                    <img src="http://ued.udn.vn/uploads/news/2019_12/4.jpg" alt="">
                                </div>
                                <div class="what-cap">
                                    <span class="color1">{{$item->ten_loai}}</span>
                                    <h4><a href="/bai-viet/{{changeTitle($item->tieu_de)}}a{{$item->id}}" title="{{$item->tieu_de}}">{{limitStrlen($item->tieu_de, 100)}}</a></h4>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </div>
    <div class="youtube-area video-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="video-items-active">
                        <div class="video-items text-center">
                            <iframe src="https://www.youtube.com/embed/pMsZZ1wIWpY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
