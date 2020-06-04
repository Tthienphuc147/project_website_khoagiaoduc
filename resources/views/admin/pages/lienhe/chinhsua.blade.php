@extends('admin/layout/index')



@section('admin_content')
<div class="main-content">

    <div class="container">
        <h3 class="pb-3">Phản hồi liên hệ</h3>
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
                    <form action="/quantri/gochoidap/hotro/chinhsua/{{$ho_tro->id}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    {{csrf_field()}}
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tên</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="ten" name="ten" value="{{$ho_tro->ten}}" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Lớp</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="ten" name="ten" value="{{$ho_tro->lop}}" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Số điện thoại</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="ten" name="ten" value="{{$ho_tro->so_dien_thoai}}" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Email</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="ten" name="email" value="{{$ho_tro->email}}" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tiêu đề liên hệ</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="ten" name="ten" value="{{$ho_tro->tieu_de_lien_he}}" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nội dung liên hệ</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea name="" id="" cols="100" rows="10" disabled>{{$ho_tro->noi_dung_lien_he}}</textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Phản hồi</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea name="phan_hoi" id="" cols="100" rows="10" required style="    background-color: #faf9f9;
                                border: 1px solid grey;"></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Gửi phản hồi
                            </button>
                        </div>

                    </form>
                </div>

            </div>
          </div>
    </div>

</div>


@endsection


