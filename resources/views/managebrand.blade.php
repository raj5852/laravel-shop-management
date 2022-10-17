@extends('admin.layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Brands</h1>
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
            @if(session()->has('success'))
            <div id="alertBox"  class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('success')}}</strong>
                <button type="button" class="close" onclick="closealert()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            @endif

            <div class="card">
                <div class="card-header">
                    Brands
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-primary">
                                <th>ID</th>
                                <th>Brand</th>
                                <th>Description</th>
                                <th>Logo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($brands as $brand)
                            <tr>
                                <td> {{ ++$i }} </td>
                                <td> {{$brand->name}} </td>
                                <td> {{$brand->description}} </td>
                                <td>
                                    @if($brand->img)
                                    <img style="width: 40px;" src="{{ asset('/') }}{{$brand->img}}" alt="">

                                    @else
                                    <img style="width: 40px;" src="{{ asset('projectimg/noimage.png') }}" alt="">

                                    @endif

                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm" onclick="Edit({{ $brand }})">Edit</button>
                                    <a class="btn btn-danger btn-sm" href="brand-delete/{{ $brand->id }}" class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>


                            @endforeach
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
                            <h4 class="modal-title">Edit Brand</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="{{ route('brandUpdate') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input name="hiddenId" type="hidden" id="hiddenId">
                                <label for="">Brand Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Brand Nmae" id="name" required>

                                <label for="">Brand Description</label>
                                <textarea name="description" id="description" class="form-control" placeholder="Enter Brand Description" required></textarea>

                                <label for="">Brand File</label>
                                <input type="file" name="file" class="form-control" name="file"><br>
                                <input type="submit" value="Update" class="btn btn-success">


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
<script>
    $("#brandli").addClass('menu-open')
    $("#brandA").addClass('active');

    function closealert() {
        $("#alertBox").hide();
    }
    function deleteItem(id){
        var text = "Are You Sure?"
        if(confirm(text)==true){
            console.log('ok')
        }else{
            console.log('not ok')

        }
    }

    function Edit(brand) {
        $("#myModal").modal('show')
        $("#hiddenId").val(brand.id);
        $("#name").val(brand.name)
        $("#description").val(brand.description)

        // console.log(id)
    }
</script>


@endsection