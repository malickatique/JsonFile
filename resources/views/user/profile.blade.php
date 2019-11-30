@extends('user.master')

@section('content')

  <h2>
    Profile
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('user.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Profile</li>
  </ol>
  

<!-- Main content -->

@if($errors->any())
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> {{ $errors->first() }} </h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<section class="content">

<div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
            
                    @if( Auth::user()->imageurl != null )
                        <img class="profile-user-img img-responsive img-circle" width="100px" height="140px" src="{{ asset('img/profile_pic/'.Auth::user()->imageurl) }}" alt="User profile picture">
                    @else
                        <img class="profile-user-img img-responsive img-circle" width="100px" height="140px" src="{{ asset('img/profile_pic/user.png') }}" alt="User profile picture">
                    @endif
                    <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                    <form method="POST" action="{{ route('user.profile.pic.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputFile">Change Profile Picture</label>
                            <input type="file" class="btn btn-primary btn-block" name="image" id="file" required>
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="submit" value="Update">
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

    <!-- /.col -->
    <div class="col-md-9">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Change Password</a></li>
            <li class=""><a href="#changeinfo" data-toggle="tab" aria-expanded="false">User Information</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="activity">
                <form class="form-horizontal" method="POST" action="{{ route('user.profile.password.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="old_password" class="col-sm-2 control-label">Old Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="old_password" id="old_password" required placeholder="Old Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="new_password" class="col-sm-2 control-label">New Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="new_password" id="new_password" required placeholder="New Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="retype_password" class="col-sm-2 control-label">Retype Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="retype_password" id="retype_password" required placeholder="Retype Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <input type="submit" class="btn btn-success" value="Change Password">
                        </div>
                    </div>
                </form>
            </div>

            <div class="tab-pane" id="changeinfo">
                <form class="form-horizontal" method="POST" action="{{ route('user.profile.info.update') }}" >
                    @csrf
                    <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="name" id="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" id="email" placeholder="Email" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <input type="submit" class="btn btn-success" value="Update">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->

@endsection