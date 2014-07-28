@extends('base')

@section('title')
{{"Sketchbook"}}
@stop

@section('js')
   <script type="text/JavaScript" src={{ asset("assets/js/autoLoadImg.js") }}></script> 
@stop
@section('end-js')
    <script type="text/JavaScript" src={{ asset("assets/js/GalleryEvents.js") }}></script>
@stop


@section('styles')
	<link rel="stylesheet" href={{ asset("assets/css2/GalleryStyles.css")}}> 
@stop


@section('body')
@if($toShow != null)
    <script>
        loadGalleryImg("{{url('/sketchbook/'.$toShow->id)}}");
    </script>
@endif
<!--darkens the page to make it seem like it fades into the bg 
when viewing an image-->
<div id="blanket"></div>
<div id="sketch-popup">

</div>

<div class="center">
    <ul class="book-wrap">

  @foreach($images as $image)
        
            <li class="diag-thumb" id="{{url('/sketchbook/'.$image->id)}}" >

            <img class="diag-thumb-img"  src="{{Config::get('globals.THUMB_URL').'ICON_'.$image->file_name}}">
        </li>
    @endforeach

    </ul>
    </div>
@stop
