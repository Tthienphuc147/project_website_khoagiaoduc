@extends('admin/layout/index')



@section('admin_content')
<div class="main-content">

    <div class="container">
        <h3 class="pb-3">Thêm loại bài viết</h3>
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
                    <form action="quantri/loaibaiviet/them" method="post" enctype="multipart/form-data" class="form-horizontal">
                    {{csrf_field()}}
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tên</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="ten" name="ten" placeholder="Tên loại tin tức" class="form-control" required>

                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="selectLg" class=" form-control-label">Chọn danh mục</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="id_danh_muc_bai_viet" id="id_danh_muc_bai_viet" class="form-control-lg form-control">
                                    @foreach($data as $item)
                                    <option value="{{$item->id}}">{{$item->ten}}</option>
                                    @endforeach;
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Thêm loại bài viết
                            </button>
                            <a href="quantri/loaibaiviet/themview">
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                            </a>
                        </div>

                    </form>
                </div>

            </div>
          </div>
    </div>

</div>


@endsection
