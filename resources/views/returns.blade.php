@extends('admin.layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Return List</h1>
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
                        <input type="text" placeholder="Start Date" class="form-control">
                    </div>
                    <div class="col">
                        <input type="text" placeholder="End Date" class="form-control">
                    </div>
                    <div class="col">
                        <input type="text" placeholder="POS Id" class="form-control">
                    </div>
                    <div class="col">
                        <input type="text" placeholder="Select Customer" class="form-control">
                    </div>
                </div>
                <button class="btn btn-success">Filter</button>
                <button class="btn btn-primary">Reset</button>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
            Return List
            </div>
            <div class="card-body">
                <table class="table table-bordered bg-primary">
                    <tr>
                        <th>ID</th>
                        <th>Bill No.</th>
                        <th>Customer</th>
                        <th>Items</th>
                        <th>Sell Date</th>
                        <th>Discount</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>

                </table>
            </div>
        </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
