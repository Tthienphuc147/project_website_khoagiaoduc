
@extends('user.master')
@section('content')
<div class="about-area">
    <div class="container">
            <!-- Hot Aimated News Tittle-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending-tittle w-100">
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
                        <li class="breadcrumb-item active">Cơ cấu tổ chức</li>
                      </ol>
                </div>

            </div>
           <div class="row">
                <div class="col-lg-12">
                    <!-- Trending Tittle -->

                    <div class="about-right mb-90 box-shadow">
                        <h3 class="text-center">THÔNG TIN CƠ CẤU TỔ CHỨC</h3>
                        @foreach ($loai_cap_bac as $item)
                        <h5 class="text-center mt-3">{{$item->ten}}</h5>
                        <div class="row d-flex
                        @if ($item->id == 1  || $item->id == 2)
                        justify-content-center
                        @endif
                        ">
                            @foreach ($user as $item1)
                            @if ($item1->cap_bac === $item->id)
                            <div class="col-lg-4 mb-2">
                                <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="/public/upload/image/{{$item1->avatar}}" alt="Card image cap" height="250px">
                                    <div class="card-body">
                                      <h5 class="card-title">{{$item1->ho_va_ten}}</h5>
                                    </div>
                                    <div class="card-body">
                                      Thông tin cá nhân: <a href="{{$item1->link}}" class="card-link" target="_blank">Xem tại đây</a>
                                    </div>
                                  </div>
                            </div>
                            @endif

                            @endforeach

                        </div>
                        @endforeach
                    </div>
                </div>
           </div>
    </div>
</div>
@endsection
