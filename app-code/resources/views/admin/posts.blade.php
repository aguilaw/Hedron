@extends('app')

@section('header-mssg')
<h2 class="speech">All Thoughts</h2>
@endsection

@section('content')
	<div class="section span_8_of_8">
	   <a class="btn btn-submit" href={{ route('createPost_path') }}><i class="fa  fa-plus"></i>Create</a>
	<ul class="gallery-view">
	    @foreach($posts as $post)

	    <li class="post span_2_of_8">
			<a href={{ route('editPost_path',[$post->id]) }} >
			    <div class="quick-info underline">
					<i class="fa fa-2x selected-icon {{$post->icon_class}}"></i>
					<span class="border-right"><span>{{$post->date_created}}</span></span>

			        <a  href={{ route('deletePost_path',[$post->id]) }} ><i class="fa fa-times"></i></a>
			    </div>
		        <div class="message">
					{{$post->message}}
				</div>
		    </a>
	    </li>
	    @endforeach
	</ul>
	</div>
@stop
