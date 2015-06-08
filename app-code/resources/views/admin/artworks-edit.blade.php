@extends('app')

@section('content')
    <header class="admin-header">
        <h1 class="inline">Edit <span class="mini">{{ $artwork->title }}</span></h1>
        <img class="artwork-preview" src= {{ asset('images/gallery/'.$artwork->file_name) }}>
    </header>

    <section class=" form-wrap span_5_of_8 ">
    {!! Form::model($artwork, ['route' => ['artworkEdit_path', $artwork->slug], 'method'=>'PATCH','files'=>true])!!}
        @include('artworks._form');
    {!! Form::close() !!}
    </section>
    <section class="img-preview-panel span_3_of_8">
    <aside class="">
        <img class="draggable-img" id="draggable" src= {{ asset('images/gallery/'.$artwork->file_name) }}>
        <h3>Thumbnail Maker (optional)</h3>
        <p> Drag the image in the box to make a custom thumbnail.</p>
    </aside>
    </section>
@stop
