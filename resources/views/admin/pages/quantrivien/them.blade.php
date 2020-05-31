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
        <h3 class="pb-3">Thêm tài khoản</h3>

        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-body card-block">
                    <form  id="form-them-quan-tri-vien" action="quantri/quantrivien/them" method="post" enctype="multipart/form-data" class="form-horizontal">
                    {{csrf_field()}}
                    @if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Tên đăng nhập</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="ten_dang_nhap" name="ten_dang_nhap"  class="form-control" oninvalid="this.setCustomValidity('Vui lòng điền trường này')" oninput="setCustomValidity('')" value="" required/>
                            <label id="loi_tai_Khoan" class="error"></label>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Họ và tên</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="ho_va_ten" name="ho_va_ten"   class="form-control" oninvalid="this.setCustomValidity('Vui lòng điền trường này')" oninput="setCustomValidity('')" value="" required/>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Email</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="email" id="email" name="email"   class="form-control" oninvalid="this.setCustomValidity('Vui lòng điền trường này')" oninput="setCustomValidity('')" value="" />
                            <label id="loi_email" class="error"></label>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Số điện thoại</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="so_dien_thoai" name="so_dien_thoai"   class="form-control" oninvalid="this.setCustomValidity('Vui lòng điền trường này')" oninput="setCustomValidity('')" value="" />
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Link</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="link" name="link"   class="form-control" oninvalid="this.setCustomValidity('Vui lòng điền trường này')" oninput="setCustomValidity('')" value="" required/>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="selectLg" class=" form-control-label">Chọn cấp bậc</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="id_cap_bac" id="id_cap_bac" class="form-control-lg form-control">
                                @foreach($data as $item)
                                <option value="{{$item->id}}">{{$item->ten}}</option>
                                @endforeach;
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="file-input" class=" form-control-label">Ảnh cá nhân</label>
                        </div>

                        <div class="col-12 col-md-9">

                            <input type="file" id="file-input" name="img_file" class="form-control-file" required>

                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Mật khẩu</label>
                            <input id="mat_khau_tai_khoan" type="password" class="form-control" placeholder="Nhập mật khẩu" required="" name="password" oninvalid="this.setCustomValidity('Vui lòng điền trường này')" oninput="setCustomValidity('')" value="">
                            <label id="loi_mat_khau" class="error"></label>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nhập lại mật khẩu</label>
                            <input id="xac_nhan_tai_khoan" type="password" class="form-control" placeholder="Nhập lại mật khẩu" required="" name="password_confirmation" oninvalid="this.setCustomValidity('Vui lòng điền trường này')" oninput="setCustomValidity('')" value="">
                        </div>
                    </div>
                        <div class="card-footer">
                            <button type="submit" id="sub_form_singin" class="btn btn-primary btn-sm">
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
