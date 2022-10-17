@extends('admin.layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">New Brand</h1>

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
            <div style="display: none;" id="alertBox" class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Data created Successfully!</strong>
                <button type="button" class="close" onclick="alertBtn()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card">
                <div class="card-header">
                    New Brand
                </div>

                <div class="card-body">
                    <form id="upload-image-form" enctype="multipart/form-data" method="POST">
                        <div class="row">
                            <div class="col">
                                <label for="">Brand Name <b>*</b> </label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Brand Name" required>
                            </div>
                            <div class="col">
                                <label for="">Brand Description <b>*</b></label>
                                <textarea name="description" id="" class="form-control" placeholder="Enter Brand Description" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <label for="">Brand Image </label>

                            <input type="file" name="file" class="form-control " >
                        </div><br>
                        <button class="btn btn-primary" type="submit" id="addbrand">
                            <span id="spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Save Brand</button>
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
    $("#brandli").addClass('menu-open')
    $("#brandA").addClass('active');
    function alertBtn(){
        $("#alertBox").hide();
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#spinner").hide();

    $('#upload-image-form').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        //    $('#image-input-error').text('');
        $("#addbrand").prop('disabled', true);
        $("#spinner").show();
        $.ajax({
            method: 'post',
            url: "{{ route('addbrand') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: (response) => {
                if (response) {
                    // console.log(response)
                    this.reset();
                    $("#addbrand").prop('disabled', false);
                    $("#spinner").hide();
                    $("#alertBox").show();
                    // alert('Image has been uploaded successfully');
                }
            },
            error: function(response) {
                console.log(response);
                $('#image-input-error').text(response.responseJSON.errors.file);
            }
        });
    });
</script>

@endsection