@extends('base')

@section('title')
{{"Sketchbook"}}
@stop


@section('js')
    <script type="text/JavaScript" src={{ asset("assets/js/SketchbookEvents.js") }}></script>
@stop


@section('styles')
	<link rel="stylesheet" href={{ asset("assets/css2/SketchbookStyles.css")}}> 
@stop

@section('body')
    <ul class="book-wrap">
    @foreach($sketches as $sketch)
        <li class="diag-thumb">
            <a href={{action('PagesController@ShowSketch',$sketch->id)}}>
            <img class="diag-thumb-img"  src="{{Config::get('globals.THUMB_URL').'/ICON_'.$sketch->file_name}}">
            </a>
        </li>
    @endforeach

    </ul>
@stop
