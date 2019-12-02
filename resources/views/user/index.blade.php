@extends('user.master')

@section('content')


@if($errors->any())
<h4> {{ $errors->first() }} </h4>
@endif

<div class="col-md-10 col-lg-10 col-sm-12">
    <!-- Widget: user widget style 1 -->
    <div class="box box-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-aqua-active">
            <h3 class="widget-user-username">{{ Auth::user()->name }}</h3>
            <h5 class="widget-user-desc">{{ Auth::user()->role }} </h5>
        </div>
        <div class="widget-user-image">
            @if( Auth::user()->imageurl != null )
            <img src="{{ asset('img/profile_pic/'.Auth::user()->imageurl) }}" class="img-circle" style="width:95px; height:95px; border-radius: 100%;" alt="User Image">
            @else
            <img src="{{ asset('img/profile_pic/user.png') }}" class="img-circle" style="width:95px; height:95px; border-radius: 100%;" alt="User Image">
            @endif
        </div>
        <div class="box-footer">
            <div class="row">
                <div class="col-sm-4 border-right">
                    <div class="description-block">
                        <h5 class="description-header">37 TK</h5>
                        <span class="description-text">Free Credits</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                    <div class="description-block">
                        <h5 class="description-header">{{ $info['total_files'] }}+</h5>
                        <span class="description-text">Convert Files</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                    <div class="description-block">
                        <h5 class="description-header">{{ $info['total_spent'] }} $</h5>
                        <span class="description-text">Total Spent</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </div>
    <!-- /.widget-user -->
</div>

<div class="col-md-10 col-lg-10 col-sm-12">
    
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">My Files</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div id="example1" class="table table-bordered table-striped">
            <div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6"></div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">id#</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">File Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">File Size</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Est. Price</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status</th>
                                <!-- <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Event</th> -->
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" width="120">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($files as $file)
                            <tr role="row" class="odd">
                                <td class="text-center sorting_1"> {{ $file->id }} </td>

                                <td class="">
                                    {{ $file->file_name }}
                                </td>

                                <td class="text-capitalize">
                                    {{ $file->file_size }}
                                </td>
                                <td>
                                    {{ $file->price }} $
                                </td>
                                <td class="text-center">
                                    @if($file->status == '5')
                                        <small class="label label-success" >Paid</small>
                                    @else
                                        <small class="label label-danger">Not Paid</small>
                                    @endif
                                </td>
                                <!-- <td class="text-center">
                                    <form method="POST" action="#">
                                        @csrf
                                        <input type="hidden" name="user_id" value="1">
                                        <input type="hidden" name="status" value="1">
                                        <button type="submit" data-toggle="tooltip" title="" class="btn btn-default btn-sm" data-original-title="Deactivate user">
                                            <i class="fa fa-toggle-on fa-lg"></i>
                                        </button>
                                    </form>
                                </td> -->
                                <td width="60" class="text-center">
                                    <a href="#" data-toggle="tooltip" title="" class="btn btn-default btn-sm" data-original-title="View properties."><i class="fa fa-building"></i></a>
                                    <!-- <a href="#" data-toggle="tooltip" title="" class="btn btn-default btn-sm" data-original-title="View user info"><i class="fa fa-eye"></i></a> -->
                                    <!-- <a href="#" data-toggle="tooltip" title="" class="btn btn-default btn-sm" data-original-title="Edit user info"><i class="fa fa-edit"></i></a> -->

                                    <!-- <form style="display: -webkit-inline-box;" action="#" method="POST">
                                        @csrf
                                        <input name="file_id" type="hidden" value="#">
                                        <button class="btn btn-default btn-sm" data-toggle="tooltip" title="" type="submit" onclick="return confirm('Are you sure you want to delete this user?');" data-original-title="Delete user"><i class="fa fa-trash"></i></button>
                                    </form> -->
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->


</div>

@endsection