@extends('user.master')

@section('content')
<style>
.p-4 {padding: 90px;}
.m-4 {margin: 4px;}
.my-4 {margin: 50px 0px;}
.md-4 {margin: 0px 0px 50px 0px;}
.mt-4 {margin: 50px 0px 0px 0px;}
.py-4 {padding: 50px 0px;}
.limited-txt {
    display: inline-block;
    width: 180px;
    white-space: nowrap;
    overflow: hidden !important;
    text-overflow: ellipsis;
}

</style>

<!-- 
@if($errors->any())
<h4> {{ $errors->first() }} </h4>
@endif -->

<!-- <div class="container">
    <form method="POST" action="{{ route('processFile') }}" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file_name">
        <button type="submit" class="btn btn-default">Upload to Cloud</button>
    </form>
</div> -->

<div class="row">
    <div class="col-md-12">
        <!-- The time line -->
        <ul class="timeline">
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

                    <div class="timeline-body">
                        <input type="file" class="btn btn-primary" name="file_name" disabled>
                    </div>
                    <div class="timeline-footer">
                        <button type="submit" class="btn btn-primary btn-md" disabled>Upload to Cloud</button>
                    </div>
                </form>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            @if($errors->any())
            <li>
                <i class="fa fa-exclamation-circle bg-red"></i>
                <div class="timeline-item">

                    <h3 class="timeline-header"> Error!! </h3>

                    <div class="timeline-body">
                        <h4> {{ $errors->first() }} </h4>
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
                <span class="bg-green md-4">
                    2. Pay for it
                </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
                <i class="fa fa-dollar bg-green"></i>

                <form method="POST" action="{{ route('payment.verify') }}" enctype="multipart/form-data" class="timeline-item">
                    @csrf
                    <h3 class="timeline-header"> Payment Method</h3>

                    <div class="timeline-body">
                        <input type="text" class="" name="price" disabled>
                    </div>
                    <div class="timeline-footer">
                        <button type="submit" class="btn btn-success btn-md" disabled>Pay</button>
                    </div>
                </form>
            </li>

            @if($errors->any())
            <li>
                <i class="fa fa-exclamation-circle bg-red"></i>
                <div class="timeline-item">

                    <h3 class="timeline-header"> Error!! </h3>

                    <div class="timeline-body">
                        <h4> {{ $errors->first() }} </h4>
                    </div>
                    <div class="timeline-footer">
                        <!-- <a class="btn btn-danger btn-flat btn-xs">View comment</a> -->
                    </div>
                </div>
            </li>
            @endif
            <!-- END timeline item -->


            <!-- Download it -->
            <li class="time-label my-4">
                <span class="bg-yellow md-4">
                    3. Download
                </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
                <i class="fa fa-arrow-circle-down bg-yellow"></i>
                <form method="get" action="#" enctype="multipart/form-data" class="timeline-item">
                    @csrf
                    <h3 class="timeline-header"> Download your file(s)</h3>

                    @foreach( $file as $key => $value )
                    <div class="timeline-body">
                        <div class="row">
                            <div class="col-md-3">
                                <span class="mailbox-attachment-icon"><i class="fa fa-file-code-o"></i></span>

                                <div class="mailbox-attachment-info">
                                    <a href="{{ $file[0]['download_url'] }}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                                        <div class="limited-txt">    
                                            {{ $file[$key]['file_name'] }}
                                        </div>
                                    </a>
                                    <span class="mailbox-attachment-size">
                                        {{ $file[$key]['file_size'] }}
                                        <!-- <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a> -->
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-footer">
                        <a href="{{ $file[$key]['download_url'] }}" class="btn btn-warning btn-flat btn-xs">Download</a>
                    </div>
                    <hr>
                    @endforeach
                </form>
            </li>
            <!-- END timeline item -->

            <li>
                <a id="#download"></a>
                <i class="fa  fa-heart bg-red"></i>
            </li>
        </ul>
    </div>
    <!-- /.col -->
</div>

@endsection