@extends('layouts.admin')





@section('styles') {{-- MUST @yield('styles') at layouts/admin inside <head></head>--}}
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.css"  >

@stop




@section('content')

    <h1>Upload media</h1>


        {!!Form::open(['method'=>'POST','action'=>'Media@store', 'class'=>'dropzone'])!!}

    {{--IMPORTANT: to link the dropzone files we must make a class like above : 'class'=>'dropzone' to make it work--}}

        {!!Form::close()!!}

 @stop



 @section('scripts')

    {{--when we create new section like this one (scripts) we must make @yield('') in source page (layouts.admin)!!--}}

        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.js"></script>

@stop