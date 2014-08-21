@extends('base')

@section('title')
{{"Sketchbook"}}
@stop


@section('end-js')
    <script type="text/JavaScript" src={{ asset("assets/js/GalleryEvents.js") }}></script>
    @if($toShow != null)
    <script>
        loadGalleryImg("{{url('/sketchbook/'.$toShow->id)}}");
    </script>
@endif
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
    <div class="bubble " >
		<div class="pointer-big" ></div>
        <p id="sketch-intro">Welcome to the gallery.</p><p> Here is a quick glance at some of my work.</p>
</div>
    <ul class="book-wrap">

  @foreach($images as $image)
        
            <li class="diag-thumb" id="{{url('/sketchbook/'.$image->id)}}" >

            <img class="diag-thumb-img"  src="{{Config::get('globals.THUMB_URL').'ICON_'.$image->file_name}}">
        </li>
    @endforeach
        
    </ul>
   <a id="to-sketch" href="{{ url('sketchbook') }}"> <p >To the skethbook! <i class="fa fa-chevron-circle-right fa-2x"></i></p></a>
@stop
