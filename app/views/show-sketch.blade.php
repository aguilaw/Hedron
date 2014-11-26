
<img class="sketch"  src="{{asset('assets/gallery/'.$toShow->file_name)}}">
<div class="info">
 
    <h1  id="title">{{$toShow->title}}</h1>
    
    <?php $date=explode("-", $toShow->date_created) ?>
    <p  id="date">{{$date[1]." /".$date[0]}} &nbsp &middot &nbsp </p>
    <p  id="tools">{{$toShow->tools}}</p>
    <p  id="desc">{{$toShow->description}}</p>
    <p id="mssg">Click anywhere to close</p>
 </div>
    
   
