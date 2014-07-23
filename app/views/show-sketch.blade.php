<script type="text/JavaScript" src={{ asset("assets/js/SketchbookClosePopup.js") }}></script>
<div class="info">
 
    <h1  id="title">{{$sketch->title}}</h1>
    
    <?php $date=explode("-", $sketch->date_created) ?>
    <h2  id="date">{{$date[1]." /".$date[0]}}</h2>
    <h2  id="date">{{$sketch->tools}}</h2>
    <h2  id="date">{{$sketch->description}}</h2>
    <p id="mssg">Click anywhere to close</p>
 </div>
    <img class="sketch"  src="{{asset('assets/gallery/'.$sketch->file_name)}}">
   
