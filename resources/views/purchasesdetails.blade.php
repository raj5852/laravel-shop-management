@extends('admin.layouts.app')
@section('css')
<style>
    .bordercolor {
        border-left: 4px solid blue;
    }
</style>

@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Details</h1>
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
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Details</th>
                                <th>Qty</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $key=>$dt)
                            <tr>
                                <td>{{$key+=1}} </td>
                                <td>{{$dt->name }} </td>
                                <td>{{$dt->qty }} </td>
                                <td>{{$dt->rate }} </td>
                            </tr>




                            @endforeach

                        </tbody>
                    </table>
                    
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