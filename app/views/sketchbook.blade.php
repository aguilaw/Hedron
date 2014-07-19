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
<div class="center">
    <ul class="book-wrap">

  @foreach($sketches as $sketch)
        @if($aDate=explode("-", $sketch->date_created))@endif
        @if ($aDate[0] !=$currYear)
        
            <p class="year-text">{{$aDate[0]}}</p>
            <hr>
            @if($currYear=$aDate[0])@endif
        @endif
        <li class="diag-thumb">
            <a href={{action('PagesController@ShowSketch',$sketch->id)}}>
            <img class="diag-thumb-img"  src="{{Config::get('globals.THUMB_URL').'ICON_'.$sketch->file_name}}">
            </a>
        </li>
    @endforeach

    </ul>
    </div>
@stop
