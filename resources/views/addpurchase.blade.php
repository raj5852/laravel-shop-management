@extends('admin.layouts.app')

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection

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
            <div style="display: none;" id="alestbx" class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Supplier Created Successfull.</strong>
                <button id="alertClose" type="button" class="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            @if(session()->has('success'))
            <div id="alestbxSuccess" class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Product  Purchase Successfull.</strong>
                <button id="alertSuccessClose" type="button" class="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            @endif



            <div class="card">
                <div class="card-header">
                    Create Purchase
                    <div align="right">
                        <button class="btn btn-success" id="addSupplier">Add Supplier</button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="row">
                            <div class="col">
                                <label for="">Supplier</label>
                                <select name="supplier" id="supplier" class="form-control supplier" required>
                                    <option value='0'>- Select A Supplier -</option>
                                </select>

                            </div>
                            <div class="col">
                                <label for="">Purchase Date</label>
                                <input type="date" id="datePicker" class="form-control" placeholder="">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Product</label>
                            <select name="getProduct" id="getProduct" class="form-control getProduct" required>
                                <option value='0'>- Select A Product -</option>
                            </select>
                        </div>
                        <label for="">Add Qty</label>
                        <div class="col-md-6">
                            <input type="number" id="quant" placeholder="Add Quantity" class="form-control">
                        </div><br>
                        <button class="btn btn-success" type="button" id="addProduct">Add</button>
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
                                            <input type="hidden" id="totalValue">
                                            <strong>Grand Total: <span id="total"></span> Tk</strong>
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
            <!-- The Modal -->
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Supplier Details</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form id="supplierForm">
                                <label for="">Name</label>
                                <input type="text" name="name" placeholder="Name" class="form-control" required>
                                <label for="">Email</label>
                                <input type="email" name="email" placeholder="Email" class="form-control" required>
                                <label for="">Address</label>
                                <input type="text" name="address" placeholder="Address" class="form-control" required>
                                <label for="">Phone</label>
                                <input type="number" name="phone" placeholder="Phone" class="form-control" required>
                                <br>
                                <button type="submit" class="btn btn-success">Create</button>


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

<script>
    $("#purchaseli").addClass('menu-open')
    $("#purchaseA").addClass('active');

    $("#addSupplier").click(function() {
        $("#myModal").modal('show');
    })
    document.getElementById('datePicker').valueAsDate = new Date();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#addProduct").click(function() {

        var productId = $("#getProduct").val();
        var qunt = $("#quant").val();
        var supplier = $("#supplier").val();
        var datePicker = $("#datePicker").val();


        if (productId == 0) {
            alert("Please Add Product!");

        } else if (qunt == 0) {
            alert("Please Add Quantity")
        } else if (supplier == 0) {
            alert("Please Add Supplier!");
        } else {
            $.ajax({
                url: '{{ route("selectproduct") }}',
                method: 'post',
                data: {
                    id: productId,
                    qunt: qunt,
                    supplier: supplier,
                    datePicker: datePicker
                },
                success: function(data) {

                    $("#getProduct").val('');
                    getSelectData()
                }
            })
        }

    })

    function getSelectData() {
        $.ajax({
            url: '/get-selectproduct',
            method: 'post',
            success: function(data) {
                console.log(data)
                var getData = data
                var total = 0
                var arr = getData.map(myfunction)

                document.getElementById("table_body").innerHTML = arr

                function myfunction(num, index) {
                    total += Number(num.total)
                    return '<tr><td>' + (index + 1) + '</td><td>' + num.name + '</td><td>' + num.rate + '</td><td>' + num.qty + '</td> <td>' + num.total + '</td><td><button class="btn btn-danger btn-sm" type="button" onclick="myDelete(' + num.id + ')">Delete</button></td></tr>';
                }

                document.getElementById('total').innerHTML = total
                $("#totalValue").val(total)
            }
        })
    }
    getSelectData();

    function myDelete(id) {
        var text = "Are you sure?"
        if (confirm(text) == true) {
            $.ajax({
                url: '/delteSelectval',
                method: 'post',
                data: {
                    id: id
                },
                success: function(data) {
                    getSelectData();
                }
            })
        }
    }



    $("#alertClose").click(function() {
        $("#alestbx").hide();
    })

    $("#alertSuccessClose").click(function() {
        $("#alestbxSuccess").hide();
    })
    $("#supplierForm").submit(function(e) {
        e.preventDefault();
        var formdata = new FormData(this)

        $.ajax({
            url: '/supplier-create',
            method: 'post',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data) {
                    $("#myModal").modal('hide');
                    $("#alestbx").show();

                }
            }
        })


    })

    $("#payment_btn").click(function() {
        var supplier = $("#supplier").val()
        var total = $("#totalValue").val()


        if (supplier == 0) {
            alert("PLease Add Supplier.")
        } else {
            location.replace("/paymeny-create?supplier=" + supplier + "&total=" + total + "")

        }


    })

    $('.supplier').select2({
        placeholder: 'Select a Supplier',
        ajax: {
            url: '{{ route("getSupplier") }}',
            dataType: 'json',
            delay: 50,
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
    $('.getProduct').select2({
        placeholder: 'Select a Supplier',
        ajax: {
            url: '{{ route("getproduct") }}',
            dataType: 'json',
            delay: 50,
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });
</script>


@endsection