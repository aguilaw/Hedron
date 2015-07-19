@extends('app')
@section('header')
@overwrite

@section('navs')
@overwrite

@section('content')
	<section class="hero">
		@include('navs')
		<div class="hero-group">
		<div class=" group hedron-character">
			<img src="{{ asset('images/brand/hedron_girlteen.png') }}" alt="Its me HEDRON!" >
		</div>
		<span class="signature"><img src="{{ asset('images/brand/Hedron_Signiture_Vector.png') }}" alt="Hedron" >
			<div class="tagline">
				<h3>CODE &nbsp&#8226&nbsp DESIGN &nbsp&#8226&nbsp ART</h3>
			</div>
		</span>
		<!-- <div class="group hedron-bubble">
			<div class="speech-bubble main-bubble ">
				<h1>I am </h1>
				<span class="signature"><img src="{{ asset('images/brand/Hedron_Signiture_Vector.png') }}" alt="Hedron" ></span>
				<span class="hide-mobile">
				<h3>A web developer with artistry </h3></span>
			</div>
		</div>
	-->
	</div>
	</section>
	<section class="filler-band">
		<img  class="home-code" src="{{ asset('images/brand/home-code-2.png') }}" alt="Hedron" >
	</section>

	<section class="home-widget span_9_of_9">
		<h2 >Featured</h2>
	<ul class="home-grid">
		@foreach( $items as $item )
			@if($item->file_name != null)
				<li class="block img-block">
				<a class="home-item" href="{{ route('works_path',$item->slug) }}">
				<figure>
					<img class="stretch-image"
					srcset="{{ asset('images/gallery/thumb/'.'425x170_'. $item->file_name) }} 425w,
							{{ asset('images/gallery/thumb/'.'292x_'. $item->file_name) }} 292w"
					sizes="(min-width: 30em) 9em, 35em"
					src="{{ asset('images/gallery/thumb/'.'292x_'. $item->file_name) }}"
					alt="{{ $item->title}}">
					<figcaption>
						<h2 class="caption-title">{{$item->title}}</h2>
						<p class="caption-tools">{{$item->tools}}</p>

					</figcaption>
				</figure>
				</a>
			@else
				<li class="block bubble-margin">
				<div class="post-bubble speech-bubble">
				<div class="underline">
					<i class="fa {{$item->icon_class}}"></i>
					<span>{{$item->date_created}}</span>
				</div>
					<p>{{$item->message}}</p>
				</div>
			@endif
			</li>
		@endforeach
			<li class=" block">
				<img src="{{ asset('images/brand/hedron-runs-large.gif') }}" alt="Its me HEDRON!" >
			</li>
	</ul>
</section>
@endsection
