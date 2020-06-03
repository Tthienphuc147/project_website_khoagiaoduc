@extends('admin/layout/index')

@section('admin_css')
    <link rel="stylesheet" href="admin/css/data-table/bootstrap-table.css">
    <!-- modals CSS
		============================================ -->
    <link rel="stylesheet" href="admin/css/modals.css">
    <style>
    	.modal-edu-general .modal-body.modal-add {
		    text-align: left;
		    padding: 30px 50px;
		}
    </style>
@endsection

@section('admin_content')
<div class="main-content">
    <div class="container">
        @if ( Session::has('success') )
            <div class="alert alert-success alert-dismissible" role="alert">
                <strong>{{ Session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
        @endif
        @if ( Session::has('error') )
        <div class="alert alert-danger alert-dismissible" role="alert">
            <strong>{{ Session::get('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>
        @endif
        <h3 class="pb-3">Chỉnh sửa tài khoản</h3>
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-body card-block">
                    <form action="quantri/quantrivien/chinhsua/{{$admins->id}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    {{csrf_field()}}
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tên đăng nhập</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="ten_dang_nhap" name="ten_dang_nhap" value="{{$admins->ten_dang_nhap}}" class="form-control" required/>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Họ và tên</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="ho_va_ten" name="ho_va_ten" value="{{$admins->ho_va_ten}}"  class="form-control" required/>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Email</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="email" id="email" name="email" value="{{$admins->email}}"  class="form-control" />
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Số điện thoại</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="so_dien_thoai" name="so_dien_thoai" value="{{$admins->so_dien_thoai}}"  class="form-control" />
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="file-input" class=" form-control-label">Ảnh cá nhân</label>
                            </div>

                            <div class="col-12 col-md-9">
                            <div class="col col-md-3">
                                <img src="/public/upload/image/{{$admins->avatar}}">
                            </div>
                                <input type="file" id="file-input" name="img_file" class="form-control-file">

                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Link</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="link" name="link" value="{{$admins->link}}"  class="form-control" required/>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Loại cấp bậc</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="id_cap_bac" id="id_cap_bac" class="form-control-lg form-control">
                                    <option value="{{$admins->cap_bac}}">{{$admins->ten_cap_bac}}</option>
                                    @foreach($data as $item)
                                    <option value="{{$item->id}}">{{$item->ten}}</option>
                                    @endforeach;
                                </select>
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

</div>


@endsection

@section('admin_script')
    <!-- data table JS
        ============================================ -->
    <script src="admin/js/data-table/bootstrap-table.js"></script>
    <script src="admin/js/data-table/tableExport.js"></script>
    <script src="admin/js/data-table/data-table-active.js"></script>
    <script src="admin/js/data-table/bootstrap-table-resizable.js"></script>
    <script src="admin/js/data-table/colResizable-1.5.source.js"></script>
    <script src="admin/js/data-table/bootstrap-table-export.js"></script>
@endsection
