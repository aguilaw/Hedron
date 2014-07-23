@extends('base')

@section('title')
{{"Gallery"}}
@stop


@section('end-js')
    <script type="text/JavaScript" src={{ asset("assets/js/SketchbookEvents.js") }}></script>
@stop


@section('styles')
	<link rel="stylesheet" href={{ asset("assets/css2/GalleryStyles.css")}}> 
@stop


@section('body')
<!--darkens the page to make it seem like it fades into the bg 
when viewing an image-->
<div id="blanket"></div>
<div id="sketch-popup">
</div>

<script>
            var FEAT_THUMB_URL="{{Config::get('globals.THUMB_URL')}}"; 
            var GALLERY_URL="{{Config::get('globals.GALLERY_URL')}}"; 
            var gallery={{$gallery->toJson() }};
    </script>
    
<ul class="wall">
    <li class="frame"></li>
    <li class="frame"></li>
    <li class="frame"></li>
</ul>
@stop
