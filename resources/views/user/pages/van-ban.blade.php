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
                        <li class="breadcrumb-item active">Văn bản cho sinh viên</li>
                      </ol>
                </div>

            </div>
           <div class="row">
                <div class="col-lg-12">
                    <!-- Trending Tittle -->
                    <div class="about-right mb-90 box-shadow">
                        <div class="section-tittle mb-30 pt-30">
                            Văn bản biểu mẫu
                        </div>
                        <div class="content_area">
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Tên văn bản</th>
                                    <th>Thao tác</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($van_bans as $key=>$item)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{$item->ten}}</td>
                                        <td><a href="/public/upload/documents/{{$item->file}}" target="_blank" download>Tải xuống</a></td>
                                      </tr>
                                    @endforeach
                                
                                </tbody>
                              </table>
                             
                        </div>
                        {{$van_bans->links()}}
                    </div>
                </div>
           </div>
    </div>
</div>
@endsection
