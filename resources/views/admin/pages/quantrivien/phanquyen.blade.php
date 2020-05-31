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
        <h3 class="pb-3">Phân quyền chức năng</h3>
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-body card-block">
                    <form id="form-sua-phan-quyen" action="quantri/quantrivien/phanquyen/{{$permissions->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-3">
                                <h5>Quyền quản lý trang giới thiệu</h5>
                            </div>
                            <div class="form-group col-md-4">
                                <select class="form-control custom-select-value" name="trang_gioi_thieu" required="" oninvalid="this.setCustomValidity('Vui lòng chọn phân quyền')" oninput="setCustomValidity('')">
                                    <option value="0"
                                        @if ($permissions->trang_gioi_thieu == 0)
                                            selected="selected"
                                        @endif>
                                        Không
                                    </option>
                                    <option value="1"
                                        @if ($permissions->trang_gioi_thieu == 1)
                                        selected="selected"
                                        @endif>
                                        Có
                                    </option>

                            </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <h5>Quyền quản lý danh mục bài viết</h5>
                            </div>
                            <div class="form-group col-md-4">
                                <select class="form-control custom-select-value" name="danh_muc_bai_viet" required="" oninvalid="this.setCustomValidity('Vui lòng chọn phân quyền')" oninput="setCustomValidity('')">
                                    <option value="0"
                                    @if ($permissions->danh_muc_bai_viet == 0)
                                        selected="selected"
                                    @endif>
                                    Không
                                </option>
                                <option value="1"
                                    @if ($permissions->danh_muc_bai_viet == 1)
                                    selected="selected"
                                    @endif>
                                    Có
                                </option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <h5>Quyền quản lý loại bài viết</h5>
                            </div>
                            <div class="form-group col-md-4">
                                <select class="form-control custom-select-value" name="loai_bai_viet" required="" oninvalid="this.setCustomValidity('Vui lòng chọn phân quyền')" oninput="setCustomValidity('')">
                                    <option value="0"
                                    @if ($permissions->loai_bai_viet == 0)
                                        selected="selected"
                                    @endif>
                                    Không
                                </option>
                                <option value="1"
                                    @if ($permissions->loai_bai_viet == 1)
                                    selected="selected"
                                    @endif>
                                    Có
                                </option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <h5>Quyền quản lý loại văn bản</h5>
                            </div>
                            <div class="form-group col-md-4">
                                <select class="form-control custom-select-value" name="loai_van_ban" required="" oninvalid="this.setCustomValidity('Vui lòng chọn phân quyền')" oninput="setCustomValidity('')">
                                    <option value="0"
                                    @if ($permissions->loai_van_ban == 0)
                                        selected="selected"
                                    @endif>
                                    Không
                                </option>
                                <option value="1"
                                    @if ($permissions->loai_van_ban== 1)
                                    selected="selected"
                                    @endif>
                                    Có
                                </option>

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <h5>Quyền quản lý văn bản</h5>
                            </div>
                            <div class="form-group col-md-4">
                                <select class="form-control custom-select-value" name="van_ban" required="" oninvalid="this.setCustomValidity('Vui lòng chọn phân quyền')" oninput="setCustomValidity('')">
                                    <option value="0"
                                    @if ($permissions->van_ban == 0)
                                        selected="selected"
                                    @endif>
                                    Không
                                </option>
                                <option value="1"
                                    @if ($permissions->van_ban== 1)
                                    selected="selected"
                                    @endif>
                                    Có
                                </option>

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <h5>Quyền quản lý slide</h5>
                            </div>
                            <div class="form-group col-md-4">
                                <select class="form-control custom-select-value" name="slide" required="" oninvalid="this.setCustomValidity('Vui lòng chọn phân quyền')" oninput="setCustomValidity('')">
                                    <option value="0"
                                    @if ($permissions->slide == 0)
                                        selected="selected"
                                    @endif>
                                    Không
                                </option>
                                <option value="1"
                                    @if ($permissions->slide== 1)
                                    selected="selected"
                                    @endif>
                                    Có
                                </option>

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <h5>Quyền quản lý media</h5>
                            </div>
                            <div class="form-group col-md-4">
                                <select class="form-control custom-select-value" name="media" required="" oninvalid="this.setCustomValidity('Vui lòng chọn phân quyền')" oninput="setCustomValidity('')">
                                    <option value="0"
                                    @if ($permissions->media == 0)
                                        selected="selected"
                                    @endif>
                                    Không
                                </option>
                                <option value="1"
                                    @if ($permissions->media = 1)
                                    selected="selected"
                                    @endif>
                                    Có
                                </option>

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <h5>Quyền quản lý góc hỏi đáp</h5>
                            </div>
                            <div class="form-group col-md-4">
                                <select class="form-control custom-select-value" name="goc_hoi_dap" required="" oninvalid="this.setCustomValidity('Vui lòng chọn phân quyền')" oninput="setCustomValidity('')">
                                    <option value="0"
                                    @if ($permissions->goc_hoi_dap == 0)
                                        selected="selected"
                                    @endif>
                                    Không
                                </option>
                                <option value="1"
                                    @if ($permissions->goc_hoi_dap== 1)
                                    selected="selected"
                                    @endif>
                                    Có
                                </option>

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <h5>Quyền quản lý tài khoản</h5>
                            </div>
                            <div class="form-group col-md-4">
                                <select class="form-control custom-select-value" name="tai_khoan" required="" oninvalid="this.setCustomValidity('Vui lòng chọn phân quyền')" oninput="setCustomValidity('')">
                                    <option value="0"
                                    @if ($permissions->tai_khoan == 0)
                                        selected="selected"
                                    @endif>
                                    Không
                                </option>
                                <option value="1"
                                    @if ($permissions->tai_khoan== 1)
                                    selected="selected"
                                    @endif>
                                    Có
                                </option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <h5>Quyền quản lịch công tác</h5>
                            </div>
                            <div class="form-group col-md-4">
                                <select class="form-control custom-select-value" name="lich_cong_tac" required="" oninvalid="this.setCustomValidity('Vui lòng chọn phân quyền')" oninput="setCustomValidity('')">
                                    <option value="0"
                                    @if ($permissions->lich_cong_tac == 0)
                                        selected="selected"
                                    @endif>
                                    Không
                                </option>
                                <option value="1"
                                    @if ($permissions->lich_cong_tac== 1)
                                    selected="selected"
                                    @endif>
                                    Có
                                </option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <h5>Quyền quản lý cấu hình Website</h5>
                            </div>
                            <div class="form-group col-md-4">
                                <select class="form-control custom-select-value" name="cau_hinh_website" required="" oninvalid="this.setCustomValidity('Vui lòng chọn phân quyền')" oninput="setCustomValidity('')">
                                    <option value="0"
                                    @if ($permissions->cau_hinh_website == 0)
                                        selected="selected"
                                    @endif>
                                    Không
                                </option>
                                <option value="1"
                                    @if ($permissions->cau_hinh_website== 1)
                                    selected="selected"
                                    @endif>
                                    Có
                                </option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-success pull-right" name="save">Chỉnh sửa</button>
                            </div>
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
