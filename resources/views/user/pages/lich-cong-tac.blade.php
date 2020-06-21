@extends('user.master')
@section('content')
<div class="about-area">
    <div class="container">
            <!-- Hot Aimated News Tittle-->
            <div class="row">
                <div class="col-lg-12">
                    @include('user.layout.thong-bao')
                </div>
            </div>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item active">Lịch công tác</li>
              </ol>


    </div>
    <section class="whats-news-area pt-50 pb-30">
        <div class="container pb-100">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <!-- Nav Card -->
                            <div class="tab-content" id="nav-tabContent">
                                <!-- card one -->
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="whats-news-caption">
                                        <div class="row">
                                            @foreach ($lichs as $item)
                                            <div class="col-lg-4 col-md-4">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="/public/user/img/lich.png" alt="" width="370px" height="248px">
                                                    </div>
                                                    <div class="what-cap">
                                                        <h4><a href="/lich/c{{$item->id}}">Lịch công tác từ ngày {{date('d-m-Y', strtotime($item->thoi_gian_bat_dau))}} đến {{date('d-m-Y', strtotime($item->thoi_gian_ket_thuc))}}</a></h4>
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
                    <div class="row mt-5 d-flex justify-content-end">
                        {{$lichs->links()}}
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection
