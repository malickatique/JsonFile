<table class="table table-bordered">
    <thead>
        <tr>
            <th width="10">#</th>
            <th width="150">Name</th>
            <th width="250">Preview</th>
            <th>Value</th>
            <th width="80" class="text-center">Update</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td class="text-capitalize"> About Us - heading </td>
            <td class=""> {{ $content[0]->h1 }} </td>
            <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $content[0]->id }}">
                <td>
                    <div class="form-group">
                        <div class="col-sm-6 col-xs-8">
                            <textarea name="h1" id="" maxlength="750" minlength="2" cols="50" rows="5">{{ $content[0]->h1 }}</textarea>
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
            <td class="text-capitalize"> About Us - heading 2 </td>
            <td class=""> {{ $content[0]->h2 }} </td>
            <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $content[0]->id }}">
                <td>
                    <div class="form-group">
                        <div class="col-sm-6 col-xs-8">
                            <textarea name="h2" id="" maxlength="750" minlength="2" cols="50" rows="5">{{ $content[0]->h2 }}</textarea>
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
            <td class="text-capitalize"> About Us - Image </td>
            <td class=""> <img src="{{ asset('img/' . $content[0]->img ) }}" alt="pic" style="width:80px;height:80px;"> </td>
            <form class="form-horizontal" method="POST" action="{{ route('content.change') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $content[0]->id }}">
                <td>
                    <div class="form-group">
                        <div class="col-sm-6 col-xs-8">
                            <input type="file" name="img" value="{{ $content[0]->img }}" class="form-control" required>
                                @error('img')
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
            <td class="text-capitalize"> About Us - Paragraph </td>
            <td class=""> {{ $content[0]->p }} </td>
            <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $content[0]->id }}">
                <td>
                    <div class="form-group">
                        <div class="col-sm-6 col-xs-8">
                            <textarea name="p" id="" maxlength="750" minlength="2" cols="50" rows="5">{{ $content[0]->p }}</textarea>
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
            <td class="text-capitalize"> About Us - link </td>
            <td class="">{{ $content[0]->url }}</td>
            <form class="form-horizontal" method="POST" action="{{ route('content.change') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $content[0]->id }}">
                <td>
                    <div class="form-group">
                        <div class="col-sm-6 col-xs-8">
                            <input type="text" name="url" maxlength="190" minlength="2" value="{{ $content[0]->url }}" class="form-control" required>
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

<!-- Services -->
<div class="col-md-12">
    <div class="box box-primary collapsed-box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title"> Services Section - Settings </h3>

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
                    <td class="text-capitalize"> Services - heading </td>
                    <td class=""> {{ $content[0]->h1 }} </td>
                    <td>
                        <textarea name="h1" id="" maxlength="750" minlength="2" cols="50" rows="5">{{ $content[0]->h1 }}</textarea>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td class="text-capitalize"> Services - heading 2 </td>
                    <td class=""> {{ $content[0]->h2 }} </td>
                    <td>
                        <textarea name="h2" id="" maxlength="750" minlength="2" cols="50" rows="5">{{ $content[0]->h2 }}</textarea>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td class="text-capitalize"> Services - Image </td>
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
                    <td>4</td>
                    <td class="text-capitalize"> Services - Paragraph </td>
                    <td class=""> {{ $content[0]->p }} </td>
                    <td>
                        <textarea name="p" id="" maxlength="750" minlength="2" cols="50" rows="5">{{ $content[0]->p }}</textarea>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td class="text-capitalize"> Services - Link </td>
                    <td class=""> {{ $content[0]->url }} </td>
                    <td>
                        <textarea name="url" id="" maxlength="750" minlength="2" cols="50" rows="5">{{ $content[0]->url }}</textarea>
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