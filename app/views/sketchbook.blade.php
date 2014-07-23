@extends('base')

@section('title')
{{"Sketchbook"}}
@stop


@section('end-js')
    <script type="text/JavaScript" src={{ asset("assets/js/SketchbookEvents.js") }}></script>
@stop


@section('styles')
	<link rel="stylesheet" href={{ asset("assets/css2/SketchbookStyles.css")}}> 
@stop


@section('body')
<!--darkens the page to make it seem like it fades into the bg 
when viewing an image-->
<div id="blanket"></div>
<div id="sketch-popup">

</div>

<div class="center">
    <ul class="book-wrap">

  @foreach($sketches as $sketch)
        <?php $aDate=explode("-", $sketch->date_created) ?>
        @if ($aDate[0] !=$currYear)
         <hr>
            <li class="year-text">{{$aDate[0]}}</li>
            <li class="diag-thumb first-thumb"  id="{{url('/sketchbook/'.$sketch->id)}}" >
            @if($currYear=$aDate[0])@endif
        @else
            <li class="diag-thumb" id="{{url('/sketchbook/'.$sketch->id)}}" >
        @endif
            <img class="diag-thumb-img"  src="{{Config::get('globals.THUMB_URL').'ICON_'.$sketch->file_name}}">
        </li>
    @endforeach

    </ul>
    </div>
@stop
