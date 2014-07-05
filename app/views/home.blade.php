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
<!--contains the geometrig astract img-->
    <div class="wrapper">
		<!-- Begin Features -->
        <script>
            var FEAT_THUMB_URL="{{Config::get('globals.THUMB_URL')}}"; 
            var GALLERY_URL="{{Config::get('globals.GALLERY_URL')}}"; 
            var featured={{$featured->toJson() }};
        </script>
        <div class="shadow-wrap"><div class="shadow"></div></div>
         <ul class="featured-widg">
               <li class="frame"> <a  id="img-a-left" href="{{ url('gallery') }}">
                    <img id="img-left" src={{asset("assets/home/img_mask.png")}}>
                </a>
                </li>
                <li class="frame">
                <a  id="img-a-mid" href="{{ url('gallery') }}">
                    <img id="img-mid" src={{asset("assets/home/img_mask.png")}} >
                </a>
                </li>
                <li class="frame">
                <a  id="img-a-right"  href="{{ url('gallery') }}">  <!-- had id frame-->
                    <img id="img-right"  src={{asset("assets/home/img_mask.png")}} >
                </a><!--end .diag-top -->
                </li>
            <!-- End Features -->
            
        </ul>

<img class="logo-shadow"  src={{asset("assets/home/logo_shadow.png")}} >
</div>
<div class="edge">
        <h1 id="updates-text">UPDATES<i class="fa fa-chevron-down"></i></h1><br>
        <div id="sq-rnd">
				<ul id="updates-widget">
                    @include('home-updates')
				</ul>
                    <div id="load-more-ajax" style="display:none;"><i class="fa fa-2x fa-refresh fa-spin"></i></div>
		</div><!-- end updates-widget -->
        
        		<!-- Begin Btm Windows -->			 
		<a class="sketch" href="{{ url('sketchbook') }}">
			<h2 id="sketch-text">SKETCHBOOK</h2>
		</a> 
		<a class="latest" href="{{ url('latest-project') }}">
			<h2 id="project-text">LATEST PROJECT</h2>
		</a>
		<!-- End Btm Windows-->
        
</div>
        



@stop
