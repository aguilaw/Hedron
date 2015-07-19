@extends('app')
@section('header-mssg')
<h2 class="speech">All Artworks</h2>
@endsection

@section('content')
<div class="section span_8_of_8">
   <a class="btn btn-submit" href={{ route('createArtwork_path') }}><i class="fa  fa-plus not-selected-icon"></i>Create</a>
<ul class="gallery-view">
    @foreach($artworks as $artwork)
    <li class="artwork span_1_of_8">
    <div class="quick-info">
        <span class="border-right"><i class="fa fa-diamond @if( $artwork->featured) selected-icon @else not-selected-icon @endif"></i></span>
        <a  href={{ route('deleteArtwork_path',[$artwork->slug]) }} ><i class="fa fa-times"></i></a>
        </a >
        <p>{{$artwork->title}}</p>
    </div>
    <a href={{ route('editArtwork_path',[$artwork->slug])}}>
        <div class="thumbnail" style={!! "background:url(../images/gallery/".$artwork->file_name.")no-repeat;background-position:center;background-size:cover;" !!}></div>
    </a>

    </li>
    @endforeach
</ul>
</div>
@stop
