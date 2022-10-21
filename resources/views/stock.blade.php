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
                <div class="card-header">
                    Product Stock
                </div>
                <div class="card-body">
                    <table class="table table-bordered ">
                        <thead>
                            <tr class="bg-primary">
                                <th>#</th>
                                <th class="print_hidden">Image</th>
                                <th>Product</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Buy Price</th>
                                <th>Available Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{++$i}} </td>
                                <td>
                                    @if($product->image)
                                    <img style="width: 50px;" src="{{ $product->image }}" alt="">
                                        @else
                                        <img style="width: 50px;" src="/projectimg/noimage.png" alt="">
                                    @endif
                                </td>
                                <td>{{$product->name}} </td>
                                <td>{{$product->category}} </td>
                                <td>{{$product->price}} </td>
                                <td>{{$product->cost}} </td>
                                <td>{{$product->stock}} </td>
                            </tr>


                            @endforeach
                        </tbody>
                    </table>
                    {!! $products->links() !!}

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection