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
                        <th>Value</th>
                        <th width="80" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1 </td>

                        <td class="text-capitalize"> Cloud Service Provider </td>
                        <form class="form-horizontal" method="POST" action="#">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" name="token" maxlength="190" minlength="2" value="{{ $cloud['cloud']->service_provider }}" class="form-control" disabled>
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
                        <td class="text-capitalize">Disk Name</td>
                        <form class="form-horizontal" method="POST" action="#">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" name="token" maxlength="190" minlength="2" value="{{ $cloud['cloud']->disk_name }}" class="form-control" disabled>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-square-o fa-lg"></i></button>
                            </td>
                        </form>
                    </tr>

                    <tr>
                        <td>3 </td>
                        <td class="text-capitalize">Token</td>

                        <form class="form-horizontal" method="POST" action="{{ route('cloud.token') }}">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" name="token" maxlength="190" minlength="2" value="{{ $cloud['cloud']->token }}" class="form-control" required>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-square-o fa-lg"></i></button>
                            </td>
                        </form>
                    </tr>

                    <tr>
                        <td>4 </td>
                        <td class="text-capitalize">Folder name</td>
                        <form class="form-horizontal" method="POST" action="{{ route('cloud.folder') }}">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" name="folder" maxlength="190" minlength="2" value="{{ $cloud['cloud']->folder }}" class="form-control" required>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-square-o fa-lg"></i></button>
                            </td>
                        </form>
                    </tr>

                    <tr>
                        <td>5 </td>
                        <td class="text-capitalize">Set Price per MB (USD)</td>
                        <form class="form-horizontal" method="POST" action="{{ route('cloud.price') }}">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" name="price_per_mb" maxlength="190" minlength="1" value="{{ $cloud['cloud']->price_per_mb }}" class="form-control" required>
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
                <h3 class="box-title"> Cloud Folders - Setting</h3>

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
                                <li class="active"><a href="#folder1" data-toggle="tab" aria-expanded="true"> Input Folder </a></li>
                                <li class=""><a href="#folder2" data-toggle="tab" aria-expanded="false"> Output Folder </a></li>
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
                                                @if( ! $cloud['cloud_folder']['files_in_cloud_input'])
                                                    <h4> "input" folder in server is empty. </h4>
                                                @endif
                                            </div>

                                            @foreach( $cloud['cloud_folder']['files_in_cloud_input'] as $key => $file )
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td class=""> {{ $file }} </td>
                                                <form class="form-horizontal" method="POST" action="{{ route('del.a.file') }}">
                                                    @csrf
                                                    <input type="hidden" name="file" value="{{ $file }}">
                                                    <input type="hidden" name="place" value="{{ $cloud['cloud']->disk_name }}">
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
                                            <input type="hidden" name="place" value="{{ $cloud['cloud']->disk_name }}">
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
                                                @if( ! $cloud['cloud_folder']['files_in_cloud_output'])
                                                    <h4> "output" folder in server is empty. </h4>
                                                @endif
                                            </div>
                                            @foreach( $cloud['cloud_folder']['files_in_cloud_output'] as $key => $file )
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td class=""> {{ $file }} </td>
                                                <form class="form-horizontal" method="POST" action="{{ route('del.a.file') }}">
                                                    @csrf
                                                    <input type="hidden" name="file" value="{{ $file }}">
                                                    <input type="hidden" name="place" value="{{ $cloud['cloud']->disk_name }}">
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
                                            <input type="hidden" name="place" value="{{ $cloud['cloud']->disk_name }}">
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

    <div style="margin: 50px 10px;"></div>
    @endsection