@extends('app')
@section('header-mssg')
<h2 class="speech">Edit Post<i class={{$post->icon_class}}."fa-icon fa-3x"></i></h2>
@endsection
@section('content')
  <a class="btn btn-submit" href={{ route('createPost_path') }}><i class="fa  fa-plus"></i>Create</a>
    <section class=" form-wrap span_8_of_8 ">
    {!! Form::model($post, ['route' => ['postUpdate_path', $post->id], 'method'=>'PATCH'])!!}
        @include('posts._form');
    {!! Form::close() !!}
    </section>

@stop
