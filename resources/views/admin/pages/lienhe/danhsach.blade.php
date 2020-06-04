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
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <div class="row">
                                <div class="col-md-9">
                                     <h3>Danh sách các liên hệ</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">

                            <table id="table" class="table-style" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar" data-unique-id="id">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="id">ID</th>
                                        <th data-field="tieu_de_lien_he">Tiêu đề liên hệ</th>
                                        <th data-field="noi_dung">Nội dung</th>
                                        <th data-field="ten">Tên</th>
                                        <th data-field="so_dien_thoai">Số điện thoại</th>
                                        <th data-field="lop">Lớp</th>
                                        <th data-field="email">Email</th>
                                        <th data-field="option">Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ho_tro as $item)
                                    @if(!$item->is_read)
                                    <tr >
                                        <td></td>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->tieu_de_lien_he }}</td>
                                        <td>{{ $item->noi_dung_lien_he }}</td>
                                        <td>{{ $item->ten }}</td>
                                        <td>{{ $item->so_dien_thoai }}</td>
                                        <td>{{ $item->lop }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                              {{-- <button title="Xóa" class="pd-setting-ed" onclick="deleteID({{$item->id }});">
                                                <i class="fa fa-trash mr-3" aria-hidden="true"></i>
                                            </button> --}}
                                            <a href="/quantri/gochoidap/hotro/chinhsua/{{ $item->id }}"> <button title="Trả lời liên hệ" class="pd-setting-ed">
                                                <i class="fa fa-send mr-3" aria-hidden="true"></i>
                                            </button></a>
                                        </td>
                                    </tr>
                                    @else
                                    <tr class="info bg-c1" style="color:#fff !important">
                                        <td></td>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->tieu_de_lien_he }}</td>
                                        <td>{{ $item->noi_dung_lien_he }}</td>
                                        <td>{{ $item->ten }}</td>
                                        <td>{{ $item->so_dien_thoai }}</td>
                                        <td>{{ $item->lop }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            Đã gửi phản hồi
                                        </td>
                                    </tr>
                                    @endif
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
