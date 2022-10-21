@extends('admin.layouts.app')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />


@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Starter Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6"></div>
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div style="display: none;" id="alertBOx" class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Category created successfully!</strong>
                <button type="button" class="close" id="closeBtn">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div style="display: none;" id="alertBOxBrand" class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Brand created successfully!</strong>
                <button type="button" class="close" id="closeBtnBrand">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div style="display: none;" id="alertBOx" class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Category created successfully!</strong>
                <button type="button" class="close" id="closeBtn">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if(session()->has('success'))
        
            <div id="alertBOxP" class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Product created successfully!</strong>
                <button type="button" class="close" id="closeBtnP">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    New Product
                </div>
                <div class="card-body">
                    <form action="{{ route('productCreate') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-6">
                            <label for="">Product Name <span class="text-danger">*</span> </label>
                            <input name="name" type="text" placeholder="Enter Product Name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for=""> Product Code</label>
                            <input name="code" type="text" placeholder="Enter Product Code" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for=""> Category<span class="text-danger">*</span></label>

                            <div class="d-flex">
                                <select name="category" class="form-control itemName" required>
                                    <option value='0'>- Select A Category -</option>
                                </select>
                                <button type="button" class="ml-2 btn btn-primary btn-sm" id="addProduct">Add Category </button>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <label for=""> Brand<span class="text-danger">*</span> </label>

                            <div class="d-flex">
                                <select name="brand" class="form-control brandName">
                                    <option value='0'>- Select A Brand -</option>
                                </select>
                                <button type="button" class="ml-2 btn btn-primary btn-sm" id="addBrand">Add Brand </button>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <label for=""> Main Unit</label>

                            <select name="mainunit" name="main_unit_id" id="" class="form-control main_unit">
                                <option value="pc">pc</option>
                                <option value="Dozen">Dozen</option>
                                <option value="gm">gm</option>
                                <option value="Kg">Kg</option>
                                <option value="ml">ml</option>
                                <option value="Litre">Litre</option>
                            </select>

                        </div>
                        <div class="col-md-6">
                            <label for=""> Sale Price<span class="text-danger">*</label>

                            <input name="saleprice" type="number" placeholder="Sale Price" class="form-control" required>

                        </div>
                        <div class="col-md-6">
                            <label for=""> Buy Cost <span class="text-danger">*</span> </label>

                            <input name="buycost" type="number" placeholder="Purchase Cost" class="form-control" required>

                        </div>
                        
                        <div class="col-md-6">
                            <label for="">Product Details</label>
                            <textarea name="details" class="form-control" id="" placeholder="Details" cols="30" rows="10"></textarea>

                        </div>
                        <div class="col-md-6">
                            <label for="">Product Image</label>
                            <input name="file" type="file" class="form-control">
                        </div><br>
                        <input type="submit" value="save" class="btn btn-primary">

                    </form>
                </div>
            </div>


            <!-- The Modal -->
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Create Category</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form id="categoryForm">
                                <label for="">Category Name</label>
                                <input type="text" class="form-control" placeholder="Name" id="name" required><br>
                                <button class="btn btn-success" id="createBtn" type="submit">
                                    <span id="spinner" style="display: none;" class="spinner-border spinner-border-sm"></span>
                                    Create</button>
                            </form>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>
            <!-- The Modal -->
            <div class="modal" id="myModalBrand">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Create Brand</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form id="categoryFormBrand">
                                <label for="">Brand Name</label>
                                <input type="text" class="form-control" placeholder="Name" id="brandname" required><br>
                                <button class="btn btn-success" id="createBtnBrand" type="submit">
                                    <span id="spinnerBrand" style="display: none;" class="spinner-border spinner-border-sm"></span>
                                    Create</button>
                            </form>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js">
</script>
<script>
    $("#productli").addClass('menu-open')
    $("#productA").addClass('active');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.itemName').select2({
        placeholder: 'Select a Category',
        ajax: {
            url: '/get-categoryAjax',
            dataType: 'json',
            delay: 50,
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.name,
                            id: item.name
                        }
                    })
                };
            },
            cache: true
        }
    });
    $('.brandName').select2({
        placeholder: 'Select a Brand',
        ajax: {
            url: '/get-brandAjax',
            dataType: 'json',
            delay: 50,
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.name,
                            id: item.name
                        }
                    })
                };
            },
            cache: true
        }
    });
    $("#addProduct").click(function() {
        $("#myModal").modal('show')
    });

    $("#addBrand").click(function() {
        $("#myModalBrand").modal('show')
    })

    $("#categoryForm").submit(function(e) {
        e.preventDefault();
        var name = $("#name").val()
        $("#spinner").show();
        $("#createBtn").prop('disabled', true);
        $.ajax({
            url: '/create-categorypost',
            method: 'post',
            data: {
                name: name
            },
            success: function(data) {
                if (data) {
                    $("#alertBOx").show()
                    $("#myModal").modal('hide');

                }
            }
        })

    })

    $("#categoryFormBrand").submit(function(e) {
        e.preventDefault();
        var name = $("#brandname").val()
        $("#spinnerBrand").show();
        $("#createBtnBrand").prop('disabled', true);

        $.ajax({
            url: '/create-categorypostBrand',
            method: 'post',
            data: {
                name: name
            },
            success: function(data) {
                if (data) {
                    $("#alertBOxBrand").show()
                    $("#myModalBrand").modal('hide');

                }
            }
        })

    })

    $("#closeBtn").click(function() {
        $("#alertBOx").hide()
    })
    $("#closeBtnP").click(function() {
        $("#alertBOxP").hide()
    })
    $("#closeBtnBrand").click(function() {
        $("#alertBOxBrand").hide()
    })
</script>
@endsection