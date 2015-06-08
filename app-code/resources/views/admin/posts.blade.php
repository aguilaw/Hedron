@extends('app')


@section('content')
	<div class="section span_8_of_8">
	<header>
	    <h1 class="underline"> All Posts </h1>
	   <a class="btn btn-submit" href={{ route('createPost_path') }}><i class="fa  fa-plus"></i>Create</a>
	</header>
	<ul class="gallery-view">
	    @foreach($posts as $post)
	    <li class="post span_2_of_8">
		    <div class="quick-info underline">
				<i class="fa fa-2x selected-icon {{$post->icon_class}}"></i>
				<span class="border-right"><span>{{$post->date_created}}</span></span>

		        <a  href={{ route('deletePost_path',[$post->id]) }} ><i class="fa fa-times"></i></a>
		        </a>
		    </div>
		    <a href={{ route('editPost_path',[$post->id])}}>
		        <div class="message">
					{{$post->message}}
				</div>
		    </a>
	    </li>
	    @endforeach
	</ul>
	</div>
@stop
