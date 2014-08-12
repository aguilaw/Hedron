@extends('base')

@section('title')
{{"About Hedron"}}
@stop

@section('styles')
	<link rel="stylesheet" href={{ asset("assets/css2/AboutStyles.css")}}>
@stop

@section('end-js')
<script type="text/JavaScript" src={{ asset("assets/js/AboutEvents.js") }}></script> 
@stop

@section('body')
<img class="hedron" src={{asset("assets/Hedron_Character.svg")}} alt="HEDRON">

<div class="bubble main-bbl bigtext " >
		<div class="pointer-big bigtext-exempt"  ></div>
        <p id="greeting">Greetings...</p>
        <p class="intro bigtext-exempt">I am 
            <img class="name  " src={{asset("assets/Hedron_Signiture_Vector.svg")}} alt="HEDRON" onerror="this.onerror=null; this.src='image.png'"></p>
         <p class="intro">I speak in little boxes</p>
         <p class="intro">and make art. </p>
        </div>

    <div class="bubble  right-top" >
		<div class="pointer-border border-sm bigtext-exempt" >
		</div>
        <p id="intro">But you may already know that... </p>
	</div>
    
     <div class="bubble  right-btm" >
		<div class="pointer-border border-sm bigtext-exempt" >
		</div>
        <p>YOU are here for the tragic origin story.</p>
	</div>
    <i class="fa  fa-long-arrow-down fa-5x"></i>
 <hr id="line"> <hr id="line"> <hr id="line">
 
 <!-- The intro story split into P tags in order to use big text formatting and auto font resize-->
 <div class="bigtext story" >   
<p id="story"><span id="first-letter">I</span>t was a dark and stormy night... </p>
<p class="thin">3AM beckoned</p><p> on yet another all-nighter.</p>
<p class="thin">I was writing a program then.</p>
<p class="thin">You see, I studied Computer Science.</p>
<p >Over time I found that writing code changes people</p>
<p>but despite the high concentration of </p><p class="thin">Monster in my blood,</><p> or the number of bags under my eyes</p>
<p>it never managed to completely erase the</p><p class="thin">  doodles on my notes. </p>
<hr>
<p>It took longer than expected,</p>

<p class="thin">But Here I am now.</p>
<p >An artist with some serious technical chops and a dream.</p>
<p class="thin">A dream of a unique art style </p><p>and of creating things for the fun of it.</p>
<p class="thin">Hello Internet!</p>
<p class="light-txt"> Nice to meet you.</p>
        </div>
@stop

