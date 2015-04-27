@extends('app')
@section('content')

<p> displaying all artworks </p>
    @foreach($artworks as $artwork)
        <li class="item">
        <a href= {{ route('editArtwork_path')}}>

        </a>
    	<p>{{$artwork}}</p>
        <a id="delete" href={{ route('deleteArtwork_path')}}>
            <i class="fa fa-times"></i>
        </a >
        <hr>
        </li>
    @endforeach
@stop
