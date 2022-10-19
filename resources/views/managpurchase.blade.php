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
                <div class="card-header">
                    Purchases
                </div>
                <div class="card-body">
                    <table class="table table-bordered ">
                        <thead>
                            <tr class="bg-primary">
                                <th>#</th>
                                <th>Bill No.</th>
                                <th>Supplier</th>
                                <th>Purchase Date</th>
                               
                                <th>Payable</th>
                                
                                <th class="print_hidden">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($purchase as $mnsps)
                           <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{$mnsps->billno}} </td>
                            <td>{{$mnsps->name}} </td>
                            <td>{{$mnsps->date}} </td>
                            <td>{{$mnsps->payable}} </td>
                            <td><a href="purchases-details?id={{ $mnsps->id }}" class="btn btn-success">View Details</a> </td>
                           </tr>



                           @endforeach
                        </tbody>
                        
                    </table>
                    {!! $purchase->links() !!}
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
    $("#purchaseA").addClass('active')
</script>


@endsection