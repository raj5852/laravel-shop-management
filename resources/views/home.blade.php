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
            <h1 class="m-0">Dashboard</h1>
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
        <div class="row">

          <div class="col-md-3">
            <div class="card bordercolor">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      Today Sales</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$today}} </div>
                  </div>
                  <div class="col-auto">

                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card bordercolor">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      YESTERDAY SALES</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$yesterday}} </div>
                  </div>
                  <div class="col-auto">

                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card bordercolor">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      LAST 7 DAY SALES</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$sevendays}} </div>
                  </div>
                  <div class="col-auto">

                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card bordercolor">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      ALL TIME SALES</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$all}} </div>
                  </div>
                  <div class="col-auto">

                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Purchase -->
          <div class="col-md-3">
            <div class="card bordercolor">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      Today Purchase</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$todayPUR}} </div>
                  </div>
                  <div class="col-auto">

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card bordercolor">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      YESTERDAY PURCHASE</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$yesterdayPUR}} </div>
                  </div>
                  <div class="col-auto">

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card bordercolor">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    LAST 7 DAY PURCHASE</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$sevendaysPUR}} </div>
                  </div>
                  <div class="col-auto">

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card bordercolor">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    ALL TIME PURCHASE</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$allPUR}} </div>
                  </div>
                  <div class="col-auto">

                  </div>
                </div>
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