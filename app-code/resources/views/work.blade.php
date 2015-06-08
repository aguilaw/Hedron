@extends('app')

@section('content')
<header class="page-header span_9_of_9 underline">
	<div class="span_5_of_9 center">
		<div class="speech-bubble post-bubble ">
			<p class="speech">Welcome to the gallery.</p><p class="speech"> Here you can flip through some of my work. </p>
		</div>
		<span><img class="hedron-head" src="{{ asset('images/brand/hedron_head_small.png') }}" alt="Hedron" ></span>
	</div>
</header>
<section>
	<ul class="filter-section">
		<label><strong>Show:</strong></label>
	    <li class="filter-option">
	        <input checked="true" type="checkbox" value="illustration"/>
	        <label>Illustration</label>
	    </li>
	    <li class="filter-option">

	        <input checked="true" type="checkbox" value="painting"/>
	        <label>Painting</label>
	    </li>
	    <li class="filter-option">
	        <input checked="true" type="checkbox" value="project"/>
	        <label>Projects</label>
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
					<img class="stretch-image"
					srcset="{{ asset('images/gallery/thumb/'.'425x170_'. $thumbnail->file_name) }} 425w,
							{{ asset('images/gallery/thumb/'.'292x_'. $thumbnail->file_name) }} 292w"
					sizes="(min-width: 30em) 9em, 35em"
					src="{{ asset('images/gallery/thumb/'.'292x_'. $thumbnail->file_name) }}"
					alt="{{ $thumbnail->title}}">
				</a>
			</li>
			@endif
		@endforeach
	</ul>
</section>
@endsection
