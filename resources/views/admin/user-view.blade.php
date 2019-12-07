@extends('admin.master')
@section('content')

<h2>
    Dashboard
    <small>User Details</small>
</h2>
<ol class="breadcrumb">
    <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">user info</li>
</ol>

<div class="col-md-2"></div>

<div class="col-md-8" style="font-size: 20px;">
    <!-- Widget: user widget style 1 -->
    <div class="box box-widget widget-user-2">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-yellow">
            <div class="widget-user-image">
                @if( $data['user']->imageurl != null )
                <img src="{{ asset('img/profile_pic/'.$data['user']->imageurl )}}" style="width: 65px; height: 65px;" class="img-circle" alt="">
                @else
                <img src="{{ asset('img/profile_pic/user.png') }}" style="width: 65px; height: 65px;" class="img-circle" alt="">
                @endif
            </div>
            <!-- /.widget-user-image -->
            <h3 class="widget-user-username">{{ $data['user']->name }} 
                <span>  
                    @if( $data['user']->email_verified_at != null)
                        <button class="btn btn-primary btn-xs"> <i class="fa fa-check text-white"></i> Verified </button>
                    @else
                        <button class="btn btn-danger btn-xs"> <i class="fa fa-times text-white"></i> Not Verified</button>
                    @endif
                </span> 
            </h3>

            <h5 class="widget-user-desc"> {{ $data['userInfo']->type }} </h5>
        </div>
        <div class="box-footer no-padding">
            <ul class="nav nav-stacked">
                <li><a href="#"> Email: <span class="pull-right"> {{ $data['user']->email }} </span></a></li>
                <li><a href="#"> Phone: <span class="pull-right"> {{ $data['user']->phone }} </span></a></li>
                <li><a href="#"> Total Spent: <span class="pull-right badge bg-green"> {{ $data['userInfo']->total_spent }} $ </span></a></li>
                <li><a href="#"> Address: <span class="pull-right"> {{ $data['userInfo']->street }}, {{ $data['userInfo']->city }}, {{ $data['userInfo']->state }}, {{ $data['userInfo']->country }}. </span></a></li>
            </ul>
        </div>
    </div>
    <!-- /.widget-user -->
</div>

@endsection