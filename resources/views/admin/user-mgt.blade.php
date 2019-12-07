@extends('admin.master')
@section('content')

<h2>
    Dashboard
    <small>User management</small>
</h2>
<ol class="breadcrumb">
    <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Users management</li>
</ol>

<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Users Listing</h3>
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
                                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Date</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Image</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Phone</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Email</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Access</th>
                                <!-- <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Event</th> -->
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" width="120">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr role="row" class="odd">
                                <td class="text-center sorting_1"> {{ $user->created_at->format('d/m/Y') }} </td>
                                <td class="">
                                    @if( $user->imageurl != null )
                                        <img src="{{ asset('img/profile_pic/'.$user->imageurl) }}" class="img-responsive" style="width:40px;height:40px" alt="User Image">
                                    @else
                                        <img src="{{ asset('img/profile_pic/user.png') }}" class="img-responsive" style="width:40px;height:40px" alt="User Image">
                                    @endif
                                </td>

                                <td class="text-capitalize">
                                    {{ $user->name }}
                                </td>

                                <td class="text-capitalize">
                                    {{ $user->phone }}
                                </td>

                                <td>
                                    {{ $user->email }}
                                </td>
                                <td class="text-center">
                                    @if( $user->role == 'user' )
                                        <small class="label label-success" >user</small>
                                    @else
                                        <small class="label label-danger">admin</small>
                                    @endif
                                </td>
                                <!-- <td class="text-center">
                                    <form method="" action="#">
                                        @csrf
                                        <input type="hidden" name="user_id" value="1">
                                        <input type="hidden" name="status" value="1">
                                        <button type="submit" data-toggle="tooltip" title="" class="btn btn-default btn-sm" data-original-title="Deactivate user">
                                            <i class="fa fa-toggle-off fa-lg"></i>
                                        </button>
                                    </form>
                                </td> -->
                                <td width="60" class="text-center">
                                    <!-- <a href="#" data-toggle="tooltip" title="" class="btn btn-default btn-sm" data-original-title="View properties."><i class="fa fa-building"></i></a> -->

                                    @if( $user->role == 'user' )
                                        <a href="{{ route('user.view', ['id' => $user->id] ) }}" data-toggle="tooltip" title="" class="btn btn-default btn-sm" data-original-title="View user info"><i class="fa fa-eye"></i></a>
                                    @else
                                        <a href="{{ route('admin.edit', ['id' => $user->id] ) }}" data-toggle="tooltip" title="" class="btn btn-default btn-sm" data-original-title="View user info" disabled><i class="fa fa-edit"></i></a>
                                    @endif
                                    <!-- <a href="#" data-toggle="tooltip" title="" class="btn btn-default btn-sm" data-original-title="Edit user info"><i class="fa fa-edit"></i></a> -->

                                    <form style="display: -webkit-inline-box;" action="{{ route('del.user') }}" method="POST">
                                        @csrf
                                        <input name="user_id" type="hidden" value="{{ $user->id }}">
                                        <button class="btn btn-default btn-sm" data-toggle="tooltip" title="" type="submit" onclick="return confirm('Are you sure you want to delete this user?');" data-original-title="Delete user"><i class="fa fa-trash"></i></button>
                                    </form>
                                    
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
@endsection