@extends('admin/layout/index')



@section('admin_content')

<div class="main-content">

    <div class="container">
        <h3 class="pb-3">Sửa Media</h3>
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
                    <form action="quantri/media/chinhsua/{{$data->id}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    {{csrf_field()}}

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="file-input" class=" form-control-label">Ảnh mô tả</label>
                            </div>

                            <div class="col-12 col-md-9">
                            <div class="col col-md-3">
                                <img src="/public/upload/image/{{$data->url}}">
                            </div>
                                <input type="file" id="file-input" name="img_file" class="form-control-file">

                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="selectLg" class=" form-control-label">Chọn danh mục</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="id_loai_media" id="id_loai_media" class="form-control-lg form-control">
                                    @foreach($loai_media as $item)
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


@endsection

