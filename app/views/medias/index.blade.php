@extends('layouts.master')

@section('content')
    <div class="page-header">
        <h1>
            Medias
            <button class="btn btn-small btn-success btn-sm" data-toggle="modal" data-target="#mediaUpload">
              <span class="glyphicon glyphicon-plus"></span>
            </button>
        </h1>
    </div>

    <div class="gallery">
        @foreach($medias as $key => $value)
            <div class="thumb">
                <div class="overlay">
                    <h2>{{ $value->name }}</h2>
                    <!-- <a class="glyphicon glyphicon-remove btn-remove" href="{{ URL::to('medias/' . $value->id . '/destroy') }}"></span></a> -->
                    <a class="glyphicon glyphicon-remove btn-remove" data-id="{{$value->id}}" href="#"></span></a>
                </div>
                {{ HTML::image("uploads/thumbs/" . $value->name, $value->name, array('class' => 'ms-item')) }}
            </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div class="modal fade" id="mediaUpload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <form class="uploader">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Upload new file</h4>
                    </div>
                    <div class="modal-body">
                        <!-- The global progress bar -->
                        <div class="progress progress-striped">
                            <div class="progress-bar progress-bar-success app-progress-bar"  role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                <span class="sr-only">45% Complete</span>
                            </div>
                        </div>
                        <div class="app-preview">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <span class="btn btn-primary fileinput-button">
                            <i class="icon-plus icon-white"></i>
                            <span>Select files...</span>
                            <!-- The file input field used as target for the file upload widget -->
                            {{ Form::file('file[]', array('class' => 'app-input-file', 'multiple' => '', 'accept' => 'image/*')) }}
                        </span>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@stop
