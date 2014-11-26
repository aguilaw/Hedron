@extends('base')

@section('title')
{{"Gallery"}}
@stop

@section('js')
   
@stop
@section('end-js')
   <script type="text/JavaScript" src={{ asset("assets/js/SketchbookEvents.js") }}></script> 
  @if($toShow != null)
  <script>loadSketch("{{url('/sketchbook/'.$toShow->id)}}");</script>
    @endif 
@stop


@section('styles')

    	
@stop


@section('body')
<!--darkens the page to make it seem like it fades into the bg 
when viewing an image-->

<script>
    var FEAT_THUMB_URL="{{Config::get('globals.GALLERY_URL')}}"; 
    var GALLERY_URL="{{Config::get('globals.GALLERY_URL')}}"; 
</script>
 <div id="header-band-ext">
    <img class="logo-sm" src={{asset("assets/home/logo-sm.png")}} >
     <div id="hedron-speech"><div class="bubble-pointer"></div><p>Ah yes... the good'ol sketchbook. It contains everything from napkin doodles to illustrations that didn't quite make the cut.</p></div>
     </div>
<div class="center">
   

    <div class="view">   
        <div id="frame">
            <i class="close-bttn fa fa-times-circle fa-2x"></i>
            <div id="img-frame"></div>
        </div> 
        <ul class="book-wrap">
            @foreach($images as $image)
                <?php $aDate=explode("-", $image->date_created) ?>
            @if ($aDate[0] !=$currYear)
             <hr>
                <li class="year-text">{{$aDate[0]}}</li>
                <li class="diag-thumb first-thumb"  id="{{url('/sketchbook/'.$image->id)}}" >
                @if($currYear=$aDate[0])@endif
            @else
                <li class="diag-thumb" id="{{url('/sketchbook/'.$image->id)}}" >
            @endif
                <img class="diag-thumb-img"  src="{{ asset('assets/gallery/thumb').'/ICON_'.$image->file_name}}">
            </li>
             @endforeach
             <hr>
             <li><div class="bubble-sm" >
             
            <p id="sketch-intro">Need More? How about checking out the social networks?</p>
    </div></li>
        </ul>

     </div>
</div> 
 
@stop
