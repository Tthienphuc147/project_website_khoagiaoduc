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
                                <li class="news-item"><a href="/bai-viet/{{changeTitle($item->tieu_de)}}a{{$item->id}}">{{$item->tieu_de}}</a></li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                        <li class="breadcrumb-item active">{{$loai_bai_viet}}</li>
                      </ol>
                </div>

            </div>
           <div class="row">
                <div class="col-lg-8">
                    <!-- Trending Tittle -->
                    <div class="about-right mb-90 box-shadow">
                        <div class="about-img">
                            <img src="assets/img/trending/trending_top.jpg" alt="">
                        </div>
                        <div class="section-tittle mb-30 pt-30">
                            <h3>{{$bai_viet->tieu_de}}</h3>
                            <div class="d-flex justify-content-end align-items-center">
                                <span class="mr-4"><i class="fa fa-user "></i> {{$user->ho_va_ten}}</span>
                                <span><i class="fa fa-eye"></i> {{$bai_viet->luot_xem}}</span>
                            </div>
                        </div>
                        <div class="content_area">
                            {!!$bai_viet->noi_dung!!}
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Tin tức liên quan</h3>
                            @foreach ($bai_viet_lien_quan as $item)
                            <div class="media post_item">
                                <img src="user/img/tintuc.jpg" alt="post" width="100px">
                                <div class="media-body">
                                    <a href="/bai-viet/{{changeTitle($item->tieu_de)}}a{{$item->id}}">
                                        <h3>{{$item->tieu_de}}</h3>
                                    </a>
                                    <p>{{date('d-m-Y', strtotime($item->created_at))}}</p>
                                </div>
                            </div>
                            @endforeach

                        </aside>





                    </div>
                </div>
           </div>
    </div>
</div>
@endsection
