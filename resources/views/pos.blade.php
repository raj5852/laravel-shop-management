@extends('admin.layouts.app')
@section('css')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
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
                    <h1 class="m-0">POS Manage</h1>
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
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>{{session()->get('success')}} </strong>
            </div>

            @endif
            <div style="display: none;" id="alerBox" class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Order successfully!</strong>
                <button type="button" class="close" id="alertShow">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="card col" style="margin-right: 5px;">

                    <div class="card-body p-2">
                        <input type="date" id="datepicker" class="form-control">
                        <div class="d-flex mt-1">
                            <!-- <input type="text" placeholder="Customer" class="form-control"> -->
                            <select id="customerName" name="itemName" class="form-control itemName">
                                <option value='0'>- Select A Customer -</option>
                            </select>
                            <button class="btn btn-primary" id="addCustomer">Add</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered mt-3 ">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Sub T</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="Addcollection">

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <input type="hidden" id="totalinputvalue">
                                        <td align="right" colspan="4">Total</td>
                                        <td colspan="2" id="totalValue">0</td>
                                    </tr>
                                </tfoot>

                            </table>
                            <button id="payment_now" class="btn btn-success">Payment Now</button>
                        </div>

                    </div>
                </div>
                <div class="card col">

                    <div class="card-body">
                        <table class="table table-bordered yajra-datatable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>

                    </div>
                </div>
            </div>



            <!-- The Modal -->
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Add Customer</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form method="post" action="/addCustomerPost">
                                @csrf
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Name" required>

                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" required>

                                <label for="">Phone</label>
                                <input type="number" name="phone" class="form-control" placeholder="Phone" required>

                                <label for="">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Phone" required>
                                <br>
                                <button type="submit" class="btn btn-success btn-sm">Add</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script type='text/javascript'>
    $(document).on('change', '#numberChange', function() {
        console.log($("#numberChange").val())
    })
    document.getElementById('datepicker').valueAsDate = new Date();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.itemName').select2({
        placeholder: 'Select a customer',
        ajax: {
            url: '/get-customer',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.name,
                            id: item.name
                        }
                    })
                };
            },
            cache: true
        }
    });

    $("#addCustomer").click(function() {
        $("#myModal").modal('show');
    })

    $(document).ready(function() {
        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('getProductajax') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },

                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'image',
                    name: 'image'
                },
                {
                    data: 'price',
                    name: 'price'
                },

                {
                    data: 'stock',
                    name: 'stock'
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
    $("body").on('click', '.myAdd', function() {
        var data = $(this).data('id')
        $.ajax({
            url: '/posSelct',
            method: 'post',
            data: {
                id: data
            },
            success: function(data) {

                if (data.selected) {
                    alert(data.selected)

                }
                if (data.stock) {
                    alert(data.stock)

                }
                if (data.success) {
                    getData()
                }
            }
        })
    })

    function getData() {
        $.ajax({
            url: 'posSelctget',
            method: 'post',
            success: function(data) {

                if (data.length > 0) {
                    console.log(data);
                    var mydata = data
                    var total = 0;

                    var newdata = mydata.map(myFunction);

                    function myFunction(num, key) {
                        total += Number(num.subt)

                        return "<tr><td>" + (key += 1) + "</td><td>" + num.name + "</td><td><input min='1' id='mychange" + num.id + "' type='number' data-id=" + num.id + "  class='form-control inputChange' value=" + num.qnt + "></td><td>" + num.price + "</td><td>" + num.subt + "</td><td><button data-id=" + num.id + " class='btn btn-danger btn-sm myDelete'>Delete</button></td></tr>"
                    }


                    document.getElementById("Addcollection").innerHTML = newdata;
                    document.getElementById("totalValue").innerHTML = total;
                    $("#totalinputvalue").val(total)
                    //  console.log(total)
                }
            }
        })
    }
    getData();

    $(document).on('change', '.inputChange', function() {
        var id = $(this).data('id');
        var val = $("#mychange" + id + "").val();




        if (!val) {
            alert('input value is required')
        } else {
            $.ajax({
                url: '/inputUpdate',
                method: 'post',
                data: {
                    id: id,
                    val: val
                },
                success: function(data) {
                    if (data) {
                        getData();
                    }
                }
            })
        }

    })

    $(document).on('click', '.myDelete', function() {

        var id = $(this).data('id')
        $.ajax({
            url: '/inputDataDelete',
            method: 'post',
            data: {
                id: id
            },
            success: function(data) {

                if (data) {

                    window.location.href = "/pos";

                }


            }
        })
    })
    $("#payment_now").click(function() {
        var customer = $("#customerName").val()
        var totalinputvalue = $("#totalinputvalue").val()

        if (customer == 0) {
            alert("Please Select A Customer")
        } else {
            $.ajax({
                url: '/customer-payment',
                method: "post",
                data: {
                    name: customer,
                    total: totalinputvalue
                },
                success: function(data) {
                    if (data) {
                        // console.log('success')
                        if (data) {
                            $("#alerBox").show()
                             window.location.href = "/pos";
                            console.log(data)

                        }
                    }

                }
            })
        }

    })
    $("#alertShow").click(function() {
        // console.log('dd')
        $("#alerBox").hide()
    })
</script>
@endsection
