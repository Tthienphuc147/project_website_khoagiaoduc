@extends('user.master')
@section('content')
       <!-- Trending Area Start -->
       <div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <!-- Trending Tittle -->
               
                <div class="carousel slide pt-3 pb-2" id="main-carousel" data-ride="carousel">
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
                    <div class="col-lg-12">
                        <div class="trending-tittle">
                            <strong>Thông báo mới</strong>
                            <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                            <div class="trending-animated">
                                <ul id="js-news" class="js-hidden">
                                    @foreach ($thong_bao_noi_bat as $item)
                                    <li class="news-item"><a href="/bai-viet/a{{$item->id}}" title="{{$item->tieu_de}}">{{$item->tieu_de}}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img">
                                        @if ($tin_tuc_noi_bat->hinh_anh_mo_ta)
        
                                        <img src="/public/upload/image/{{$tin_tuc_noi_bat->hinh_anh_mo_ta}}" alt="">
                                        @else
                                        <img src="/public/user/img/tintuc.jpg" alt="">
                                        @endif
                                        <h5 class="pt-2"><a href="/bai-viet/a{{$tin_tuc_noi_bat->id}}" title="{{$tin_tuc_noi_bat->tieu_de}}">{{$tin_tuc_noi_bat->tieu_de}}</a></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="trending-title mb-2 text-uppercase">Tin nổi bật</div>
                                <div class="trending-bottom">
                                            @foreach ($tin_tuc_top as $item)
                                            <div class="single-bottom mb-10 row">
                                                <div class="trend-bottom-img col-lg-5 pr-0">
                                                    @if ($item->hinh_anh_mo_ta)
                                                    <img src="/public/upload/image/{{$item->hinh_anh_mo_ta}}" alt="">
                                                    @else
                                                    <img src="/public/user/img/tintuc.jpg" alt="">
                                                    @endif
        
                                                </div>
                                                <div class="trend-bottom-cap col-lg-7">
                                                    <h6><a href="/bai-viet/a{{$item->id}}" title="{{$item->tieu_de}}">{{Str::limit($item->tieu_de, 100)}}</a></h6>
                                                </div>
                                            </div>
                                            @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Trending Top -->
                        <div class="row gray-bg">
                            <div class="col-12">
                                <div class="weekly2-news-active dot-style d-flex dot-style">
                                    @foreach ($thong_bao as $item)
                                    <div class="weekly2-single p-2">
                                        <div class="weekly2-img">
                                            <img src="https://www.sonoivu.haugiang.gov.vn/uploads/news/2019_05/thong-bao.jpg" alt="" width="100%">
                                        </div>
                                        <div class="weekly2-caption weekly2-caption1">
                                            <p>{{date('d-m-Y', strtotime($item->created_at))}}</p>
                                            <h6><a href="/bai-viet/a{{$item->id}}" title="{{$item->tieu_de}}">{{Str::limit($item->tieu_de, 100)}}</a></h6>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Trending Bottom -->

                    </div>
                    <!-- Riht content -->
                    <div class="col-lg-4">
                        <div class="trand-right-single d-flex">
                            <div class="inner search-inner">
                                <select name="weblink" class="w-100" id="cboWebLink" onchange="window.open(this.options[this.selectedIndex].value,'_blank');cboWebLink.option[0].selected=true">
                                    <option  value="#">-- Liên kết website --</option>
                                        <option value="http://thuvien.ued.udn.vn:8080/dspace/">Thư viện Đại học Sư Phạm Đà Nẵng</option>
                                        <option value="http://qlkh.ued.udn.vn/">Phòng khoa học và hợp tác quốc tế</option>
                                        <option value="http://daotao.ued.udn.vn/">Phòng đào tạo</option>
                                        <option value="http://khaothi.ued.udn.vn/">Phòng khảo thí và đảm bảo chất lượng giáo dục</option>
                                        <option value="https://www.facebook.com/Li%C3%AAn-chi-%C4%90o%C3%A0n-Gi%C3%A1o-d%E1%BB%A5c-M%E1%BA%A7m-non-Tr%C6%B0%E1%BB%9Dng-%C4%90%E1%BA%A1i-h%E1%BB%8Dc-S%C6%B0-ph%E1%BA%A1m-%C4%90H%C4%90N-168400530464070/">LCĐ khoa GDMN</option>
                                </select>
                            </div>
                        </div>
                        <div class="trand-right-single d-flex">
                            <a href="http://ued.udn.vn/" target="_blank"><img src="/public/user/img/sub-banner/1.png" ></a>
                        </div>
                        <div class="trand-right-single d-flex">
                            <a href="http://thuvien.ued.udn.vn:8080/dspace/" target="_blank"><img src="/public/user/img/sub-banner/2.png"></a>
                        </div>
                        <div class="trand-right-single d-flex">
                            <a href="http://qlht.ued.udn.vn/" target="_blank"><img src="/public/user/img/sub-banner/3.png"></a>
                        </div>
                        <div class="trand-right-single d-flex ">
                            <div class="trand-right-img mr-2">
                                <a href="/loai-bai-viet/a{{$all_share_danh_muc_tuyen_dung[0]->id}}"><img src="/public/user/img/td.png" alt="" width="170px"></a>
                            </div>
                            <div class="trand-right-img">
                                <a href="/lien-he"><img src="/public/user/img/lh.png" alt="" width="170px"></a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <section class="whats-news-area pt-50 pb-20">
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-12 col-md-12">
                        <div class="trending-title text-uppercase mb-30">
                            Tin tức hoạt động
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
                                        <div class="col-lg-6 col-md-6">
                                            <div class="single-what-news mb-20 row">
                                               
                                                <div class="what-img col-lg-3">
                                                    @if ($item->hinh_anh_mo_ta)
                                                    <img src="/public/upload/image/{{$item->hinh_anh_mo_ta}}" alt="" height="120px">
                                                    @else
                                                    <img src="/public/user/img/tintuc.jpg" alt="" height="120px">
                                                    @endif
                                                </div>
                                                <div class="col-lg-9 mt-2">
                                                    <span class="color1 p-1 mb-2">{{$item->ten_loai}}</span>
                                                    <h6 class="pt-2"><a href="/bai-viet/a{{$item->id}}" title="{{$item->tieu_de}}">{{$item->tieu_de}}</a></h6>
                                                    <p>Ngày đăng: {{date('d-m-Y', strtotime($item->created_at))}}</p>
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
                    <div class="col-lg-8 col-md-12">
                        <div class="weekly-news-active dot-style d-flex">
                            <div class="weekly-single active">
                                <div class="weekly-img">
                                    <img src="http://ued.udn.vn/uploads/news/2020_03/img_8092.jpg" alt="" height="250px">
                                </div>
                            </div>
                            <div class="weekly-single ">
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
                    <div class="col-lg-4 col-md-12 w-100 mt-2">
                                    <iframe src="https://www.youtube.com/embed/pMsZZ1wIWpY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen height="100%" width="100%"></iframe>
                    </div>
                </div>
           </div>
        </div>
    </div>
    <section class="whats-news-area pt-50 pb-20">
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-12 col-md-12">
                        <div class="trending-title text-uppercase mb-30">
                            Đào tạo
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
                                        @foreach ($dao_tao as $item)
                                        <div class="col-lg-6 col-md-6">
                                            <div class="single-what-news mb-20 row">
                                               
                                                <div class="what-img col-lg-3">
                                                    @if ($item->hinh_anh_mo_ta)
                                                    <img src="/public/upload/image/{{$item->hinh_anh_mo_ta}}" alt="" height="120px">
                                                    @else
                                                    <img src="/public/user/img/tintuc.jpg" alt="" height="120px">
                                                    @endif
                                                </div>
                                                <div class="col-lg-9 mt-2">
                                                    <span class="color1 p-1 mb-2">{{$item->ten_loai}}</span>
                                                    <h6 class="pt-2"><a href="/bai-viet/a{{$item->id}}" title="{{$item->tieu_de}}">{{$item->tieu_de}}</a></h6>
                                                    <p>Ngày đăng: {{date('d-m-Y', strtotime($item->created_at))}}</p>
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
    <section class="whats-news-area pt-50 pb-20">
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-12 col-md-12">
                        <div class="trending-title text-uppercase mb-30">
                            Sinh viên
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <!-- Nav Card -->
                        <div class="tab-content" id="nav-tabContent">
                            <!-- card one -->
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="whats-news-caption">
                                    <div class="row">
                                        @foreach ($dao_tao as $item)
                                        <div class="col-lg-12 col-md-12">
                                            <div class="single-what-news mb-20 row">
                                               
                                                <div class="what-img col-lg-3">
                                                    @if ($item->hinh_anh_mo_ta)
                                                    <img src="/public/upload/image/{{$item->hinh_anh_mo_ta}}" alt="" height="120px">
                                                    @else
                                                    <img src="/public/user/img/tintuc.jpg" alt="" height="120px">
                                                    @endif
                                                </div>
                                                <div class="col-lg-9 mt-2">
                                                    <span class="color1 p-1 mb-2">{{$item->ten_loai}}</span>
                                                    <h6 class="pt-2 w-80"><a href="/bai-viet/a{{$item->id}}" title="{{$item->tieu_de}}">{{$item->tieu_de}}</a></h6>
                                                    <p>Ngày đăng: {{date('d-m-Y', strtotime($item->created_at))}}</p>
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
                    <div class="col-lg-4 col-md-12">
                        <div class="trending-title text-uppercase mb-10">
                            Hình ảnh hoạt động
                        </div>
                        <div class="carousel slide pt-1 pb-2" id="main-carousel1" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#main-carousel1" data-slide-to="0" class="active"></li>
                                        <li data-target="#main-carousel1" data-slide-to="1"></li>
                                        <li data-target="#main-carousel1" data-slide-to="2"></li>
                                        <li data-target="#main-carousel1" data-slide-to="3"></li>
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
                
                                    <a href="#main-carousel1" class="carousel-control-prev" data-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                        <span class="sr-only" aria-hidden="true">Prev</span>
                                    </a>
                                    <a href="#main-carousel1" class="carousel-control-next" data-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                        <span class="sr-only" aria-hidden="true">Next</span>
                                    </a>
                        </div>
                        <div class="mt-2" style="min-width: 100%;">
                            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FLi%25C3%25AAn-chi-%25C4%2590o%25C3%25A0n-Gi%25C3%25A1o-d%25E1%25BB%25A5c-M%25E1%25BA%25A7m-non-Tr%25C6%25B0%25E1%25BB%259Dng-%25C4%2590%25E1%25BA%25A1i-h%25E1%25BB%258Dc-S%25C6%25B0-ph%25E1%25BA%25A1m-%25C4%2590H%25C4%2590N-168400530464070%2F&tabs&width=340&height=214&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=1942841682494119" width="100%" height="214" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media" style="width: 100%"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>


@endsection
