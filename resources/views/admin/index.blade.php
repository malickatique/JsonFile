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

@endsection