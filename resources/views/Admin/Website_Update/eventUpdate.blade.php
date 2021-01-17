@extends('layouts.master')

@section('style')
    <style>
        .panel-heading.note-toolbar {
            background: #f0ffff !important;
        }
    </style>
@stop


@section('content')
    <div class="container-fluid">
        <events-component></events-component>
    </div>
@stop

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 200,                 // set editor height
                placeholder: 'Hello Summernote',
                tabsize: 2,
                focus: true,                 // set focus to editable area after initializing summernote
            });
            $('#summernoteEdit').summernote({
                dialogsInBody: true,
                //,airMode: true
                height: 200,                 // set editor height
                placeholder: 'Hello Summernote',
                tabsize: 2,
                focus: true,                 // set focus to editable area after initializing summernote
            });
        });
    </script>
@stop 
 
