@extends('admin/layout/index')



@section('admin_content')
<div class="main-content">
    <div class="container">

        <h3 class="pb-3">Thêm văn bản mới</h3>
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
                    <form action="quantri/vanban/them" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{csrf_field()}}
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Tên</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="input" id="ten" name="ten"  class="form-control" placeholder="Tên"  required>

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="file-input" class=" form-control-label">File</label>
                                </div>

                                <div class="col-12 col-md-9">

                                    <input type="file" id="file-doc-input" name="doc_file" class="form-control-file" required>

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">Loại văn bản</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="loai_van_ban" id="select" class="form-control">
                                        @foreach($data as $item)
                                        <option value="{{$item->id}}">{{$item->ten}}</option>
                                        @endforeach
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

