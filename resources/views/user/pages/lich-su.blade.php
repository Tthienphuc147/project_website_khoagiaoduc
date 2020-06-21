@extends('user.master')
@section('content')
<div class="about-area">
    <div class="container">
            <!-- Hot Aimated News Tittle-->
            <div class="row">
                <div class="col-lg-12">
                    @include('user.layout.thong-bao')
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Lịch sử phát triển</li>
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
