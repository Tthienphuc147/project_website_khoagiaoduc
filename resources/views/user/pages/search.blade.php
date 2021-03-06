@extends('user.master')
@section('content')
<?php function  keywordHighlight($str,$tukhoa){
    return str_replace("$tukhoa","<span style='color:#880000;font-size:18px;padding:0;text-transform: lowercase;'>$tukhoa</span>",$str);
        }?>
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
                <li class="breadcrumb-item active">Tìm kiếm</li>
              </ol>


    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 font-weight-bold"> Đã tìm thấy {{$bai_viets ->count()}} bài viết liên quan đến tìm kiếm</div>
            </div>
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
                                            @foreach ($bai_viets as $item)
                                            <div class="col-lg-4 col-md-4">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        @if ($item->hinh_anh_mo_ta)

                                                        <img src="/public/upload/image/{{$item->hinh_anh_mo_ta}}" alt="" width="370px" height="248px">
                                                        @else
                                                        <img src="/public/user/img/tintuc.jpg" alt=""  >
                                                        @endif

                                                    </div>
                                                    <div class="what-cap">
                                                        <h4><a href="/bai-viet/a{{$item->id}}">{!!keywordHighlight($item->tieu_de,$keyword)!!}</a></h4>
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
</div>
@endsection
