@extends('app')
@section('header-mssg')
<h2 class="speech">Edit <span class="mini">{{ $artwork->title }}</span></h2>
@endsection
@section('content')
     <a class="btn btn-submit" href={{ route('createArtwork_path') }}><i class="fa  fa-plus not-selected-icon"></i>Create</a>

    <section class=" form-wrap span_5_of_8 ">
    {!! Form::model($artwork, ['route' => ['artworkEdit_path', $artwork->slug], 'method'=>'PATCH','files'=>true])!!}
        @include('artworks._form')
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
