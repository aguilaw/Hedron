@extends('base')

@section('title')
{{"Contact"}}
@stop


@section('body')

 <div id="header-band-ext">
    <img class="logo-sm" src={{asset("assets/home/logo-sm.png")}} >
     <div id="hedron-speech"><div class="bubble-pointer"></div><p>Questions, Comments, or Concerns? <br> Fill out the following form to contact me.</p></div>
     </div>
<div class="center">
   <form id="contact-form">
        <label id="name-txt" for="name">Name *</label>
        <span class="name-wrap" id="fname-wrap">
        <input type="text" id="fname" name="fname" />
          <h5>First</h5>
        </span>
        <span class="name-wrap" >
        <input type="text" id="lname" name="lname"/>
        <h5>Last</h5>
        </span>
        <br>
        <label for="email">Email *</label>
        <input type="email" name="Email"/>
        <br>
        <label for="subject">Subject *</label>
        <input type="text" name="subject" />
        <p id="mssg-wrap"><label for="mssg">Message *</label>
        <textarea name="mssg" /></textarea>
        </p>
        <input type="submit" id="send-bttn" value="Send">
   </form>
      <div class="social-block-big">
   <h2> Or if you prefer you can use one of these</h2>

       <span class="fa-stack fa-lg">
          <i class="fa fa-circle fa-stack-2x"></i>
          <a class="fa fa-facebook  fa-stack-1x social"></a>
        </span>
        <span class="fa-stack fa-lg">
          <i class="fa fa-circle fa-stack-2x"></i>
          <a class="fa fa-tumblr  fa-stack-1x social" href="http://one-hedron.tumblr.com/"></a>
        </span>
                   <!--<a class="fa fa-twitter  fa-2x social"></a> -->
                
                <!--<a class="fa fa-youtube social" ></a> -->
            </div>
</div> 
 
@stop
