@extends('user.master')

@section('content')

  <h2>
    Dashboard
    <small>main page</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>

@if($errors->any())
<h4> {{ $errors->first() }} </h4>
@endif

<div class="container">
  <form method="POST" action="{{ route('processFile') }}" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file_name">
    <button type="submit" class="btn btn-default">Upload to Cloud</button>
  </form>
</div>


@endsection