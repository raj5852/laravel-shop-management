@extends('admin.layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">New Category</h1>
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

        
        <div id="alertBx" style="display: none;" class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong >Category Created Successfully!</strong>
                <button type="button" class="close" onclick="closeBtn()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

       

            


            <div class="card">
                <div class="card-header">
                    New Category

                </div>
                <div class="card-body">
                    <form id="addCategoryForm" enctype="multipart/form-data">
                        <div class="col-md-6">
                            <label for="">Category Name <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" placeholder="Enter Category Name" name="name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="">Cateogyr Image </label>
                            <input type="file" name="file" class="form-control">
                        </div><br>
                        <button id="saveBtn" class="btn btn-primary" type="submit">
                            <span id="spinnerBorder" class="spinner-border spinner-border-sm" style="display: none;"></span>
                            Save Category</button>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
@section('js')
<script>
    $("#categoryli").addClass('menu-open')
    $("#categoryA").addClass('active');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function closeBtn(){
        $("#alertBx").hide();
    }

    $("#addCategoryForm").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $("#saveBtn").prop('disabled', true);
        $("#spinnerBorder").show();
        $.ajax({
            url: "create-categorypost",
            method: 'POST',
            contentType: false,
            processData: false,
            data: formData,
            success: (data) => {
                // this.reset();
                if (data) {
                    $("#saveBtn").prop('disabled', false);
                    $("#spinnerBorder").hide();
                    $("#alertBx").show();
                    this.reset();

                }
            }
        })
    })
</script>


@endsection