@extends('app')
@section('header-mssg')
<p class="speech">Welcome to the gallery.</p>
@endsection
@section('content')



<section>
	<ul class="filter-section">
		<label><strong>Show: </strong></label>
	    <li class="filter-option">
	        <input id="illustration" name="illustration" checked="true" type="checkbox" value="illustration"/>
	        <label for="illustration"></label>
			<span>Illustration</span>
	    </li>
	    <li class="filter-option">
	        <input id="painting" name="painting" checked="true" type="checkbox" value="painting"/>
	        <label for="painting"></label>
			<span>Painting</span>
	    </li>
	    <li class="filter-option">
	        <input id="project" name="project" checked="true" type="checkbox" value="project"/>
	        <label for="project"></label>
			<span>Project</span>
	    </li>
	</ul>
</section>

<section>	<ul id="items-to-filter" class="home-grid">
		@foreach($thumbnails as $thumbnail)
			@if( $thumbnail->file_name != null)
			<li class="block img-block" data-type="{{ $thumbnail->type}}">
				<a 	href="{{ asset('images/gallery/'. $thumbnail->file_name) }}"
					data-lightbox="thumbnail"
					data-title="{{$thumbnail->title}}"
					data-date="{{$thumbnail->date_created}}"
					data-description="{{$thumbnail->description}}"
					data-tools="{{$thumbnail->tools}}"
					@if (isset($toShow))
						{{($toShow->slug == $thumbnail->slug)? "class=display-on-load":""}}
					@endif>
					<figure>
						<img class="stretch-image"
						srcset="{{ asset('images/gallery/thumb/'.'425x170_'. $thumbnail->file_name) }} 425w,
								{{ asset('images/gallery/thumb/'.'292x_'. $thumbnail->file_name) }} 292w"
						sizes="(min-width: 30em) 9em, 35em"
						src="{{ asset('images/gallery/thumb/'.'292x_'. $thumbnail->file_name) }}"
						alt="{{ $thumbnail->title}}">
						<figcaption>
							<h2 class="caption-title">{{$thumbnail->title}}</h2>
							<p class="caption-tools">{{$thumbnail->tools}}</p>

						</figcaption>
					</figure>
				</a>
			</li>
			@endif
		@endforeach
	</ul>
</section>
@endsection
