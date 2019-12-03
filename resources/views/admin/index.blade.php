@extends('admin.master')

@section('content')

<h2>
  Dashboard
  <small>main page</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>

  <div class="row">

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-blue"><i class="fa fa-dollar"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Earning</span>
          <span class="info-box-number">{{  $info['total_earning'] }}<small>$</small></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box bg-blue">

        <span class="info-box-icon"><i class="fa fa-files-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Files</span>
          <span class="info-box-number"> {{ $info['total_files'] }} </span>

          <div class="progress">
            <div class="progress-bar" style="width: 55%"></div>
          </div>
          <span class="progress-description">
            50% Increase in 30 Days
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-blue"><i class="ion ion-ios-people-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">New Members</span>
          <span class="info-box-number">{{ $info['total_users'] }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box bg-blue">
        <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Downloads</span>
          <span class="info-box-number">114,381</span>

          <div class="progress">
            <div class="progress-bar" style="width: 70%"></div>
          </div>
          <span class="progress-description">
            abc
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </div>
    <!-- /.col -->
  
  </div>

  @endsection