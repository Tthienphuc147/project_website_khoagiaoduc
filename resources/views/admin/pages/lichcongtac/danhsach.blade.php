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
                                     <h3>Danh sách lịch công tác</h3>
                                </div>

                                <div class="col-md-3">
                                    <button class="btn btn-success pull-right" onclick="showModalAdd()">Thêm mới</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (isset($message))
						<div class="alert alert-danger">
							{{$message}}
						</div>
					@endif
                </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">

                            <table id="table" class="table-style" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar" data-unique-id="id">
                                <thead>
                                    <tr>
                                        <th data-field="id">ID</th>
                                        <th data-field="timestart">Thời gian bắt đầu</th>
                                        <th data-field="timeend">Thời gian kế thúc</th>
                                        <th data-field="option">Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key=>$item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{$item->thoi_gian_bat_dau}}</td>
                                        <td>{{$item->thoi_gian_ket_thuc}}</td>
                                        <td>
                                            <a href="quantri/lichcongtac/chinhsua/{{$item->id}}"><button title="Chỉnh sửa" class="pd-setting-ed" >
                                                <i class="fa fa-pencil-square-o mr-3" aria-hidden="true"></i>
                                            </button>
                                            </a>
                                            <a href="quantri/lichcongtac/xoa/{{$item->id}}">
                                            <button title="Xóa" class="pd-setting-ed">
                                                <i class="fa fa-trash mr-3" aria-hidden="true"></i>
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
