<script type="text/JavaScript" src={{ asset("assets/js/SketchbookClosePopup.js") }}></script>
<i class=" close-bttn fa fa-times-circle fa-2x"></i>
<div class="info">
 
    <h1  id="title">{{$sketch->title}}</h1>
    
    <?php $date=explode("-", $sketch->date_created) ?>
    <p  id="date">{{$date[1]." /".$date[0]}}</p>
    <p  id="tools">{{$sketch->tools}}</p>
    <p  id="desc">{{$sketch->description}}</p>
    <p id="mssg">Click anywhere to close</p>
 </div>
    <img class="sketch"  src="{{asset('assets/gallery/'.$sketch->file_name)}}">
   
