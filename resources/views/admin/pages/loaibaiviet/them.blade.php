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
        <h3 class="pb-3">Thêm loại bài viết</h3>
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <strong>Basic Form</strong> Elements
                </div>
                <div class="card-body card-block">
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">Static</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <p class="form-control-static">Username</p>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Text Input</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="text-input" placeholder="Text" class="form-control">
                                <small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="email-input" class=" form-control-label">Email Input</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="email" id="email-input" name="email-input" placeholder="Enter Email" class="form-control">
                                <small class="help-block form-text">Please enter your email</small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="password-input" class=" form-control-label">Password</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="password" id="password-input" name="password-input" placeholder="Password" class="form-control">
                                <small class="help-block form-text">Please enter a complex password</small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="disabled-input" class=" form-control-label">Disabled Input</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="disabled-input" name="disabled-input" placeholder="Disabled" disabled="" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="textarea-input" class=" form-control-label">Textarea</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea name="textarea-input" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">Select</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="select" id="select" class="form-control">
                                    <option value="0">Please select</option>
                                    <option value="1">Option #1</option>
                                    <option value="2">Option #2</option>
                                    <option value="3">Option #3</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="selectLg" class=" form-control-label">Select Large</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="selectLg" id="selectLg" class="form-control-lg form-control">
                                    <option value="0">Please select</option>
                                    <option value="1">Option #1</option>
                                    <option value="2">Option #2</option>
                                    <option value="3">Option #3</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="selectSm" class=" form-control-label">Select Small</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="selectSm" id="SelectLm" class="form-control-sm form-control">
                                    <option value="0">Please select</option>
                                    <option value="1">Option #1</option>
                                    <option value="2">Option #2</option>
                                    <option value="3">Option #3</option>
                                    <option value="4">Option #4</option>
                                    <option value="5">Option #5</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="disabledSelect" class=" form-control-label">Disabled Select</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="disabledSelect" id="disabledSelect" disabled="" class="form-control">
                                    <option value="0">Please select</option>
                                    <option value="1">Option #1</option>
                                    <option value="2">Option #2</option>
                                    <option value="3">Option #3</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="multiple-select" class=" form-control-label">Multiple select</label>
                            </div>
                            <div class="col col-md-9">
                                <select name="multiple-select" id="multiple-select" multiple="" class="form-control">
                                    <option value="1">Option #1</option>
                                    <option value="2">Option #2</option>
                                    <option value="3">Option #3</option>
                                    <option value="4">Option #4</option>
                                    <option value="5">Option #5</option>
                                    <option value="6">Option #6</option>
                                    <option value="7">Option #7</option>
                                    <option value="8">Option #8</option>
                                    <option value="9">Option #9</option>
                                    <option value="10">Option #10</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="file-input" class=" form-control-label">File input</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="file" id="file-input" name="file-input" class="form-control-file">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="file-multiple-input" class=" form-control-label">Multiple File input</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="file" id="file-multiple-input" name="file-multiple-input" multiple="" class="form-control-file">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Reset
                    </button>
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
