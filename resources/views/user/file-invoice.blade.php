@extends('user.master')
@section('content')

<h2>
    Dashboard
    <small>File Details</small>
</h2>
<ol class="breadcrumb">
    <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">file info</li>
</ol>

<div class="box box-success">
    <div class="box-header">
        <h3 class="box-title text-uppercase"> File Details </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="form-group">
            <label>  </label><br>
            <img src="{{ asset('img/json.png') }}" width="200px" height="200px" class="img-thumbnail" alt="">
            <br>
            <small> {{ $data['file']->file_name }} </small>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>File Name: </label>
                <h4> {{ $data['file']->file_name }} </h4>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>File Size: </label>
                <h4> {{ $data['file']->file_size }} </h4>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Processing Cost: </label>
                <h4> {{ $data['file']->cost }} $ </h4>
            </div>
        </div>

    </div>
</div>

<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title text-uppercase">Payment Info</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <div class="col-md-4">
            <div class="form-group">
                <label>Cardholder Name: </label>
                <h4> {{ $data['payment']->name_on_card }} </h4>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Paid On: </label>
                <h4> {{ $data['payment']->created_at->format('d/m/Y') }} </h4>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Address: </label>
                <h4> {{ $data['payment']->address }} </h4>
            </div>
        </div>
    </div>
</div>

@endsection