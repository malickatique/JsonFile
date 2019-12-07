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
                                        <input type="text" name="token" maxlength="190" minlength="2" value="{{ $cloud->service_provider }}" class="form-control" disabled>
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
                                        <input type="text" name="token" maxlength="190" minlength="2" value="{{ $cloud->disk_name }}" class="form-control" disabled>
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
                                        <input type="text" name="token" maxlength="190" minlength="2" value="{{ $cloud->token }}" class="form-control" required>
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
                                        <input type="text" name="folder" maxlength="190" minlength="2" value="{{ $cloud->folder }}" class="form-control" required>
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
                                        <input type="text" name="price_per_mb" maxlength="190" minlength="1" value="{{ $cloud->price_per_mb }}" class="form-control" required>
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