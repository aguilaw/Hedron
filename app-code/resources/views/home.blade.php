@extends('app')

@section('content')
<div class="span_9_of_9 group">
	<header class="public-header">
	<div class="speech-bubble main-bubble ">
		<h1>Greetings!</h1>
		<h1> I am </h1>
		<span class="signature"><img src="{{ asset('images/brand/Hedron_Signiture_Vector.png') }}" alt="Hedron" ></span>
		<span class="hide-mobile">
		<h3 > A web developer with artistry</h3></span>
	</div>
	</header>

	<section class="home-widget span_9_of_9">
	<ul class="home-grid">
		<li class=" block  group hedron-character">
			<img src="{{ asset('images/brand/Hedron_Character.png') }}" alt="Its me HEDRON!" >
		</li>
		<li class=" static-block block">
			<h1>CODE</h1>
		</li>
		<li class=" static-block block ">
			<h1>DESIGN</h1>
		</li>
		@foreach( $items as $item )
			@if($item->file_name != null)
				<li class="block img-block">
				<a class="home-item" href="{{ route('works_path',$item->slug) }}">
					<img class="stretch-image"
					srcset="{{ asset('images/gallery/thumb/'.'425x170_'. $item->file_name) }} 425w,
							{{ asset('images/gallery/thumb/'.'292x_'. $item->file_name) }} 292w"
					sizes="(min-width: 30em) 9em, 35em"
					src="{{ asset('images/gallery/thumb/'.'292x_'. $item->file_name) }}"
					alt="{{ $item->title}}">
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
	<section>
</div>
@endsection
