@extends('user.master')

@section('content')


<div class="row">
    <div class="col-md-12">
        <!-- The time line -->
        <ul class="timeline">
            <a id="upload"></a>
            <!-- timeline time label -->
            <li class="time-label my-4">
                <span class="bg-blue md-4">
                    1. Upload a file
                </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
                <i class="fa fa-file-text bg-blue"></i>

                <form method="POST" action="{{ route('processFile') }}" enctype="multipart/form-data" class="timeline-item">
                    @csrf
                    <h3 class="timeline-header"> Upload a Json file</h3>
        
                    <input type="file" name="file_name">

                    <div class="timeline-footer">
                        <button type="submit" class="btn btn-primary btn-md"> Process my file </button>
                    </div>
                    
                </form>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            @if( $errors->file->any() )
                <li>
                    <i class="fa fa-exclamation-circle bg-red"></i>
                    <div class="timeline-item">

                        <h3 class="timeline-header"> Error!! </h3>

                        <div class="timeline-body">
                            <h4> {{ $errors->file->first() }} </h4>
                        </div>
                        <div class="timeline-footer">
                            <!-- <a class="btn btn-danger btn-flat btn-xs">View comment</a> -->
                        </div>
                    </div>
                </li>
                
            @endif
            <!-- END timeline item -->

            <!-- Pay for it -->
            <li class="time-label my-4">
                <span class="bg-gray md-4">
                    2. Pay for it
                </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
                <i class="fa fa-dollar bg-gray"></i>

                <div class="timeline-item">
                    <h3 class="timeline-header"> Check out </h3>

                    <div class="timeline-body">
                        <input type="text" disabled>
                    </div>
                </div>
            </li>
            <!-- END timeline item -->


            <!-- Download it -->
            <li class="time-label my-4">
                <a id="download"></a>
                <span class="bg-gray md-4">
                    3. Download
                </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
                <i class="fa fa-arrow-circle-down bg-gray"></i>

                <div class="timeline-item">
                <a id="#payment">
                    <h3 class="timeline-header"> Download your file</h3>
                </a>
                    <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                    </div>
                    <div class="timeline-footer">
                        <!-- <a class="btn btn-warning btn-flat btn-xs">Download</a> -->
                    </div>
                </div>
            </li>
            <!-- END timeline item -->

            <li>
                <i class="fa  fa-heart bg-gray"></i>
            </li>
        </ul>
    </div>
    <!-- /.col -->
</div>

@endsection