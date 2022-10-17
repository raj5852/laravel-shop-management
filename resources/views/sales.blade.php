@extends('admin.layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sales</h1>
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
            <table class="table table-bordered top-summary">
                <tbody>
                    <tr>
                        <td class="bg-danger">Sold Today:</td>
                        <td class="bg-success">16500 Tk</td>
                        <td class="bg-warning">Today Received:</td>
                        <td class="bg-success">16500 Tk</td>
                        <td class="bg-danger">Today Profit:</td>
                        <td class="bg-success">3,300 Tk</td>
                        <td class="bg-warning">Total Sold:</td>
                        <td class="bg-success">16500.00 Tk</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <div class="card">
                <div class="card-body ">
                    <div class="row mb-2">
                        <div class="col-md">
                            <input type="text" class="form-control" placeholder="Bill Number">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Start Date">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="End Date">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Select Customer">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Select Product">
                        </div>

                    </div>
                    <button class="btn btn-success">Filter</button>
                    <button class="btn btn-primary">Reset</button>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                Sales
                </div>
                <div class="card-body">
                    <table class="table table-bordered bg-primary">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Invoice No.	</th>
                                <th>Customer</th>
                                <th>Items</th>
                                <th>Date</th>
                                <th>Discount</th>
                                <th>Receivable</th>
                                <th>Paid</th>
                                <th>Product Returned</th>
                                <th>Due</th>
                                <th>Purchase Cost</th>
                                <th>Profit</th>
                                <th>Status</th>
                                <th>Action</th>
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