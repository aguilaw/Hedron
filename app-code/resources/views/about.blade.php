@extends('app')

@section('content')
<header class="page-header span_9_of_9 underline">
	<div class="span_5_of_9 center">
		<div class="speech-bubble post-bubble ">
			<p class="speech">now it's time for the origin story.</p>
		</div>
		<span><img class="hedron-head" src="{{ asset('images/brand/hedron_head_small.png') }}" alt="Hedron" ></span>
	</div>

</header>
<section class="intro group">
	<div class="bigletters bigtext span_5_of_9">
		<h1>On the internet</h1>
		<h1> no one knows you're actually</h1>
		<h1> a human.</h1>
	</div>
	<span>
		<img class="portrait" src="{{ asset('images/brand/portrait.jpg') }}" alt="Look its me as a human" >
	</span>
</section>
<section class="bio span_4_of_9">
	<h3>My name is Wendy, and I am the face behind Hedron.</h3>
	<p>I am an artist/developer Based in "sunny" Seattle. I paint and draw primarily with graphite, ink, and acrylics. I like watercolor and will absolutely not go near oils(for the simple and superficial reason that it takes FOREVER to dry). </p>
	<p>On the coding side, the web is my true friend although C,C++ and I stay in contact and occasionaly go out for crepes and ice cream.</p>
</section>

@endsection
@section('afterjs')
<script type="text/javascript">
$('.bigtext').bigtext();
</script>
@endsection
