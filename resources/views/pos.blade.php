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
                    <h1 class="m-0">POS Manage</h1>
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
            <div class="row">
                <div class="card col" style="margin-right: 5px;">

                    <div class="card-body p-2">
                        <input type="date" id="datepicker" class="form-control">
                        <div class="d-flex mt-1">
                            <!-- <input type="text" placeholder="Customer" class="form-control"> -->
                            <select name="itemName" class="form-control itemName">
                                <option value='0'>- Select A Customer -</option>
                            </select>
                            <button class="btn btn-primary">Add</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered mt-3 ">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Sub T</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Ambrox AmbroxAmbr oxAmbroxsassa</td>
                                        <td>2</td>
                                        <td>20002212</td>
                                        <td>3323</td>
                                        <td>delete dsdsd weqwe</td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
                <div class="card col">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maiores eaque voluptates dignissimos, recusandae quos unde voluptatibus ratione aspernatur necessitatibus suscipit ad impedit voluptas dolorum iure quidem, incidunt tempore libero repellat?
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type='text/javascript'>
    document.getElementById('datepicker').valueAsDate = new Date();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.itemName').select2({
        placeholder: 'Select a customer',
        ajax: {
            url: '/get-categoryAjax',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });
</script>
@endsection