@extends('base')

@section('title')
{{"About Hedron"}}
@stop

@section('styles')
@stop

@section('end-js')
<script type="text/JavaScript" src={{ asset("assets/js/AboutEvents.js") }}></script> 
@stop

@section('body')
 <div id="header-band-ext">
    <div id="header-band">
    <img class="logo-sm" src={{asset("assets/home/logo-sm.png")}} >
     <div id="hedron-speech"><div class="bubble-pointer"></div><p>Now for the tragic backstory.</p></div>
</div>
</div>
<div class="center">
    
	</div>
    
    
   
 <hr id="line"> <hr id="line"> <hr id="line">
 
 <!-- The intro story split into P tags in order to use big text formatting and auto font resize-->
 <div class="bigtext story" >   
<p id="story"><span id="first-letter">I</span>t was a dark and stormy night... </p>
<p class="thin">3AM beckoned</p><p> on yet another all-nighter.</p>
<p class="thin">I was writing a program then.</p>
<p class="thin">You see, I studied Computer Science.</p>
<p>But despite the high concentration of </p><p class="thin">Monster in my blood,</><p> or the number of bags under my eyes</p>
<p>it never managed to completely erase the</p><p class="thin">  doodles on my notes.</p>
<hr>
<p>It took longer than expected,</p>

<p class="thin">but here I am.</p>
<p >An artist with some serious technical chops</p>
<p >in search of a unique art style </p><p >and creating things for the fun of it.</p>
<p class="thin">Hello Internet!</p>
<p class="light-txt"> Nice to meet you.</p>
        </div>
 </div>
@stop

