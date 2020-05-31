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
                        <li class="breadcrumb-item active">Cơ cấu tổ chức</li>
                      </ol>
                </div>

            </div>
           <div class="row">
                <div class="col-lg-12">
                    <!-- Trending Tittle -->

                    <div class="about-right mb-90 box-shadow">
                        <h3 class="text-center">THÔNG TIN CƠ CÂU TỔ CHỨC</h3>
                        <h5>Trưởng khoa</h5>
                        <div class="row">
                            @foreach ($truong_khoa as $item)
                            <div class="col-lg-4 mb-2">
                                <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="{{$item->avatar}}" alt="Card image cap" height="250px">
                                    <div class="card-body">
                                      <h5 class="card-title">{{$item->ho_va_ten}}</h5>
                                    </div>
                                    <div class="card-body">
                                      Thông tin cá nhân: <a href="{{$item->link}}" class="card-link" target="_blank">Xem tại đây</a>
                                    </div>
                                  </div>
                            </div>
                            @endforeach

                        </div>
                        <hr class="mt-2">
                        <h5>Phó trưởng khoa</h5>
                        <div class="row">
                            @foreach ($pho_truong_khoa as $item)
                            <div class="col-lg-4 mb-2">
                                <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="{{$item->avatar}}" alt="Card image cap" height="250px">
                                    <div class="card-body">
                                      <h5 class="card-title">{{$item->ho_va_ten}}</h5>
                                    </div>
                                    <div class="card-body">
                                      Thông tin cá nhân: <a href="{{$item->link}}" class="card-link" target="_blank">Xem tại đây</a>
                                    </div>
                                  </div>
                            </div>
                            @endforeach

                        </div>
                        <hr class="mt-2">
                        <h5>Phó trưởng bộ môn cơ sở</h5>
                        <div class="row">
                            @foreach ($pho_bo_mon_cs as $item)
                            <div class="col-lg-4 mb-2">
                                <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="{{$item->avatar}}" alt="Card image cap" height="250px">
                                    <div class="card-body">
                                      <h5 class="card-title">{{$item->ho_va_ten}}</h5>
                                    </div>
                                    <div class="card-body">
                                      Thông tin cá nhân: <a href="{{$item->link}}" class="card-link" target="_blank">Xem tại đây</a>
                                    </div>
                                  </div>
                            </div>
                            @endforeach

                        </div>
                        <hr class="mt-2">
                        <h5>Phó trưởng bộ môn chuyên nghành</h5>
                        <div class="row">
                            @foreach ($pho_bo_mon_cn as $item)
                            <div class="col-lg-4 mb-2">
                                <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="{{$item->avatar}}" alt="Card image cap" height="250px">
                                    <div class="card-body">
                                      <h5 class="card-title">{{$item->ho_va_ten}}</h5>
                                    </div>
                                    <div class="card-body">
                                      Thông tin cá nhân: <a href="{{$item->link}}" class="card-link" target="_blank">Xem tại đây</a>
                                    </div>
                                  </div>
                            </div>
                            @endforeach

                        </div>
                        <hr class="mt-2">
                        <h5>Giảng viên tổ cơ sơ</h5>
                        <div class="row">
                            @foreach ($gvcs as $item)
                            <div class="col-lg-4 mb-2">
                                <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="{{$item->avatar}}" alt="Card image cap" height="250px">
                                    <div class="card-body">
                                      <h5 class="card-title">{{$item->ho_va_ten}}</h5>
                                    </div>
                                    <div class="card-body">
                                      Thông tin cá nhân: <a href="{{$item->link}}" class="card-link" target="_blank">Xem tại đây</a>
                                    </div>
                                  </div>
                            </div>
                            @endforeach

                        </div>
                        <hr class="mt-2">
                        <h5>Giảng viên tổ chuyên ngành</h5>
                        <div class="row">
                            @foreach ($gvcn as $item)
                            <div class="col-lg-4 mb-2">
                                <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="{{$item->avatar}}" alt="Card image cap" height="250px">
                                    <div class="card-body">
                                      <h5 class="card-title">{{$item->ho_va_ten}}</h5>
                                    </div>
                                    <div class="card-body">
                                      Thông tin cá nhân: <a href="{{$item->link}}" class="card-link" target="_blank">Xem tại đây</a>
                                    </div>
                                  </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
           </div>
    </div>
</div>
@endsection
