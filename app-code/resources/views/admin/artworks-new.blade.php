@extends('app')

@section('content')
    <h2>Add new Artwork</h2>
    {!! Form::open(['route' => 'artworkStore_path','files'=> true,'autocomplete'=> 'off'])!!}
        @include('artworks._form');
    {!! Form::close() !!}

@stop
