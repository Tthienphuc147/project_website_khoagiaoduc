@extends('admin/layout/index')



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
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h3 class="pb-3">Update slide</h3>
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <strong>Slide</strong>
                </div>
                <div class="card-body card-block">
                    <form action="quantri/slides/chinhsua/{{$id}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    {{csrf_field()}}
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tên slide (*)</label>
                                <small class="form-text text-muted">(*) là bắt buộc</small>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="ten" name="ten" placeholder="{{$data->ten}}" value="{{$data->ten}}" class="form-control" required/>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Link slide</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="link" name="link" placeholder="{{$data->link}}" value ="{{$data->link}}" class="form-control"/>
                                <small class="form-text text-muted">Link khi click chọn vào slide này</small>
                            </div>
                        </div>
                        <td><img src="/public/upload/slide/{{$data->url_image}}" width="300"/>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Upload ảnh (*)</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="file" id="image" name="image" class="form-control" required/>
                                <small class="form-text text-muted">Click để upload file</small>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
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

