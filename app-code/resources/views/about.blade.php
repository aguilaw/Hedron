@extends('app')
@section('header-mssg')
<p class="speech">now it's time for the origin story.</p>
@endsection
@section('content')
<section class="intro-group">
		<div class="intro">
			<img class="hedron" src="{{ asset('images/brand/Hedron_Character.png') }}" alt="Hesron in a sanzzy suit" >
			<div class="bigletters bigletters-right ">
				<h1 class=" bigtext-exempt"><img src="{{ asset('images/brand/Hedron_Signiture_Vector.png') }}" alt="Hedron" ></h1>
				<h1>is...</h1>
			</div>

		</div>

	<div class="intro">
		<div class="bigletters bigletters-left ">
		<h1>actually</h1>
		<h1>a HUMAN</h1>
	</div>
		<img class="portrait" src="{{ asset('images/brand/portrait.jpg') }}" alt="Look its me as a human" >

	</div>
</section>
<section class="paralax" style="background-image:url( {{asset('images/bgs/bg.jpg') }} );">

</section>
<section class="bio">
	<h2 class="gold-text">My name is Wendy, and I am the face behind Hedron.</h2>
	<p>I am an artist/developer Based in, sometimes but not usualy, sunny Seattle. I paint and draw primarily with graphite, ink, and acrylics. I like watercolor and will absolutely not go near oils(for the simple and superficial reason that it takes FOREVER to dry). </p>
	<p>On the coding side, the web is my true friend although C,C++ and I stay in contact and occasionally go out for crepes and ice cream.</p>
</section>
<section class="bio">
	<h3>"So.. what about the wierd rabbit thing?"</h3>
	<h3> Do not fret loyal audience. HEDRON: the epic novela.....coming soon</h3>
</section>
@endsection
@section('afterjs')
<script type="text/javascript">
$('.bigtext').bigtext();
</script>
@endsection
