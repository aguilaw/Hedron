@extends('app')
@section('header-mssg')
<p class="speech">now it's time for the origin story.</p>
@endsection
@section('content')
<section class="intro-group">
	<span class="inline">
		<div class="bigletters bigtext span_7_of_9">
			<h1>On the internet</h1>
			<h1>no one knows you're actually</h1>
			<h1>a HUMAN</h1>
		</div>
	</span>
	<span>
		<img class="portrait" src="{{ asset('images/brand/portrait.jpg') }}" alt="Look its me as a human" >
	</span>
</section>
<section class=" span_9_of_9">
	<img class="hedron-girl span_4_of_9 inline" src="{{ asset('images/brand/hedron_youngirl_web_sm.png') }}" alt="Hedro-girl" >
	<div class="span_5_of_9 inline">
	<h2 >My name is Wendy, and I am the face behind Hedron.</h2>
	<p>I am an artist/developer Based in, sometimes but not usualy, sunny Seattle. I paint and draw primarily with graphite, ink, and acrylics. I like watercolor and will absolutely not go near oils(for the simple and superficial reason that it takes FOREVER to dry). </p>
	<p>On the coding side, the web is my true friend although C,C++ and I stay in contact and occasionaly go out for crepes and ice cream.</p>
</section>
<section class=" span_4_of_9">
	<h3>"So.. what about the wierd rabbit thing?"</h3>
	<h3> Do not fret loyal audience. HEDRON: the epic novela.....coming soon</h3>
</section>
@endsection
@section('afterjs')
<script type="text/javascript">
$('.bigtext').bigtext();
</script>
@endsection
