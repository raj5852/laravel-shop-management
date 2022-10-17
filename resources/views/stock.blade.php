@extends('admin.layouts.app')

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
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Select a Product">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Product Code">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Product Name">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Select Category">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Select Brand">
                        </div>
                    </div>
                    <button class="btn btn-success">Filter</button>
                    <button class="btn btn-primary">Reset</button>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    Product Stock
                </div>
                <div class="card-body">
                    <table class="table table-bordered bg-primary">
                        <thead>
                            <tr class="bg-primary">
                                <th>#</th>
                                <th class="print_hidden">Image</th>
                                <th>Product</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Purchased</th>
                                <th>Sold</th>
                                <th>Damaged</th>
                                <th>Returned</th>
                                <th>Available Stock</th>
                                <th>Sell Value</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection