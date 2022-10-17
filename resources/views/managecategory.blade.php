@extends('admin.layouts.app')
@section('css')
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">


@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Categories</h1>
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
                <strong>Data Updated successfully!</strong>
                <button type="button" class="close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card">
                <div class="card-header">
                    Categories
                </div>
                <div class="card-body">
                    <table class="table table-bordered yajra-datatable">
                        <thead>
                            <tr class="bg-primary">
                                <th>ID</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- The Modal -->
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Modal Heading</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form id="formUpdate" enctype="multipart/form-data">
                                <input type="hidden" name="hiddenId" id="hiddenId">
                                <label for="">Image</label>
                                <input type="file" name="file" class="form-control">
                                <label for="">Category</label>
                                <input type="text" class="form-control" name="name" id="name" require><br>

                                <button type="submit" id="updateBtn" class="btn btn-success">
                                    <span id="spinner" style="display: none;" class="spinner-border spinner-border-sm"></span>

                                    Update</button>


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
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#categoryli").addClass('menu-open')
    $("#categoryA").addClass('active');

    $(document).ready(function() {
        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('getCategoryYaj') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },

                {
                    data: 'image',
                    name: 'image'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });
    })




    $('body').on('click', '.myEdit', function() {
        var data = $(this).data('id')
        $("#name").val(data.name)
        $("#hiddenId").val(data.id)
        $("#myModal").modal('show');
    })

    $("#formUpdate").submit(function(e) {
        e.preventDefault();
        $("#updateBtn").prop('disabled', true)
        $("#spinner").show()

        var formData = new FormData(this);
        $.ajax({
            url: "{{ route('categoryUpdate') }}",
            method: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data) {
                    $("#myModal").modal('hide');
                    $("#updateBtn").prop('disabled', false)
                    $("#spinner").hide()
                    var oTable = $('.yajra-datatable').dataTable();
                    oTable.fnDraw(false);
                    $("#alertBox").show();
                }

            }
        })

    })

    $(".close").click(function(){
        $("#alertBox").hide();

    })
</script>


@endsection