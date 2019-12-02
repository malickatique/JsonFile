@extends('admin.master')

@section('content')

<h2>
    Dashboard
    <small>cloud settings</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">cloud-settings</li>
    </ol>

    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title text-uppercase">cloud Setting</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th width="10">#</th>
                        <th width="150">Name</th>
                        <th width="150">Preview</th>
                        <th>Value</th>
                        <th width="80" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td class="text-capitalize"> Site Name </td>
                        <td class=""> {{ $site->site_name }} </td>
                        <form class="form-horizontal" method="POST" action="{{ route('site.name') }}">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" name="site_name" maxlength="190" minlength="2" value="{{ $site->site_name }}" class="form-control" required>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-square-o fa-lg"></i></button>
                            </td>
                        </form>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td class="text-capitalize"> Site Logo Text </td>
                        <td class=""> {{ $site->site_logo_text }} </td>
                        <form class="form-horizontal" method="POST" action="{{ route('site_logo_text') }}">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" name="site_logo_text" maxlength="190" minlength="2" value="{{ $site->site_logo_text }}" class="form-control" required>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-square-o fa-lg"></i></button>
                            </td>
                        </form>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td class="text-capitalize"> Site header image </td>
                        <td class=""> <img src="{{ asset('img/'.$site->site_header_pic) }}" alt="pic" style="width:80px;height:80px;"> </td>
                        <form class="form-horizontal" method="POST" action="{{ route('site_header_pic') }}" enctype="multipart/form-data">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="file" name="site_header_pic" value="" class="form-control" required>
                                            @error('site_header_pic')
                                                <span class="invalid-feedback text-red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>  
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-square-o fa-lg"></i></button>
                            </td>
                        </form>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td class="text-capitalize"> Site Header Text </td>
                        <td class=""> {{ $site->site_header_text }} </td>
                        <form class="form-horizontal" method="POST" action="{{ route('site_header_text') }}">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" name="site_header_text" maxlength="190" minlength="2" value="{{ $site->site_header_text }}" class="form-control" required>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-square-o fa-lg"></i></button>
                            </td>
                        </form>
                    </tr>

                    <tr>
                        <td>5</td>
                        <td class="text-capitalize"> Site About Us </td>
                        <td class=""> {{ $site->site_about_us }} </td>
                        <form class="form-horizontal" method="POST" action="{{ route('site_about_us') }}">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <textarea name="site_about_us" id="" maxlength="190" minlength="2" cols="40" rows="5">{{ $site->site_about_us }}</textarea>
                                    </div>
                                </div>  
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-square-o fa-lg"></i></button>
                            </td>
                        </form>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td class="text-capitalize"> Site Address </td>
                        <td class=""> {{ $site->site_address }} </td>
                        <form class="form-horizontal" method="POST" action="{{ route('site_address') }}">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" name="site_address" maxlength="190" minlength="2" value="{{ $site->site_address }}" class="form-control" required>
                                    </div>
                                </div>  
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-square-o fa-lg"></i></button>
                            </td>
                        </form>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td class="text-capitalize"> Facebook Page </td>
                        <td class=""> {{ $site->site_facebook }} </td>
                        <form class="form-horizontal" method="POST" action="{{ route('site_facebook') }}">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" name="site_facebook" maxlength="190" minlength="2" value="{{ $site->site_facebook }}" class="form-control" required>
                                    </div>
                                </div>  
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-square-o fa-lg"></i></button>
                            </td>
                        </form>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td class="text-capitalize"> Twitter Page </td>
                        <td class=""> {{ $site->site_twitter }} </td>
                        <form class="form-horizontal" method="POST" action="{{ route('site_twitter') }}">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" name="site_twitter" maxlength="190" minlength="2" value="{{ $site->site_twitter }}" class="form-control" required>
                                    </div>
                                </div>  
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-square-o fa-lg"></i></button>
                            </td>
                        </form>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td class="text-capitalize"> Instagram Page </td>
                        <td class=""> {{ $site->site_instagram }} </td>
                        <form class="form-horizontal" method="POST" action="{{ route('site_instagram') }}">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" name="site_instagram" maxlength="190" minlength="2" value="{{ $site->site_instagram }}" class="form-control" required>
                                    </div>
                                </div>  
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-square-o fa-lg"></i></button>
                            </td>
                        </form>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td class="text-capitalize"> Linkedin Page </td>
                        <td class=""> {{ $site->site_linkedin }} </td>
                        <form class="form-horizontal" method="POST" action="{{ route('site_linkedin') }}">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" name="site_linkedin" maxlength="190" minlength="2" value="{{ $site->site_linkedin }}" class="form-control" required>
                                    </div>
                                </div>  
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-square-o fa-lg"></i></button>
                            </td>
                        </form>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td class="text-capitalize"> Email Address </td>
                        <td class=""> {{ $site->site_email }} </td>
                        <form class="form-horizontal" method="POST" action="{{ route('site_email') }}">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" name="site_email" maxlength="190" minlength="2" value="{{ $site->site_email }}" class="form-control" required>
                                    </div>
                                </div>  
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-square-o fa-lg"></i></button>
                            </td>
                        </form>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td class="text-capitalize"> Phone Number </td>
                        <td class=""> {{ $site->site_phone }} </td>
                        <form class="form-horizontal" method="POST" action="{{ route('site_phone') }}">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" name="site_phone" maxlength="190" minlength="2" value="{{ $site->site_phone }}" class="form-control" required>
                                    </div>
                                </div>  
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-square-o fa-lg"></i></button>
                            </td>
                        </form>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

    @endsection