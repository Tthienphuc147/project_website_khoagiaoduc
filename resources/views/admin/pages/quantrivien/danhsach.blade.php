@extends('admin/layout/index')

@section('admin_css')
    <link rel="stylesheet" href="/public/admin/css/data-table/bootstrap-table.css">
    <!-- modals CSS
		============================================ -->
    <link rel="stylesheet" href="/public/admin/css/modals.css">
    <style>
    	.modal-edu-general .modal-body.modal-add {
		    text-align: left;
		    padding: 30px 50px;
		}
    </style>
@endsection

@section('admin_content')
<div class="main-content">
   <!-- Loading Start -->
   <div class="data-table-area mg-b-15" id="show-loading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Loading End -->

<!-- Static Table Start -->
<div class="data-table-area mg-b-15" >
    <div class="container-fluid">
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
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <div class="row">
                                <div class="col-md-9">
                                     <h3>Danh sách các tài khoản</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">

                            <table id="table" class="table-style" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar" data-unique-id="id">
                                <thead>
                                    <tr>
                                        <th data-field="id">ID</th>
                                        <th data-field="ten_dang_nhap">Tên đăng nhập</th>
                                        <th data-field="ho_va_ten">Họ và tên</th>
                                        <th data-field="email">Email</th>
                                        <th data-field="user_type">Loại người dùng</th>
                                        <th data-field="role">Quyền</th>
                                        <th data-field="tuy_chon">Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($quan_tri_vien as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->ten_dang_nhap }}</td>
                                        <td>{{ $item->ho_va_ten }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                        @if ($item->id_role == 1)
                                            <span class="role user">Người dùng</span>
                                        @else
                                        <span class="role admin">Admin</span>
                                        @endif</td>
                                        <td>
                                            <div class="d-flex td--permissisons">
                                                <span @if ($item->trang_gioi_thieu == 1)
                                                    class="role user permission"
                                                    @endif
                                                    >
                                                    @if ($item->trang_gioi_thieu == 1)
                                                        QL_Trang GT
                                                    @endif
                                                </span>
                                                <span @if ($item->danh_muc_bai_viet == 1)
                                                    class="role user permission"
                                                    @endif
                                                    >
                                                    @if ($item->danh_muc_bai_viet == 1)
                                                        QL_Danh mục BV
                                                    @endif
                                                </span>
                                                <span @if ($item->loai_bai_viet == 1)
                                                    class="role user permission"
                                                    @endif
                                                    >
                                                    @if ($item->loai_bai_viet == 1)
                                                        QL_Loại BV
                                                    @endif
                                                </span>
                                                <span @if ($item->loai_van_ban == 1)
                                                    class="role user permission"
                                                    @endif
                                                    >
                                                    @if ($item->loai_van_ban == 1)
                                                        QL_Loại VB
                                                    @endif
                                                </span>
                                                <span @if ($item->van_ban == 1)
                                                                class="role user permission"
                                                                @endif
                                                                >
                                                                @if ($item->van_ban == 1)
                                                                    QL_Văn bản
                                                                @endif
                                                </span>
                                                <span @if ($item->slide == 1)
                                                                    class="role user permission"
                                                                    @endif
                                                                    >
                                                                    @if ($item->slide == 1)
                                                                        QL_Slide
                                                                    @endif
                                                </span>
                                                <span @if ($item->media == 1)
                                                    class="role user permission"
                                                    @endif
                                                    >
                                                    @if ($item->media == 1)
                                                        QL_Media
                                                    @endif
                                                </span>
                                                <span @if ($item->goc_hoi_dap == 1)
                                                                        class="role user permission"
                                                                        @endif
                                                                        >
                                                                        @if ($item->goc_hoi_dap == 1)
                                                                            QL_Góc hỏi đáp
                                                                        @endif
                                                </span>
                                                <span @if ($item->tai_khoan == 1)
                                                                            class="role user permission"
                                                                            @endif
                                                                            >
                                                                            @if ($item->tai_khoan == 1)
                                                                                QL_Tài khoản
                                                                            @endif
                                                </span>
                                                <span @if ($item->lich_cong_tac == 1)
                                                                                class="role user permission"
                                                                                @endif
                                                                                >
                                                                                @if ($item->lich_cong_tac == 1)
                                                                                    QL_Lịch công tác
                                                                                @endif
                                                </span>
                                                <span @if ($item->cau_hinh_website == 1)
                                                                                    class="role user permission"
                                                                                    @endif
                                                                                    >
                                                                                    @if ($item->cau_hinh_website == 1)
                                                                                        QL_Cấu hình Website
                                                                                    @endif
                                                 </span>

                                            </div>
                                        </td>
                                        <td>
                                            <a href="quantri/quantrivien/chinhsua/{{$item->id_admin}}"><button title="Chỉnh sửa" class="pd-setting-ed" >
                                                <i class="fa fa-pencil-square-o mr-3" aria-hidden="true"></i>
                                            </button>
                                            </a>
                                            <a href="quantri/quantrivien/xoa/{{$item->id_admin}}">
                                            <button title="Xóa" class="pd-setting-ed">
                                                <i class="fa fa-trash mr-3" aria-hidden="true"></i>
                                            </button>
                                            <a href="quantri/quantrivien/phanquyen/{{$item->id_admin}}">
                                                <button title="Phân quyền" class="pd-setting-ed">
                                                    <i class="fa fa-user mr-3" aria-hidden="true"></i>
                                                </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Static Table End -->

<div id="modaladd" class="modal modal-edu-general Customwidth-popup-WarningModal fade" role="dialog">
</div>

<div id="modaledit" class="modal modal-edu-general Customwidth-popup-WarningModal fade" role="dialog">
</div>
</div>


@endsection

@section('admin_script')
    <!-- data table JS
        ============================================ -->
    <script src="/public/admin/js/data-table/bootstrap-table.js"></script>
    <script src="/public/admin/js/data-table/tableExport.js"></script>
    <script src="/public/admin/js/data-table/data-table-active.js"></script>
    <script src="/public/admin/js/data-table/bootstrap-table-resizable.js"></script>
    <script src="/public/admin/js/data-table/colResizable-1.5.source.js"></script>
    <script src="/public/admin/js/data-table/bootstrap-table-export.js"></script>
@endsection
