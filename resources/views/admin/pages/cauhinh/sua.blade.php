@extends('admin/layout/index')



@section('admin_content')
<div class="main-content">

    <div class="container">
        <h3 class="pb-3">Sửa cấu hình website</h3>
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                @if (isset($message))
						<div class="alert alert-danger">
							{{$message}}
						</div>
					@endif
                </div>
                <div class="card-body card-block">
                    <form action="quantri/cauhinh/chinhsua" method="post" enctype="multipart/form-data" class="form-horizontal">
                    {{csrf_field()}}
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Email</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="ten" name="email" placeholder="{{$data->email}}" class="form-control" >

                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Số điện thoại</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="ten" name="so_dien_thoai" placeholder="{{$data->so_dien_thoai}}" class="form-control" >

                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Số điện thoại khoa</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text"  name="so_dien_thoai_khoa" placeholder="{{$data->so_dien_thoai_khoa}}" class="form-control" >

                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Mô tả</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea type="input"  name="mo_ta" placeholder="{{$data->mo_ta}}" class="form-control" ></textarea>

                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Link video</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea type="input"  name="link_video" placeholder="{{$data->link_video}}" class="form-control" ></textarea>
                                <div class="video-items mt-2 ">
                                    @if ($data->link_video)
                                    <iframe src="{{$data->link_video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    @else
                                        <h5>Chưa có video giới thiệu</h5>
                                    @endif

                                </div>
                            </div>
                        </div>


                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>

                        </div>

                    </form>
                </div>

            </div>
          </div>
    </div>

</div>


@endsection
