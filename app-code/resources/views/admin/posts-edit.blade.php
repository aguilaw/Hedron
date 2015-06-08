@extends('app')

@section('content')
    <header>
        <h1 class="inline">Edit Post </h1>
        <i class={{$post->icon_class}}."fa-icon fa-3x"></i>
    </header>

    <section class=" form-wrap span_8_of_8 ">
    {!! Form::model($post, ['route' => ['postUpdate_path', $post->id], 'method'=>'PATCH'])!!}
        @include('posts._form');
    {!! Form::close() !!}
    </section>

@stop
