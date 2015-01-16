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
         <div id="header-band-ext-home">
         
        <div id="header-band">
           
            <ul class="featured-widget">            
               <li class="frame"> 
                   
                </li>
                <li class="frame">
                    
                </li>
                <li class="frame">
                    
            <!-- End Features -->
            </ul>
         </div>
        </div>
        
    <div class="home-banner">
        <img class="hedron" src={{asset("assets/Hedron_Character.png")}} alt="HEDRON">
       <div class="bbl-wrap">
           <div class="bubble main-bbl bigtext " >
                <div class="pointer-big bigtext-exempt"  ></div>
                <p id="greeting">Greetings...</p>
                <p class="intro bigtext-exempt">I am 
                    <img id="hedron-name" src={{asset("assets/Hedron_Signiture_Vector.png")}} alt="HEDRON" onerror="this.onerror=null; this.src='image.png'"></p>

            </div>
            <div class="bubble second-bbl bigtext " >
                <p class="intro">I speak in little boxes</p>
                 <p class="intro">and make art. </p>
            </div>
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
            <a class="latest" href="{{ url('latest-project') }}">
			<h2 id="project-text">LATEST PROJECT</h2>
		</a>
        <a class="sketchbook" href="{{ url('sketchbook') }}">
			<h2 id="sketch-text">SKETCHBOOK</h2>
		</a>
        </div>

    </div>
        
       
        
        		<!-- Begin Btm Windows -->			 
		
        
@stop
