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
                <li class="breadcrumb-item active">Thư viện hình ảnh</li>
              </ol>


    </div>
    <section class="whats-news-area pt-50 pb-30">
        <div class="container pb-100">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-8">
                            <div class="row">
                                <div class="row">
                                   @if (sizeof($album)>0)
                                   @foreach ($album as $item)
                                   <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                       <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                                          data-image="/public/upload/image/{{$item->url}}"
                                          data-target="#image-gallery">
                                           <img class="img-thumbnail"
                                                src="/public/upload/image/{{$item->url}}" style="width:300px !important;height:180px !important;object-fit:cover">
                                       </a>
                                   </div>
                                   @endforeach

                                   @endif
                                </div>
                        
                        
                                <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="image-gallery-title"></h4>
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img id="image-gallery-image" class="img-responsive col-md-12" src="" style="width:100% !important;height:600px !important;object-fit:cover">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                                                </button>
                        
                                                <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="blog_right_sidebar">
                                <aside class="single_sidebar_widget popular_post_widget">
                                    <h3 class="widget_title">Album khác</h3>
                                    @foreach ($loai_danh_muc as $item)
                                    <div class="media post_item">
                                        <img src="/public/user/img/album.png" alt="post" width="100px">
                                        <div class="media-body">
                                            <a href="/album/b{{$item->id}}">
                                                <h3>{{$item->ten}}</h3>
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
        </div>
    </section>
</div>
@endsection
