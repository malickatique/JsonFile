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
                        <td class="">name </td>
                        <form class="form-horizontal" method="POST" action="#">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" name="site_name" maxlength="190" minlength="2" value="#" class="form-control" required>
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
                        <td class="">abc</td>
                        <form class="form-horizontal" method="POST" action="#">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" name="site_logo_text" maxlength="190" minlength="2" value="#" class="form-control" required>
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
                        <td class=""> <img src="asd" alt="pic" style="width:80px;height:80px;"> </td>
                        <form class="form-horizontal" method="POST" action="#" enctype="multipart/form-data">
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
                        <td class=""> abc </td>
                        <form class="form-horizontal" method="POST" action="#">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" name="site_header_text" maxlength="190" minlength="2" value="abc" class="form-control" required>
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
                        <td class=""> abc </td>
                        <form class="form-horizontal" method="POST" action="#">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <textarea name="site_about_us" id="" maxlength="190" minlength="2" cols="40" rows="5">abcc</textarea>
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
                        <td class=""> abc </td>
                        <form class="form-horizontal" method="POST" action="#">
                            @csrf
                            <td>
                                <div class="form-group">
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" name="site_address" maxlength="190" minlength="2" value="#" class="form-control" required>
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