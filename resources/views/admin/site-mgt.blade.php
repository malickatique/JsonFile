@extends('admin.master')
@section('content')

<h2>
    Dashboard
    <small>site settings</small>
</h2>
<ol class="breadcrumb">
    <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">site-settings</li>
</ol>


<!-- About Us -->
<div class="col-md-12">
    <div class="box box-primary no-collapsed-box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title"> About Us - Setting </h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus fa-lg"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <form action="{{ route('content.change') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <input type="hidden" name="id" value="{{ $content[0]->id }}">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="10">#</th>
                            <th width="180">Name</th>
                            <th width="350">Preview</th>
                            <th width="350">Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td class="text-capitalize"> About Us - heading </td>
                            <td class=""> {{ $content[0]->h1 }} </td>
                            <td>
                                <textarea name="h1" id="" maxlength="750" minlength="2" cols="50" rows="5">{{ $content[0]->h1 }}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td class="text-capitalize"> About Us - Image </td>
                            <td class=""> <img src="{{ asset('img/' . $content[0]->img ) }}" alt="pic" style="width:80px;height:80px;"> </td>
                            <td class="col-md-2">
                                <input type="file" name="img" value="{{ $content[0]->img }}" class="form-control">
                                @error('img')
                                <span class="invalid-feedback text-red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td class="text-capitalize"> About Us - Paragraph </td>
                            <td class=""> {{ $content[0]->p }} </td>
                            <td>
                                <textarea name="p" id="" maxlength="750" minlength="2" cols="50" rows="5">{{ $content[0]->p }}</textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="form-group text-center">
                    <br> <br>
                    <button class="btn btn-lg btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Update</button>
                </div>
            </form>

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>

<!-- Services -->
<div class="col-md-12">
    <div class="box box-primary collapsed-box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title"> Services - Setting</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus fa-lg"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <div class="col-md-12">
                <h4> <b>Services main heading:</b> </h4>
                <div class="text-capitalize col-md-4"> Services - heading </div>

                <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $content[1]->id }}">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-sm-6 col-xs-8">
                                <textarea name="h1" id="" maxlength="750" minlength="2" cols="50" rows="3">{{ $content[1]->h1 }}</textarea>
                            </div>
                        </div>  
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-square-o fa-lg"></i></button>
                    </div>
                </form>

            </div>

            <div class="row">
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#box1" data-toggle="tab" aria-expanded="true"> Box#1 Settings</a></li>
                            <li class=""><a href="#box2" data-toggle="tab" aria-expanded="false"> Box#2 Settings</a></li>
                            <li class=""><a href="#box3" data-toggle="tab" aria-expanded="false"> Box#3 Settings</a></li>
                            <li class=""><a href="#box4" data-toggle="tab" aria-expanded="false"> Box#4 Settings</a></li>
                            <li class=""><a href="#box5" data-toggle="tab" aria-expanded="false"> Box#5 Settings</a></li>
                            <li class=""><a href="#box6" data-toggle="tab" aria-expanded="false"> Box#6 Settings</a></li>
                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane active" id="box1">
                                <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                                    @csrf 
                                    <input type="hidden" name="id" value="{{ $content[2]->id }}">
                                    <br><br>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Heading</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" value="{{ $content[2]->h1 }}" name="h1" minlength="4" maxlength="50" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Breif Description</label>
                                        <div class="col-sm-6">
                                            <textarea name="p" cols="70" rows="4" class="form-control" minlength="4" maxlength="50" required>{{ $content[2]->p }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Box Icon</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="img" value="{{ $content[2]->img }}" class="form-control" minlength="4" maxlength="50" required>
                                            
                                        </div>
                                        <div class="col-md-4">
                                            <span> <i class="fa-4x {{ $content[2]->img }}"></i> </span>
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
                            
                            <div class="tab-pane" id="box2">
                                <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                                    @csrf 
                                    <input type="hidden" name="id" value="{{ $content[12]->id }}">
                                    <br><br>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Heading</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" value="{{ $content[3]->h1 }}" name="h1" minlength="4" maxlength="50" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Breif Description</label>
                                        <div class="col-sm-6">
                                            <textarea name="p" cols="70" rows="4" class="form-control" minlength="4" maxlength="50" required>{{ $content[3]->p }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Box Icon</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="img" value="{{ $content[3]->img }}" class="form-control" minlength="4" maxlength="50" required>
                                        </div>
                                        <div class="col-md-4">
                                            <span> <i class="fa-4x {{ $content[3]->img }}"></i> </span>
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

                            <div class="tab-pane" id="box3">
                                <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                                    @csrf 
                                    <input type="hidden" name="id" value="{{ $content[4]->id }}">
                                    <br><br>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Heading</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" value="{{ $content[4]->h1 }}" name="h1" minlength="4" maxlength="50" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Breif Description</label>
                                        <div class="col-sm-6">
                                            <textarea name="p" cols="70" rows="4" class="form-control" minlength="4" maxlength="50" required>{{ $content[4]->p }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Box Icon</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="img" value="{{ $content[4]->img }}" class="form-control" minlength="4" maxlength="50" required>
                                        </div>
                                        <div class="col-md-4">
                                            <span> <i class="fa-4x {{ $content[4]->img }}"></i> </span>
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

                            <div class="tab-pane" id="box4">
                                <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                                    @csrf 
                                    <input type="hidden" name="id" value="{{ $content[5]->id }}">
                                    <br><br>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Heading</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" value="{{ $content[5]->h1 }}" name="h1" minlength="4" maxlength="50" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Breif Description</label>
                                        <div class="col-sm-6">
                                            <textarea name="p" cols="70" rows="4" class="form-control" minlength="4" maxlength="50" required>{{ $content[5]->p }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Box Icon</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="img" value="{{ $content[5]->img }}" class="form-control" minlength="4" maxlength="50" required>
                                        </div>
                                        <div class="col-md-4">
                                            <span> <i class="fa-4x {{ $content[5]->img }}"></i> </span>
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

                            <div class="tab-pane" id="box5">
                                <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                                    @csrf 
                                    <input type="hidden" name="id" value="{{ $content[6]->id }}">
                                    <br><br>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Heading</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" value="{{ $content[6]->h1 }}" name="h1" minlength="4" maxlength="50" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Breif Description</label>
                                        <div class="col-sm-6">
                                            <textarea name="p" cols="70" rows="4" class="form-control" minlength="4" maxlength="50" required>{{ $content[6]->p }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Box Icon</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="img" value="{{ $content[6]->img }}" class="form-control" minlength="4" maxlength="50" required>
                                        </div>
                                        <div class="col-md-4">
                                            <span> <i class="fa-4x {{ $content[6]->img }}"></i> </span>
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

                            <div class="tab-pane" id="box6">
                                <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                                    @csrf 
                                    <input type="hidden" name="id" value="{{ $content[7]->id }}">
                                    <br><br>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Heading</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" value="{{ $content[7]->h1 }}" name="h1" minlength="4" maxlength="50" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Breif Description</label>
                                        <div class="col-sm-6">
                                            <textarea name="p" cols="70" rows="4" class="form-control" minlength="4" maxlength="50" required>{{ $content[7]->p }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Box Icon</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="img" value="{{ $content[7]->img }}" class="form-control" minlength="4" maxlength="50" required>
                                        </div>
                                        <div class="col-md-4">
                                            <span> <i class="fa-4x {{ $content[7]->img }}"></i> </span>
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

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>


<!-- Why Us -->
<div class="col-md-12">
    <div class="box box-primary collapsed-box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title"> Why Us - Setting </h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus fa-lg"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <form action="{{ route('content.change') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <input type="hidden" name="id" value="{{ $content[8]->id }}">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="10">#</th>
                            <th width="180">Name</th>
                            <th width="350">Preview</th>
                            <th width="350">Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td class="text-capitalize"> Why Us - heading </td>
                            <td class=""> {{ $content[8]->h1 }} </td>
                            <td>
                                <textarea name="h1" id="" maxlength="750" minlength="2" cols="50" rows="5">{{ $content[8]->h1 }}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td class="text-capitalize"> Why Us - Image </td>
                            <td class=""> <img src="{{ asset('img/' . $content[8]->img ) }}" alt="pic" style="width:80px;height:80px;"> </td>
                            <td class="col-md-2">
                                <input type="file" name="img" value="{{ $content[8]->img }}" class="form-control">
                                @error('img')
                                <span class="invalid-feedback text-red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td class="text-capitalize"> Why Us - Paragraph </td>
                            <td class=""> {{ $content[8]->p }} </td>
                            <td>
                                <textarea name="p" id="" maxlength="750" minlength="2" cols="50" rows="5">{{ $content[8]->p }}</textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="form-group text-center">
                    <br> <br>
                    <button class="btn btn-lg btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Update</button>
                </div>
            </form>

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>


<!-- Statistics -->
<div class="col-md-12">
    <div class="box box-primary collapsed-box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title"> Statistics - Setting</h3>

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
                            <li class="active"><a href="#stats1" data-toggle="tab" aria-expanded="true"> Stats#1 Settings</a></li>
                            <li class=""><a href="#stats2" data-toggle="tab" aria-expanded="false"> Stats#2 Settings</a></li>
                            <li class=""><a href="#stats3" data-toggle="tab" aria-expanded="false"> Stats#3 Settings</a></li>
                            <li class=""><a href="#stats4" data-toggle="tab" aria-expanded="false"> Stats#4 Settings</a></li>
                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane active" id="stats1">
                                <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                                    @csrf 
                                    <input type="hidden" name="id" value="{{ $content[9]->id }}">
                                    <br><br>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Numbers</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" value="{{ $content[9]->h1 }}" name="h1" minlength="4" maxlength="50" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label"> Variable </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="p" cols="70" rows="4" class="form-control" minlength="4" maxlength="50" required value="{{ $content[9]->p }}">
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
                            
                            <div class="tab-pane" id="stats2">
                                <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                                    @csrf 
                                    <input type="hidden" name="id" value="{{ $content[10]->id }}">
                                    <br><br>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Numbers</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" value="{{ $content[10]->h1 }}" name="h1" minlength="4" maxlength="50" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label"> Variable </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="p" cols="70" rows="4" class="form-control" minlength="4" maxlength="50" required value="{{ $content[10]->p }}">
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

                            <div class="tab-pane" id="stats3">
                                <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                                    @csrf 
                                    <input type="hidden" name="id" value="{{ $content[11]->id }}">
                                    <br><br>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Numbers</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" value="{{ $content[11]->h1 }}" name="h1" minlength="4" maxlength="50" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label"> Variable </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="p" cols="70" rows="4" class="form-control" minlength="4" maxlength="50" required value="{{ $content[11]->p }}">
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

                            <div class="tab-pane" id="stats4">
                                <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                                    @csrf 
                                    <input type="hidden" name="id" value="{{ $content[12]->id }}">
                                    <br><br>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Numbers</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" value="{{ $content[12]->h1 }}" name="h1" minlength="4" maxlength="50" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label"> Variable </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="p" cols="70" rows="4" class="form-control" minlength="4" maxlength="50" required value="{{ $content[12]->p }}">
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

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>


<!-- Black Strip -->
<div class="col-md-12">
    <div class="box box-primary collapsed-box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title"> Black Strip - Setting </h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus fa-lg"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <form action="{{ route('content.change') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <input type="hidden" name="id" value="{{ $content[13]->id }}">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="">#</th>
                            <th width="">Name</th>
                            <th width="">Preview</th>
                            <th width="">Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td class="text-capitalize"> Black Strip - heading </td>
                            <td class=""> {{ $content[13]->h1 }} </td>
                            <td class="col-md-5">
                                <input tupe="text" name="h1"  maxlength="750" minlength="2" value="{{ $content[13]->h1 }}" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td class="text-capitalize"> Black Strip - brief text </td>
                            <td class=""> {{ $content[13]->p }} </td>
                            <td class="col-md-2">
                                <input type="text" name="p" maxlength="750" minlength="2" value="{{ $content[13]->p }}" class="form-control" required>
                            </td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td class="text-capitalize"> Black Strip - Button Name </td>
                            <td class=""> {{ $content[13]->h2 }} </td>
                            <td>
                                <input tupe="text" name="h2" maxlength="750" minlength="2" value="{{ $content[13]->h2 }}" class="form-control" required>
                            </td>
                        </tr>

                        <tr>
                            <td>4</td>
                            <td class="text-capitalize"> Black Strip - Button Url </td>
                            <td class=""> {{ $content[13]->url }} </td>
                            <td>
                                <input tupe="text" name="url" id="" maxlength="750" minlength="2" value="{{ $content[13]->url }}" class="form-control">
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="form-group text-center">
                    <br> <br>
                    <button class="btn btn-lg btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Update</button>
                </div>
            </form>

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>

<!-- 1st Two Section -->
<div class="col-md-12">
    <div class="box box-primary collapsed-box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title"> 1st Two Section - Setting </h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus fa-lg"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <form action="{{ route('content.change') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <input type="hidden" name="id" value="{{ $content[14]->id }}">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="10">#</th>
                            <th width="180">Name</th>
                            <th width="350">Preview</th>
                            <th width="350">Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td class="text-capitalize"> 1st Two Section - heading </td>
                            <td class=""> {{ $content[14]->h1 }} </td>
                            <td>
                                <textarea name="h1" id="" maxlength="750" minlength="2" cols="50" rows="5">{{ $content[14]->h1 }}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td class="text-capitalize"> 1st Two Section - Image </td>
                            <td class=""> <img src="{{ asset('img/' . $content[14]->img ) }}" alt="pic" style="width:80px;height:80px;"> </td>
                            <td class="col-md-2">
                                <input type="file" name="img" value="{{ $content[14]->img }}" class="form-control">
                                @error('img')
                                <span class="invalid-feedback text-red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td class="text-capitalize"> 1st Two Section - Paragraph </td>
                            <td class=""> {{ $content[14]->p }} </td>
                            <td>
                                <textarea name="p" id="" maxlength="750" minlength="2" cols="50" rows="5">{{ $content[14]->p }}</textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="form-group text-center">
                    <br> <br>
                    <button class="btn btn-lg btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Update</button>
                </div>
            </form>

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>

<!-- 2nd Two Section -->
<div class="col-md-12">
    <div class="box box-primary collapsed-box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title"> 2nd Two Section - Setting </h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus fa-lg"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <form action="{{ route('content.change') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <input type="hidden" name="id" value="{{ $content[15]->id }}">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="10">#</th>
                            <th width="180">Name</th>
                            <th width="350">Preview</th>
                            <th width="350">Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td class="text-capitalize"> 2nd Two Section - heading </td>
                            <td class=""> {{ $content[15]->h1 }} </td>
                            <td>
                                <textarea name="h1" id="" maxlength="750" minlength="2" cols="50" rows="5">{{ $content[15]->h1 }}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td class="text-capitalize"> 2nd Two Section - Image </td>
                            <td class=""> <img src="{{ asset('img/' . $content[15]->img ) }}" alt="pic" style="width:80px;height:80px;"> </td>
                            <td class="col-md-2">
                                <input type="file" name="img" value="{{ $content[15]->img }}" class="form-control">
                                @error('img')
                                <span class="invalid-feedback text-red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td class="text-capitalize"> 2nd Two Section - Paragraph </td>
                            <td class=""> {{ $content[15]->p }} </td>
                            <td>
                                <textarea name="p" id="" maxlength="750" minlength="2" cols="50" rows="5">{{ $content[15]->p }}</textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="form-group text-center">
                    <br> <br>
                    <button class="btn btn-lg btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Update</button>
                </div>
            </form>

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>

<!-- Testimonials -->
<div class="col-md-12">
    <div class="box box-primary collapsed-box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title"> Testimonials - Setting</h3>

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
                            <li class="active"><a href="#testimonial1" data-toggle="tab" aria-expanded="true"> testimonial#1 Setting</a></li>
                            <li class=""><a href="#testimonial2" data-toggle="tab" aria-expanded="false"> testimonial#2 Setting</a></li>
                            <li class=""><a href="#testimonial3" data-toggle="tab" aria-expanded="false"> testimonial#3 Setting</a></li>
                            <li class=""><a href="#testimonial4" data-toggle="tab" aria-expanded="false"> testimonial#4 Setting</a></li>
                        </ul>

                        <div class="tab-content">

                        <div class="tab-pane active" id="testimonial1">
                            <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                                @csrf 
                                <input type="hidden" name="id" value="{{ $content[16]->id }}">
                                <br><br>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" value="{{ $content[16]->h1 }}" name="h1" minlength="4" maxlength="50" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Position </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="h2" cols="70" rows="4" class="form-control" minlength="4" maxlength="50" required value="{{ $content[16]->h2 }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Image </label>
                                    <div class="col-sm-6">
                                        <input type="file" name="img" value="{{ $content[16]->img }}" class="form-control">
                                            @error('img')
                                            <span class="invalid-feedback text-red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ asset('img/' . $content[16]->img ) }}" class="img-circle" style="width:80px;height:80px;">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Comment </label>
                                    <div class="col-sm-6">
                                    <textarea name="p" id="" maxlength="750" minlength="2" cols="50" rows="5" class="form-control">{{ $content[16]->p }}</textarea>
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

                        <div class="tab-pane" id="testimonial2">
                            <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                                @csrf 
                                <input type="hidden" name="id" value="{{ $content[17]->id }}">
                                <br><br>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" value="{{ $content[17]->h1 }}" name="h1" minlength="4" maxlength="50" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Position </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="h2" cols="70" rows="4" class="form-control" minlength="4" maxlength="50" required value="{{ $content[17]->h2 }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Image </label>
                                    <div class="col-sm-6">
                                        <input type="file" name="img" value="{{ $content[17]->img }}" class="form-control">
                                            @error('img')
                                            <span class="invalid-feedback text-red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ asset('img/' . $content[17]->img ) }}" class="img-circle" style="width:80px;height:80px;">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Comment </label>
                                    <div class="col-sm-6">
                                    <textarea name="p" id="" maxlength="750" minlength="2" cols="50" rows="5" class="form-control">{{ $content[17]->p }}</textarea>
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

                        <div class="tab-pane" id="testimonial3">
                            <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                                @csrf 
                                <input type="hidden" name="id" value="{{ $content[18]->id }}">
                                <br><br>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" value="{{ $content[18]->h1 }}" name="h1" minlength="4" maxlength="50" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Position </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="h2" cols="70" rows="4" class="form-control" minlength="4" maxlength="50" required value="{{ $content[18]->h2 }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Image </label>
                                    <div class="col-sm-6">
                                        <input type="file" name="img" value="{{ $content[18]->img }}" class="form-control">
                                            @error('img')
                                            <span class="invalid-feedback text-red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ asset('img/' . $content[18]->img ) }}" class="img-circle" style="width:80px;height:80px;">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Comment </label>
                                    <div class="col-sm-6">
                                    <textarea name="p" id="" maxlength="750" minlength="2" cols="50" rows="5" class="form-control">{{ $content[18]->p }}</textarea>
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

                        <div class="tab-pane" id="testimonial4">
                            <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                                @csrf 
                                <input type="hidden" name="id" value="{{ $content[19]->id }}">
                                <br><br>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" value="{{ $content[19]->h1 }}" name="h1" minlength="4" maxlength="50" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Position </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="h2" cols="70" rows="4" class="form-control" minlength="4" maxlength="50" required value="{{ $content[19]->h2 }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Image </label>
                                    <div class="col-sm-6">
                                        <input type="file" name="img" value="{{ $content[19]->img }}" class="form-control">
                                            @error('img')
                                            <span class="invalid-feedback text-red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ asset('img/' . $content[19]->img ) }}" class="img-circle" style="width:80px;height:80px;">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Comment </label>
                                    <div class="col-sm-6">
                                    <textarea name="p" id="" maxlength="750" minlength="2" cols="50" rows="5" class="form-control">{{ $content[19]->p }}</textarea>
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

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>


<!-- Team -->
<div class="col-md-12">
    <div class="box box-primary collapsed-box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title"> Team - Setting</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus fa-lg"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <div class="col-md-12">
                <h4> <b>Team main heading:</b> </h4>
                <div class="text-capitalize col-md-4"> Team - heading </div>

                <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $content[20]->id }}">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-sm-6 col-xs-8">
                                <textarea name="h1" id="" maxlength="750" minlength="2" cols="50" rows="3">{{ $content[20]->h1 }}</textarea>
                            </div>
                        </div>  
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-square-o fa-lg"></i></button>
                    </div>
                </form>

            </div>

            <div class="row">
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#team1" data-toggle="tab" aria-expanded="true"> team#1 Setting</a></li>
                            <li class=""><a href="#team2" data-toggle="tab" aria-expanded="false"> team#2 Setting</a></li>
                            <li class=""><a href="#team3" data-toggle="tab" aria-expanded="false"> team#3 Setting</a></li>
                            <li class=""><a href="#team4" data-toggle="tab" aria-expanded="false"> team#4 Setting</a></li>
                        </ul>

                        <div class="tab-content">

                        <div class="tab-pane active" id="team1">
                            <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                                @csrf 
                                <input type="hidden" name="id" value="{{ $content[21]->id }}">
                                <br><br>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" value="{{ $content[21]->h1 }}" name="h1" minlength="4" maxlength="50" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Position </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="h2" cols="70" rows="4" class="form-control" minlength="4" maxlength="50" required value="{{ $content[21]->h2 }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Image </label>
                                    <div class="col-sm-6">
                                        <input type="file" name="img" value="{{ $content[21]->img }}" class="form-control">
                                            @error('img')
                                            <span class="invalid-feedback text-red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ asset('img/' . $content[21]->img ) }}" class="img-circle" style="width:80px;height:80px;">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Website </label>
                                    <div class="col-sm-6">
                                    <input type="text" name="url" value="{{ $content[21]->url }}" maxlength="750" minlength="2" cols="50" rows="5" class="form-control">
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

                        <div class="tab-pane" id="team2">
                            <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                                @csrf 
                                <input type="hidden" name="id" value="{{ $content[22]->id }}">
                                <br><br>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" value="{{ $content[22]->h1 }}" name="h1" minlength="4" maxlength="50" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Position </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="h2" cols="70" rows="4" class="form-control" minlength="4" maxlength="50" required value="{{ $content[22]->h2 }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Image </label>
                                    <div class="col-sm-6">
                                        <input type="file" name="img" value="{{ $content[22]->img }}" class="form-control">
                                            @error('img')
                                            <span class="invalid-feedback text-red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ asset('img/' . $content[22]->img ) }}" class="img-circle" style="width:80px;height:80px;">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Website </label>
                                    <div class="col-sm-6">
                                    <input type="text" name="url" value="{{ $content[22]->url }}" maxlength="750" minlength="2" cols="50" rows="5" class="form-control">
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

                        <div class="tab-pane" id="team3">
                            <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                                @csrf 
                                <input type="hidden" name="id" value="{{ $content[23]->id }}">
                                <br><br>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" value="{{ $content[23]->h1 }}" name="h1" minlength="4" maxlength="50" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Position </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="h2" cols="70" rows="4" class="form-control" minlength="4" maxlength="50" required value="{{ $content[23]->h2 }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Image </label>
                                    <div class="col-sm-6">
                                        <input type="file" name="img" value="{{ $content[23]->img }}" class="form-control">
                                            @error('img')
                                            <span class="invalid-feedback text-red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ asset('img/' . $content[23]->img ) }}" class="img-circle" style="width:80px;height:80px;">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Website </label>
                                    <div class="col-sm-6">
                                    <input type="text" name="url" value="{{ $content[23]->url }}" maxlength="750" minlength="2" cols="50" rows="5" class="form-control">
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

                        <div class="tab-pane" id="team4">
                            <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                                @csrf 
                                <input type="hidden" name="id" value="{{ $content[24]->id }}">
                                <br><br>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" value="{{ $content[24]->h1 }}" name="h1" minlength="4" maxlength="50" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Position </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="h2" cols="70" rows="4" class="form-control" minlength="4" maxlength="50" required value="{{ $content[24]->h2 }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Image </label>
                                    <div class="col-sm-6">
                                        <input type="file" name="img" value="{{ $content[24]->img }}" class="form-control">
                                            @error('img')
                                            <span class="invalid-feedback text-red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ asset('img/' . $content[24]->img ) }}" class="img-circle" style="width:80px;height:80px;">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Website </label>
                                    <div class="col-sm-6">
                                    <input type="text" name="url" value="{{ $content[24]->url }}" maxlength="750" minlength="2" cols="50" rows="5" class="form-control">
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

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>

<!-- Clients -->
<div class="col-md-12">
    <div class="box box-primary collapsed-box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title"> Clients - Setting</h3>

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
                            <li class="active"><a href="#client1" data-toggle="tab" aria-expanded="true"> client#1 Setting</a></li>
                            <li class=""><a href="#client2" data-toggle="tab" aria-expanded="false"> client#2 Setting</a></li>
                            <li class=""><a href="#client3" data-toggle="tab" aria-expanded="false"> client#3 Setting</a></li>
                            <li class=""><a href="#client4" data-toggle="tab" aria-expanded="false"> client#4 Setting</a></li>
                            <li class=""><a href="#client5" data-toggle="tab" aria-expanded="false"> client#5 Setting</a></li>
                            <li class=""><a href="#client6" data-toggle="tab" aria-expanded="false"> client#6 Setting</a></li>
                        </ul>

                        <div class="tab-content">

                        <div class="tab-pane active" id="client1">
                            <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                                @csrf 
                                <input type="hidden" name="id" value="{{ $content[25]->id }}">
                                <br><br>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" value="{{ $content[25]->h1 }}" name="h1" minlength="4" maxlength="50" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Image </label>
                                    <div class="col-sm-6">
                                        <input type="file" name="img" value="{{ $content[25]->img }}" class="form-control">
                                            @error('img')
                                            <span class="invalid-feedback text-red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ asset('img/' . $content[25]->img ) }}" class="img-thumbnail" style="width:80px;height:80px;">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Website </label>
                                    <div class="col-sm-6">
                                    <input type="text" name="url" value="{{ $content[25]->url }}" maxlength="750" minlength="2" cols="50" rows="5" class="form-control">
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

                        <div class="tab-pane" id="client2">
                            <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                                @csrf 
                                <input type="hidden" name="id" value="{{ $content[26]->id }}">
                                <br><br>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" value="{{ $content[26]->h1 }}" name="h1" minlength="4" maxlength="50" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Image </label>
                                    <div class="col-sm-6">
                                        <input type="file" name="img" value="{{ $content[26]->img }}" class="form-control">
                                            @error('img')
                                            <span class="invalid-feedback text-red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ asset('img/' . $content[26]->img ) }}" class="img-thumbnail" style="width:80px;height:80px;">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Website </label>
                                    <div class="col-sm-6">
                                    <input type="text" name="url" value="{{ $content[26]->url }}" maxlength="750" minlength="2" cols="50" rows="5" class="form-control">
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

                        <div class="tab-pane" id="client3">
                            <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                                @csrf 
                                <input type="hidden" name="id" value="{{ $content[27]->id }}">
                                <br><br>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" value="{{ $content[27]->h1 }}" name="h1" minlength="4" maxlength="50" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Image </label>
                                    <div class="col-sm-6">
                                        <input type="file" name="img" value="{{ $content[27]->img }}" class="form-control">
                                            @error('img')
                                            <span class="invalid-feedback text-red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ asset('img/' . $content[27]->img ) }}" class="img-thumbnail" style="width:80px;height:80px;">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Website </label>
                                    <div class="col-sm-6">
                                    <input type="text" name="url" value="{{ $content[27]->url }}" maxlength="750" minlength="2" cols="50" rows="5" class="form-control">
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

                        <div class="tab-pane" id="client4">
                            <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                                @csrf 
                                <input type="hidden" name="id" value="{{ $content[28]->id }}">
                                <br><br>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" value="{{ $content[28]->h1 }}" name="h1" minlength="4" maxlength="50" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Image </label>
                                    <div class="col-sm-6">
                                        <input type="file" name="img" value="{{ $content[28]->img }}" class="form-control">
                                            @error('img')
                                            <span class="invalid-feedback text-red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ asset('img/' . $content[28]->img ) }}" class="img-thumbnail" style="width:80px;height:80px;">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Website </label>
                                    <div class="col-sm-6">
                                    <input type="text" name="url" value="{{ $content[28]->url }}" maxlength="750" minlength="2" cols="50" rows="5" class="form-control">
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

                        <div class="tab-pane" id="client5">
                            <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                                @csrf 
                                <input type="hidden" name="id" value="{{ $content[29]->id }}">
                                <br><br>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" value="{{ $content[29]->h1 }}" name="h1" minlength="4" maxlength="50" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Image </label>
                                    <div class="col-sm-6">
                                        <input type="file" name="img" value="{{ $content[29]->img }}" class="form-control">
                                            @error('img')
                                            <span class="invalid-feedback text-red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ asset('img/' . $content[29]->img ) }}" class="img-thumbnail" style="width:80px;height:80px;">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Website </label>
                                    <div class="col-sm-6">
                                    <input type="text" name="url" value="{{ $content[29]->url }}" maxlength="750" minlength="2" cols="50" rows="5" class="form-control">
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

                        <div class="tab-pane" id="client6">
                            <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                                @csrf 
                                <input type="hidden" name="id" value="{{ $content[30]->id }}">
                                <br><br>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" value="{{ $content[30]->h1 }}" name="h1" minlength="4" maxlength="50" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Image </label>
                                    <div class="col-sm-6">
                                        <input type="file" name="img" value="{{ $content[30]->img }}" class="form-control">
                                            @error('img')
                                            <span class="invalid-feedback text-red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ asset('img/' . $content[30]->img ) }}" class="img-thumbnail" style="width:80px;height:80px;">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"> Website </label>
                                    <div class="col-sm-6">
                                    <input type="text" name="url" value="{{ $content[30]->url }}" maxlength="750" minlength="2" cols="50" rows="5" class="form-control">
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

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>

<!-- FAQ -->
<div class="col-md-12">
    <div class="box box-primary collapsed-box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title"> FAQ - Setting</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus fa-lg"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <div class="col-md-12">
                <h4> <b>FAQ main heading:</b> </h4>
                <div class="text-capitalize col-md-4"> FAQ - heading </div>

                <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $content[31]->id }}">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-sm-6 col-xs-8">
                                <textarea name="h1" id="" maxlength="750" minlength="2" cols="50" rows="3">{{ $content[31]->h1 }}</textarea>
                            </div>
                        </div>  
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-square-o fa-lg"></i></button>
                    </div>
                </form>

            </div>

            <div class="row">
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#faq1" data-toggle="tab" aria-expanded="true"> faq#1 Settings</a></li>
                            <li class=""><a href="#faq2" data-toggle="tab" aria-expanded="false"> faq#2 Settings</a></li>
                            <li class=""><a href="#faq3" data-toggle="tab" aria-expanded="false"> faq#3 Settings</a></li>
                            <li class=""><a href="#faq4" data-toggle="tab" aria-expanded="false"> faq#4 Settings</a></li>
                            <li class=""><a href="#faq5" data-toggle="tab" aria-expanded="false"> faq#5 Settings</a></li>
                            <li class=""><a href="#faq6" data-toggle="tab" aria-expanded="false"> faq#6 Settings</a></li>
                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane active" id="faq1">
                                <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                                    @csrf 
                                    <input type="hidden" name="id" value="{{ $content[32]->id }}">
                                    <br><br>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Question</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" value="{{ $content[32]->h1 }}" name="h1" minlength="4" maxlength="50" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Answer</label>
                                        <div class="col-sm-6">
                                            <textarea name="p" cols="70" rows="4" class="form-control" minlength="4" maxlength="50" required>{{ $content[32]->p }}</textarea>
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
          
                            <div class="tab-pane" id="faq2">
                                <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                                    @csrf 
                                    <input type="hidden" name="id" value="{{ $content[33]->id }}">
                                    <br><br>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Question</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" value="{{ $content[33]->h1 }}" name="h1" minlength="4" maxlength="50" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Answer</label>
                                        <div class="col-sm-6">
                                            <textarea name="p" cols="70" rows="4" class="form-control" minlength="4" maxlength="50" required>{{ $content[33]->p }}</textarea>
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

                            <div class="tab-pane" id="faq3">
                                <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                                    @csrf 
                                    <input type="hidden" name="id" value="{{ $content[34]->id }}">
                                    <br><br>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Question</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" value="{{ $content[34]->h1 }}" name="h1" minlength="4" maxlength="50" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Answer</label>
                                        <div class="col-sm-6">
                                            <textarea name="p" cols="70" rows="4" class="form-control" minlength="4" maxlength="50" required>{{ $content[34]->p }}</textarea>
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

                            <div class="tab-pane" id="faq4">
                                <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                                    @csrf 
                                    <input type="hidden" name="id" value="{{ $content[35]->id }}">
                                    <br><br>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Question</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" value="{{ $content[35]->h1 }}" name="h1" minlength="4" maxlength="50" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Answer</label>
                                        <div class="col-sm-6">
                                            <textarea name="p" cols="70" rows="4" class="form-control" minlength="4" maxlength="50" required>{{ $content[35]->p }}</textarea>
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

                            <div class="tab-pane" id="faq5">
                                <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                                    @csrf 
                                    <input type="hidden" name="id" value="{{ $content[36]->id }}">
                                    <br><br>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Question</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" value="{{ $content[36]->h1 }}" name="h1" minlength="4" maxlength="50" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Answer</label>
                                        <div class="col-sm-6">
                                            <textarea name="p" cols="70" rows="4" class="form-control" minlength="4" maxlength="50" required>{{ $content[36]->p }}</textarea>
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

                            <div class="tab-pane" id="faq6">
                                <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                                    @csrf 
                                    <input type="hidden" name="id" value="{{ $content[37]->id }}">
                                    <br><br>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Question</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" value="{{ $content[37]->h1 }}" name="h1" minlength="4" maxlength="50" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Answer</label>
                                        <div class="col-sm-6">
                                            <textarea name="p" cols="70" rows="4" class="form-control" minlength="4" maxlength="50" required>{{ $content[37]->p }}</textarea>
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

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>


@endsection