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
                        <td class=""> {{ $site['site']->site_name }} </td>
                        <form class="form-horizontal" method="POST" action="{{ route('site.name') }}">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" name="site_name" maxlength="190" minlength="2" value="{{ $site['site']->site_name }}" class="form-control" required>
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
                        <td class=""> {{ $site['site']->site_logo_text }} </td>
                        <form class="form-horizontal" method="POST" action="{{ route('site_logo_text') }}">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" name="site_logo_text" maxlength="190" minlength="2" value="{{ $site['site']->site_logo_text }}" class="form-control" required>
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
                        <td class=""> <img src="{{ asset('img/'.$site['site']->site_header_pic) }}" alt="pic" style="width:80px;height:80px;"> </td>
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
                        <td class=""> {{ $site['site']->site_header_text }} </td>
                        <form class="form-horizontal" method="POST" action="{{ route('site_header_text') }}">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" name="site_header_text" maxlength="190" minlength="2" value="{{ $site['site']->site_header_text }}" class="form-control" required>
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
                        <td class=""> {{ $site['site']->site_about_us }} </td>
                        <form class="form-horizontal" method="POST" action="{{ route('site_about_us') }}">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <textarea name="site_about_us" id="" maxlength="190" minlength="2" cols="40" rows="5">{{ $site['site']->site_about_us }}</textarea>
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
                        <td class=""> {{ $site['site']->site_address }} </td>
                        <form class="form-horizontal" method="POST" action="{{ route('site_address') }}">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" name="site_address" maxlength="190" minlength="2" value="{{ $site['site']->site_address }}" class="form-control" required>
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
                        <td class=""> {{ $site['site']->site_facebook }} </td>
                        <form class="form-horizontal" method="POST" action="{{ route('site_facebook') }}">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" name="site_facebook" maxlength="190" minlength="2" value="{{ $site['site']->site_facebook }}" class="form-control" required>
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
                        <td class=""> {{ $site['site']->site_twitter }} </td>
                        <form class="form-horizontal" method="POST" action="{{ route('site_twitter') }}">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" name="site_twitter" maxlength="190" minlength="2" value="{{ $site['site']->site_twitter }}" class="form-control" required>
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
                        <td class=""> {{ $site['site']->site_instagram }} </td>
                        <form class="form-horizontal" method="POST" action="{{ route('site_instagram') }}">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" name="site_instagram" maxlength="190" minlength="2" value="{{ $site['site']->site_instagram }}" class="form-control" required>
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
                        <td class=""> {{ $site['site']->site_linkedin }} </td>
                        <form class="form-horizontal" method="POST" action="{{ route('site_linkedin') }}">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" name="site_linkedin" maxlength="190" minlength="2" value="{{ $site['site']->site_linkedin }}" class="form-control" required>
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
                        <td class=""> {{ $site['site']->site_email }} </td>
                        <form class="form-horizontal" method="POST" action="{{ route('site_email') }}">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" name="site_email" maxlength="190" minlength="2" value="{{ $site['site']->site_email }}" class="form-control" required>
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
                        <td class=""> {{ $site['site']->site_phone }} </td>
                        <form class="form-horizontal" method="POST" action="{{ route('site_phone') }}">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" name="site_phone" maxlength="190" minlength="2" value="{{ $site['site']->site_phone }}" class="form-control" required>
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


    <!-- Server Files -->
    <div class="col-md-12">
        <div class="box box-primary collapseds-box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"> Server Folders - Setting</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus fa-lg"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#folder1" data-toggle="tab" aria-expanded="true"> Temp Folder </a></li>
                                <li class=""><a href="#folder2" data-toggle="tab" aria-expanded="false"> Input Folder </a></li>
                                <li class=""><a href="#folder3" data-toggle="tab" aria-expanded="false"> Output Folder </a></li>
                            </ul>

                            <div class="tab-content">

                                <div class="tab-pane active" id="folder1">
                                    <table class="table table-bordered ">
                                        <thead>
                                            <tr>
                                                <th width="10">#</th>
                                                <th width="150">Files in directory</th>
                                                <th width="80" class="">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <div class="danger text-red">
                                                @if( ! $site['folder']['files_in_server_temp'])
                                                    <h4> "temp" folder in server is empty. </h4>
                                                @endif
                                            </div>

                                            @foreach( $site['folder']['files_in_server_temp'] as $key => $file )
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td class=""> {{ $file }} </td>
                                                <form class="form-horizontal" method="POST" action="{{ route('del.a.file') }}">
                                                    @csrf
                                                    <input type="hidden" name="file" value="{{ $file }}">
                                                    <input type="hidden" name="place" value="local">
                                                    <input type="hidden" name="folder" value="temp">
                                                    <td>
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i></button>
                                                    </td>
                                                </form>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                        <form action="{{ route('del.all.files') }}" method="POST">
                                            @csrf 
                                            <input type="hidden" name="place" value="local">
                                            <input type="hidden" name="folder" value="temp">
                                            <div class="form-group">
                                                <div class="col-sm-2"></div>
                                                <div class="col-sm-10">
                                                    <input type="submit" class="btn btn-danger" value="Delete All Files">
                                                </div>
                                            </div>
                                        </form>
                                    <br>
                                </div>

                                <div class="tab-pane" id="folder2">
                                    <table class="table table-bordered ">
                                        <thead>
                                            <tr>
                                                <th width="10">#</th>
                                                <th width="150">Files in directory</th>
                                                <th width="80" class="">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <div class="danger text-red">
                                                @if( ! $site['folder']['files_in_server_input'])
                                                    <h4> "input" folder in server is empty. </h4>
                                                @endif
                                            </div>
                                            @foreach( $site['folder']['files_in_server_input'] as $key => $file )
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td class=""> {{ $file }} </td>
                                                <form class="form-horizontal" method="POST" action="{{ route('del.a.file') }}">
                                                    @csrf
                                                    <input type="hidden" name="file" value="{{ $file }}">
                                                    <input type="hidden" name="place" value="local">
                                                    <input type="hidden" name="folder" value="input">
                                                    <td>
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i></button>
                                                    </td>
                                                </form>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                        <form action="{{ route('del.all.files') }}" method="POST">
                                            @csrf 
                                            <input type="hidden" name="place" value="local">
                                            <input type="hidden" name="folder" value="input">
                                            <div class="form-group">
                                                <div class="col-sm-2"></div>
                                                <div class="col-sm-10">
                                                    <input type="submit" class="btn btn-danger" value="Delete All Files">
                                                </div>
                                            </div>
                                        </form>
                                    <br>
                                </div>

                                <div class="tab-pane" id="folder3">
                                    <table class="table table-bordered ">
                                        <thead>
                                            <tr>
                                                <th width="10">#</th>
                                                <th width="150">Files in directory</th>
                                                <th width="80" class="">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <div class="danger text-red">
                                                @if( ! $site['folder']['files_in_server_output'])
                                                    <h4> "output" folder in server is empty. </h4>
                                                @endif
                                            </div>
                                            @foreach( $site['folder']['files_in_server_output'] as $key => $file )
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td class=""> {{ $file }} </td>
                                                <form class="form-horizontal" method="POST" action="{{ route('del.a.file') }}">
                                                    @csrf
                                                    <input type="hidden" name="file" value="{{ $file }}">
                                                    <input type="hidden" name="place" value="local">
                                                    <input type="hidden" name="folder" value="output">
                                                    <td>
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i></button>
                                                    </td>
                                                </form>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                        <form action="{{ route('del.all.files') }}" method="POST">
                                            @csrf 
                                            <input type="hidden" name="place" value="local">
                                            <input type="hidden" name="folder" value="output">
                                            <div class="form-group">
                                                <div class="col-sm-2"></div>
                                                <div class="col-sm-10">
                                                    <input type="submit" class="btn btn-danger" value="Delete All Files">
                                                </div>
                                            </div>
                                        </form>
                                    <br>
                                </div>

                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

    @endsection