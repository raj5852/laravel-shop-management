@extends('admin.layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Purchase</h1>
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
                <div class="card-header">
                    Create Purchase
                    <div align="right">
                        <button class="btn btn-success">Add Supplier</button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="row">
                            <div class="col">
                                <label for="">Supplier</label>
                                <input type="text" class="form-control" placeholder="Select Supplier">

                            </div>
                            <div class="col">
                                <label for="">Purchase Date</label>
                                <input type="date" class="form-control" placeholder="">

                            </div>
                        </div>
                        <label for="">Product</label>
                        <div class="col-md-6">
                            <input type="text" placeholder="Write Product" class="form-control">
                        </div>
                        <label for="">Add Qty</label>
                        <div class="col-md-6">
                            <input type="number" placeholder="Add Quantity" class="form-control">
                        </div>
                        <hr>
                        <div class="row">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-primary">
                                        <th style="width:80px">#SL</th>
                                        <th>Product</th>
                                        <th>Rate</th>
                                        <th style="width:320px;">Qty</th>
                                        <th>Sub Total</th>
                                        <th style="width:50px">
                                            <i class="fa fa-trash"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="table_body">



                                </tbody>
                                <tfoot class="bg-light">
                                    <tr>
                                        <td colspan="4"></td>

                                        <td colspan="2">
                                            <strong>Grand Total: <span id="total">0</span> Tk</strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 mt-4">
                                <button type="button" id="payment_btn" class="btn btn-primary mx-auto">
                                    <i class="fa fa-money"></i>
                                    Payment
                                </button>
                            </div>
                        </div>

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
    $("#purchaseli").addClass('menu-open')
    $("#purchaseA").addClass('active');
</script>


@endsection