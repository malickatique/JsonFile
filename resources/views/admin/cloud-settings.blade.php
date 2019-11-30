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
        <h3 class="box-title text-uppercase">cloud  Setting</h3>
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
                    
                    <td class="text-capitalize">site logo</td>
                    
                    <td>                                    
                        <img src="#" alt="" width="150px" height="36px">
                    </td>

                    <td>
                        <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                    </td>
                </tr>

                <tr>
                    <td>2 </td>
                    <td class="text-capitalize">site sticky logo</td>
                    <td>
                        <img src="#" alt="" width="150px" height="36px">
                    </td>
                    <td>
                        <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                    </td>
                </tr>

                <tr>
                    <td>3 </td>
                    <td class="text-capitalize">footer logo</td>
                    <td>
                        <img src="#" alt="" width="150px" height="36px">
                    </td>
                    <td>
                        <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                    </td>
                </tr>
                
                <tr>
                    <td>4 </td>
                    <td class="text-capitalize">footer desc</td>
                    <td>
                        aa
                    </td>
                    <td>
                        <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                    </td>
                </tr>   
                
                <tr>
                    <td>5 </td>
                    <td class="text-capitalize">footer contact</td>
                    <td>
                        ss
                    </td>
                    <td>
                        <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                    </td>
                </tr>
                
                <tr>
                    <td>6 </td>
                    <td class="text-capitalize">footer email</td>
                    <td>
                        asd
                    </td>
                    <td>
                        <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                    </td>
                </tr>
                
                <tr>
                    <td>7 </td>
                    <td class="text-capitalize">footer trademark</td>
                    <td>
                    </td>
                    <td>
                        <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                    </td>
                </tr>
                                                            
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>

@endsection