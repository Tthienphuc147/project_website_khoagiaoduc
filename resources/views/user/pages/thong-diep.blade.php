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
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thông điệp</li>
                      </ol>
                </div>

            </div>
           <div class="row">
                <div class="col-lg-12">
                    <!-- Trending Tittle -->
                    <div class="about-right mb-90 box-shadow">
                        <div class="section-tittle mb-30 pt-30">
                            <h3>{{$bai_viet->tieu_de}}</h3>
                        </div>
                        <div class="content_area">
                            {!!$bai_viet->noi_dung!!}
                        </div>

                    </div>
                </div>
           </div>
    </div>
</div>
@endsection
