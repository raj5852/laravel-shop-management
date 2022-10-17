@extends('admin.layouts.app')
@section('css')

<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Products</h1>
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
          Products
        </div>
        <div class="card-body">
          <table class="table table-bordered yajra-datatable">
            <thead>
              <tr class="bg-primary">
                <th class="text-center">#</th>
                <th class="text-center">Image</th>
                <th>Code</th>
                <th>Name</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Cost</th>
                <th class="text-center">#</th>
              </tr>
            </thead>
            <tbody>

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
              <h4 class="modal-title">Modal Heading</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <form action="{{ route('productCreate') }}" id="updateProductTable" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="hiddenId" id="hiddenId">

                <div class="col-md-12">
                  <label for="">Product Name <span class="text-danger">*</span> </label>
                  <input name="name" id="name" type="text" placeholder="Enter Product Name" class="form-control" required>
                </div>
                <div class="col-md-12">
                  <label for=""> Product Code</label>
                  <input name="code" id="code" type="text" placeholder="Enter Product Code" class="form-control">
                </div>


                <div class="col-md-12">
                  <label for=""> Main Unit</label>

                  <select name="mainunit" name="main_unit_id" id="mainunit" class="form-control main_unit">
                    <option value="pc">pc</option>
                    <option value="Dozen">Dozen</option>
                    <option value="gm">gm</option>
                    <option value="Kg">Kg</option>
                    <option value="ml">ml</option>
                    <option value="Litre">Litre</option>
                  </select>

                </div>
                <div class="col-md-12">
                  <label for=""> Sale Price<span class="text-danger">*</label>

                  <input name="saleprice" id="saleprice" type="number" placeholder="Sale Price" class="form-control" required>

                </div>
                <div class="col-md-12">
                  <label for=""> Buy Cost <span class="text-danger">*</span> </label>

                  <input name="buycost" id="cost" type="number" placeholder="Purchase Cost" class="form-control" required>

                </div>

                <div class="col-md-12">
                  <label for="">Product Details</label>
                  <textarea name="details" id="details" class="form-control" id="" placeholder="Details" cols="30" rows="10"></textarea>

                </div>
                <div class="col-md-12">
                  <label for="">Product Image</label>
                  <input name="file" id="file" type="file" class="form-control">
                </div><br>
                <input type="submit" value="Update" class="btn btn-primary">

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
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $("#productli").addClass('menu-open')
  $("#productA").addClass('active');
  $("#brand").prop('disabled', true)
  $("#category").prop('disabled', true)

  $(document).ready(function() {
    var table = $('.yajra-datatable').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('getProductDetails') }}",
      columns: [{
          data: 'DT_RowIndex',
          name: 'DT_RowIndex'
        },

        {
          data: 'image',
          name: 'image'
        },
        {
          data: 'code',
          name: 'code'
        },
        {
          data: 'name',
          name: 'name'
        },

        {
          data: 'category',
          name: 'category'
        },

        {
          data: 'brand',
          name: 'brand'
        },
        {
          data: 'price',
          name: 'price'
        },
        {
          data: 'cost',
          name: 'cost'
        },
        {
          data: 'action',
          name: 'action',
          orderable: true,
          searchable: true
        },
      ]
    });
  })

  $("body").on('click', '.ViewBtn', function(e) {
    var data = $(this).data('id');

  })

  $("body").on('click', '.myEdit', function(e) {
    var data = $(this).data('id');
    $("#myModal").modal('show')
    $.ajax({
      url: '{{ route("getProductIdData") }}',
      method: 'post',
      data: {
        id: data
      },
      success: function(datas) {
        if (datas) {
          $("#name").val(datas.name)
          $("#code").val(datas.code)
          $("#category").val(datas.category)
          $("#brand").val(datas.brand)
          $("#mainunit").val(datas.unit)
          $("#saleprice").val(datas.price)
          $("#cost").val(datas.cost)
          $("#details").val(datas.details)
          $("#hiddenId").val(datas.id);

        }

      }
    })

  })

  $("#updateProductTable").submit(function(e) {
    e.preventDefault();

    var formData = new FormData(this)
    $.ajax({
      url: '/productUpdate',
      method: 'post',
      data: formData,
      contentType: false,
      processData: false,
      success: function(dat) {
        // console.log(dat)
        if (dat) {
          $("#myModal").modal('hide')
          var oTable = $('.yajra-datatable').dataTable();
          oTable.fnDraw(false);
        }
      }
    })


  })

  $("body").on('click', '.Mydelete', function() {
    var id = $(this).data('id')
    var text = "Are you sure?"
    if (confirm(text) == true) {
      $.ajax({
        url: '/product-delete',
        method: 'post',
        data: {
          id: id
        },
        success: function(data) {
          if (data) {

            var oTable = $('.yajra-datatable').dataTable();
            oTable.fnDraw(false);
          }
        }

      })
    } else {
      console.log('fail')

    }
  })
</script>

@endsection