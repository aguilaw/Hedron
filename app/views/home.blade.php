@extends('base')

@section('title')
{{"Home"}}
@stop


@section('end-js')
    <script type="text/JavaScript" src={{ asset("assets/js/FeaturedWidget.js") }}></script>
    <script type="text/JavaScript" src={{ asset("assets/js/InfinitePagination.js") }}></script>
@stop


@section('styles')
@stop

@section('body')
<!--contains the geometrig astract img-->

		<!-- Begin Features -->
        <script>
            var FEAT_THUMB_URL="{{Config::get('globals.THUMB_URL')}}"; 
            var HOME_URL="{{Config::get('globals.HOME_URL')}}";  
            var featured={{$featured->toJson() }};
        </script>
         <div id="header-band-ext">
        <div id="header-band">
         <div id="illustration"  ></div>
             <img id="hedron-name"  src={{asset("assets/home/hedron_name.png")}} >
            <hr class="underline">
            <ul class="featured-widget">            
               <li class="frame"> <a  id="img-a-left" href="{{ url('gallery') }}">
                    <img id="img-left" src={{asset("assets/home/img_mask_light.png")}}>
                </a>
                </li>
                <li class="frame">
                <a  id="img-a-mid" href="{{ url('gallery') }}">
                    <img id="img-mid" src={{asset("assets/home/img_mask_light.png")}} >
                </a>
                </li>
                <li class="frame">
                <a  id="img-a-right"  href="{{ url('gallery') }}">  <!-- had id frame-->
                    <img id="img-right"  src={{asset("assets/home/img_mask_light.png")}} >
                </a><!--end .diag-top -->
                </li>
            <!-- End Features -->
            </ul>
         </div>
        </div>
    <div class="center-home">
        <div class="header-wrap">
            
            <h1 id="updates-text">UPDATES<i class="fa fa-chevron-down"></i></h1><br>
            <div id="sq-rnd">
                <ul id="updates-widget">
                    @include('home-updates')
                </ul>
                    <div id="load-more-ajax" style="display:none;"><i class="fa fa-2x fa-refresh fa-spin"></i></div>
            </div><!-- end updates-widget -->
        </div>
        <div class="page-bottom">
         <a class="latest" href="{{ url('latest-project') }}">
			<h2 id="project-text">LATEST PROJECT</h2>
		</a>
        <a class="sketch" href="{{ url('sketchbook') }}">
			<h2 id="sketch-text">SKETCHBOOK</h2>
		</a>
        <div>
    </div>
        
       
        
        		<!-- Begin Btm Windows -->			 
		
        
@stop
