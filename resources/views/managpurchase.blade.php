@extends('admin.layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Purchases</h1>
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
                    <div class="row">
                        <div class="col">
                            <input type="text" placeholder="Bill Number" class="form-control">
                        </div>
                        <div class="col">
                            <input type="text" placeholder="Start Date" class="form-control">
                        </div>
                        <div class="col">
                            <input type="text" placeholder="End Date" class="form-control">
                        </div>
                        <div class="col">
                            <input type="text" placeholder="End Date" class="form-control">
                        </div>
                        <div class="col">
                            <input type="text" placeholder="Select Produt" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Purchases
                </div>
                <div class="card-body">
                    <table class="table table-bordered bg-primary">
                        <thead>
                            <tr class="bg-primary">
                                <th>#</th>
                                <th>Bill No.</th>
                                <th>Supplier</th>
                                <th>Purchase Date</th>
                                <th>Items</th>
                                <th>Payable</th>
                                <th>Paid</th>
                                <th>Due</th>
                                <th class="print_hidden">Actions</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <tr class="bg-dark">
                                <th colspan="5"></th>
                                <th>
                                    <strong>17,423,000.00
                                        Tk</strong>
                                </th>
                                <th>
                                    <strong>17,417,000.00 Tk</strong>
                                </th>
                                <th>
                                    <strong>6,000.00 Tk</strong>
                                </th>

                                <th colspan="2"></th>

                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection