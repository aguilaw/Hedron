@extends('app')
@section('content')
<div class="section span_8_of_8">
<header>
    <h1 class="underline"> All Artworks </h1>
   <a class="btn btn-submit" href={{ route('createArtwork_path') }}><i class="fa  fa-plus not-selected-icon"></i>Create</a>
</header>
<ul class="gallery-view">
    @foreach($artworks as $artwork)
    <li class="artwork span_2_of_8">
    <div class="quick-info">
        <span class="border-right"><i class="fa fa-diamond @if( $artwork->featured) selected-icon @else not-selected-icon @endif"></i></span>
        <a  href={{ route('deleteArtwork_path',[$artwork->slug]) }} ><i class="fa fa-times"></i></a>
        </a >
    </div>
    <a href={{ route('editArtwork_path',[$artwork->slug])}}>
        <div class="thumbnail" style={!! "background:url(../images/gallery/".$artwork->file_name.")no-repeat;background-position:center;background-size:cover;" !!}></div>
    </a>

    </li>
    @endforeach
</ul>
</div>
@stop
