@extends('app')

@section('content')
    <h2>Add new Post</h2>
    {!! Form::open(['route' => 'postStore_path','autocomplete'=> 'off'])!!}
        @include('posts._form');
    {!! Form::close() !!}

@stop
