@extends('base')

@section('title')
{{"Home"}}
@stop


@section('js')
    <script type="text/JavaScript" src={{ asset("assets/js/FeaturedWidget.js") }}></script>
@stop


@section('styles')
	<link rel="stylesheet" href={{ asset("assets/css2/HomeStyles.css")}}>
@stop

@section('body')
<div class="wrapper"  >
	<div class="hero-unit"> 
		<nav class="nav">
			<img class="sign" src={{ asset("assets/home/Hedron_Sign2.png")}} alt="HEDRON">
			<a href="{{ url('contact') }}"  class="contact">Contact</a>
			<a href="{{ url('gallery') }}" class="gallery">Gallery</a>
			<a href="{{ url('about') }}"  class="about">About</a>
			<a href="{{ url('home') }}" class="home">Home</a>
		</nav>

		<!-- Begin Features -->
		<div class="diag-btm">
        <script>var featured={{$featured->toJson() }}</script>
            <img class="diag-btm-img" src="/assets/transparent.gif">
        </div>
        
		<div class="diag-mid">
            <img class="diag-mid-img" src="/assets/transparent.gif" >
        </div>
        
		<div class="diag-top" id="frame"> 
                    <img class="diag-top-img"  src="/assets/transparent.gif" >
             </div><!--end .diag-top -->
		<!-- End Features -->


        
		<div class="updates-grp">
			<h1 id="updates-text">UPDATES</h1>
			<div id="sq-rnd">
				<ul id="updates-widget">
                    @include('home-updates')
                    
				</ul>
                <div id="load-more-ajax" style="display:none;"><i class="fa fa-2x fa-refresh fa-spin"></i></div>
			</div><!-- end sqr-rnd--> 
		</div><!-- end updates-widget -->

		<!-- Begin Btm Windows -->			 
		<a class="sketch" href="{{ url('sketchbook') }}">
			<h2 id="sketch-text">SKETCHBOOK</h2>
		</a> 
		<a class="latest" href="{{ url('latest-project') }}">
			<h2 id="project-text">LATEST PROJECT</h2>
		</a>
		<!-- End Btm Windows-->
	</div><!-- end hero-->
</div><!-- end wrapper-->
@stop
