@extends('admin/layout/index')



@section('admin_content')

<div class="main-content">

    <div class="container">
        <h3 class="pb-3">Thêm bài viết</h3>
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
                    <form action="quantri/baiviet/them" method="post" enctype="multipart/form-data" class="form-horizontal">
                    {{csrf_field()}}
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tiêu đề</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="input" id="tuan" name="tieu_de"  class="form-control" placeholder="Tiêu đề" required>

                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tóm tắt</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="input" id="tuan" name="tom_tat"  class="form-control" placeholder="Tóm tắt" required>

                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="file-input" class=" form-control-label">Ảnh mô tả</label>
                            </div>

                            <div class="col-12 col-md-9">

                                <input type="file" id="file-input" name="img_file" class="form-control-file" >

                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">Nổi bật</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="noi_bat" id="select" class="form-control">
                                    <option value="1">Có</option>
                                    <option value="0">Không</option>

                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">Loại Bài Viết</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="loai_bai_viet" id="select" class="form-control">
                                    @foreach($data as $item)
                                    <option value="{{$item->id}}">{{$item->ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nội dung</label>
                            </div>
                            <div class="col-12 col-md-9">
                            <textarea type="input"  name="noi_dung" id="demo"  class="form-control" required ></textarea>

                            </div>
                        </div>
                        <script>
                CKEDITOR.replace('demo', {
                    language: 'vi',
                    filebrowserBrowseUrl: '../../public/ckfinder/ckfinder.html',
                    filebrowserImageBrowseUrl: '../../public/ckfinder/ckfinder.html?type=Images',
                    filebrowserFlashBrowseUrl: '../../public/ckfinder/ckfinder.html?type=Flash',
                    filebrowserUploadUrl: '../../public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                    filebrowserImageUploadUrl: '../../public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                    filebrowserFlashUploadUrl: '../../public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                });
                </script>


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

