@extends('user.master')

@section('content')
  

@if($errors->any())
<h4> {{ $errors->first() }} </h4>
@endif


@endsection