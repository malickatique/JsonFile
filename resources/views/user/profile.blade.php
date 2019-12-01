@extends('user.master')

@section('content')

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

<div class="container bootstrap snippet box box-primary">
    <div class="row">
  		<div class="col-sm-10"><h1>{{ Auth::user()->name }}</h1></div>
    	<!-- <div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a></div> -->
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->   

            <div class="text-center">
                @if( Auth::user()->imageurl != null )
                    <img src="{{ asset('img/profile_pic/'.Auth::user()->imageurl) }}" class="avatar img-circle img-thumbnail" style="width:210px;height:210px" alt="avatar">
                @else
                    <img src="{{ asset('img/profile_pic/user.png') }}" class="user-image" alt="User Image">
                @endif
                <form method="POST" action="{{ route('user.profile.pic.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputFile">Change Profile Picture</label>
                            <input type="file" class="btn btn-primary btn-block" name="image" id="file" required>
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="submit" value="Update">
                    </form>
                <!-- <input type="file" class="text-center center-block file-upload"> -->
            </div></hr><br>

               
          <div class="panel panel-default">
            <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body"><a href="#">abcc</a></div>
          </div>
          
          
          <ul class="list-group">
            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
          </ul> 
               
          <div class="panel panel-default">
            <div class="panel-heading">Social Media</div>
            <div class="panel-body">
            	<i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
            </div>
          </div>
          
        </div><!--/col-3-->
    	<div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#info">Change Info</a></li>
                <li><a data-toggle="tab" href="#pass">Change Password</a></li>
                <li><a data-toggle="tab" href="#payment">Payment Method</a></li>
            </ul>

            <div class="tab-content">
            <div class="tab-pane active" id="info">
                <hr>
                  <form class="form" action="{{ route('user.profile.info.update') }}" method="POST" id="registrationForm">
                        @csrf
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Name</h4></label>
                              <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" id="first_name" required placeholder="first name">
                          </div>
                      </div>
          
                      <!-- <div class="form-group">
                          <div class="col-xs-6">
                              <label for="phone"><h4>Phone</h4></label>
                              <input type="text" class="form-control" name="phone" id="phone" required placeholder="enter phone" title="enter your phone number if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Mobile</h4></label>
                              <input type="text" class="form-control" name="mobile" id="mobile" required placeholder="enter mobile number" title="enter your mobile number if any.">
                          </div>
                      </div> -->

                      <div class="form-group">    
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}" id="email" required placeholder="you@email.com" title="enter your email." disabled>
                          </div>
                      </div>
                      <!-- <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Location</h4></label>
                              <input type="email" class="form-control" id="location" required placeholder="somewhere" title="enter a location">
                          </div>
                      </div> -->
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Update</button>
                               	<!-- <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button> -->
                            </div>
                      </div>
              	</form>
              
              <hr>
              
             </div><!--/tab-pane-->
             <div class="tab-pane" id="pass">    
               <h2></h2>
               <hr>
                  <form class="form" action="{{ route('user.profile.password.update') }}" method="POST" id="registrationForm">
                    @csrf
                    <div class="form-group">      
                          <div class="col-xs-6">
                              <label for="password"><h4>Old Password</h4></label>
                              <input type="password" class="form-control" name="old_password" id="password" required placeholder="password" title="enter your password.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>New Password</h4></label>
                              <input type="password" class="form-control" name="new_password" id="password2" required placeholder="password2" title="enter your password2.">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                            <label for="password2"><h4>Retype Password</h4></label>
                              <input type="password" class="form-control" name="retype_password" id="password2" required placeholder="password2" title="enter your password2.">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Update</button>
                               	<!-- <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button> -->
                            </div>
                      </div>
              	</form>
               
             </div><!--/tab-pane-->
             <div class="tab-pane" id="payment">
                  <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>First name</h4></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" required placeholder="first name" title="enter your first name if any.">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success pull-right" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                               	<!--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                            </div>
                      </div>
              	</form>
              </div>
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->


    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
      </div>
      <strong>Copyright &copy; 2019-2022 <a href="{{ route('homepage')}}">{{ config('app.name', 'JsonFile') }}</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>

@endsection