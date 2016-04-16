@extends('default')

@section('css')
<link rel="stylesheet" href="{{url('plugins/camera/css/camera.css')}}">
@stop
@section('contenido')
<div class="content-outer">
    <div id="page-content" class="row page">
            <div class="camera_wrap">
                <div data-src="{{url('images/photos/IMG_01.JPG')}}"></div>
                <div data-src="{{url('images/photos/IMG_02.JPG')}}"></div>
                <div data-src="{{url('images/photos/IMG_03.JPG')}}"></div>
                <div data-src="{{url('images/photos/IMG_04.JPG')}}"></div>
                <div data-src="{{url('images/photos/IMG_05.JPG')}}"></div>
                <div data-src="{{url('images/photos/IMG_06.JPG')}}"></div>
                <div data-src="{{url('images/photos/IMG_07.JPG')}}"></div>
                <div data-src="{{url('images/photos/IMG_08.JPG')}}"></div>
                <div data-src="{{url('images/photos/IMG_09.JPG')}}"></div>
                <div data-src="{{url('images/photos/IMG_11.JPG')}}"></div>
                <div data-src="{{url('images/photos/IMG_12.JPG')}}"></div>
                <div data-src="{{url('images/photos/IMG_13.JPG')}}"></div>
                <div data-src="{{url('images/photos/IMG_14.JPG')}}"></div>
            </div>
    </div>
</div>
@stop

@section('js')
<script src="{{url('plugins/camera/camera.min.js')}}"></script>
<script>
    jQuery('.camera_wrap').camera();
</script>
@stop