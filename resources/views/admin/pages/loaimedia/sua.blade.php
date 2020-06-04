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
        @if ( Session::has('error') )
        <div class="alert alert-danger alert-dismissible" role="alert">
            <strong>{{ Session::get('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>
        @endif
        <h3 class="pb-3">Chỉnh sửa danh mục media</h3>
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <strong>Danh mục media/strong>
                </div>
                <div class="card-body card-block">
                    <form action="quantri/loaimedia/chinhsua/{{$id}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    {{csrf_field()}}
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">ID</label>
                            </div>
                            <div class="col-12 col-md-9">
                            <label class=" form-control-label">{{$id}}</label>
                            </div>


                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tên danh mục media</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="ten" name="ten" placeholder="{{$ten}}" valuer="{{$ten}}" class="form-control" required/>
                                <small class="form-text text-muted">Tên danh mục media</small>
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

