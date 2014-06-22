@extends('admin-base')

@section('specific-styles')
	<link rel="stylesheet" href={{asset("assets/css2/UpdatesStyles.css")}}>
@stop

@section('js')
<script type="text/JavaScript" src={{ asset("assets/js/adminPagesEvents.js") }}></script>
	<script type="text/JavaScript" src= {{ asset("assets/js/button.js") }}></script>
    <script type="text/JavaScript" src= {{ asset("assets/js/verify.js") }}></script>
@stop 

@section('type')
Update
@stop

@section('type-pl')
Updates
@stop

@section('type-create')
{{ action('UpdatesController@SaveUpdateNew') }}
@stop

@section('type-list')

    @foreach($updates as $update)
    <li class="item">
    <a href= {{ action('UpdatesController@UpdateEdit', $update->id) }}>
       {{$update->date_created." -  "}}
    <i class="fa {{$update->FA_icon_name}} type-icon"></i>
    </a>
    <a id="delete" href={{ action('UpdatesController@UpdateDelete', $update->id) }}>
        <i class="fa fa-times"></i>
    </a >
    <!-- <p>{{$update->date_created}}<p> -->
    <hr>
    </li>
    
    @endforeach
    
@stop


@section('form')
    {{-- FIGURE OUT HOW TO USE A ROUTE TO PRODUCE THE URL--}} 
    <form class="forms" action =@yield('action', action('UpdatesController@UpdateEdit', $toEdit->id))  method ="post" role="form">
         <!--contains form and file info -->
            <label for="type">Type:</label>
            <br>
            <input class="radio" type="radio"  name="updt-type" value="mssg" {{ $toEdit->type == "mssg" ? "checked" : ""}}> <i class="fa fa-2x fa-comments type-icon"></i>Comment
            <input class="radio" type="radio"  name="updt-type" value="gallery" {{ $toEdit->type == "gallery" ? "checked" : ""}}> <i class="fa fa-2x fa-picture-o type-icon"></i>Gallery
            <input class="radio" type="radio"  name="updt-type" value="sketch" {{ $toEdit->type == "sketch" ? "checked" : ""}}> <i class="fa fa-2x fa-pencil type-icon"></i>Sketch
            <input class="radio" type="radio"  name="updt-type" value="event" {{ $toEdit->type == "event" ? "checked" : ""}}> <i class="fa fa-2x fa-thumb-tack type-icon"></i>Event
            <input class="radio" type="radio"  name="updt-type" value="other" {{ $toEdit->type == "other" ? "checked" : ""}}></i>Other
            <br>
            <br>
            <label for="icon-type">Font Awesome Icon:</label>
            <br>
            <input class="input" type="text" name="icon-name" id="icon-name"  value=@yield('pre-fill',  $toEdit->FA_icon_name)>
            <a href='http://fortawesome.github.io/Font-Awesome/icons/' target='_blank'><i class="fa fa-question-circle"></i>  Need Icon Names?</a>
            <br>
            <br>
            <label for="mssg">Message:</label>
            <br>
            <textarea name="mssg" id="mssg"   maxlength="300" autocomplete="off" required >@yield('pre-fill',  $toEdit->message)</textarea>
            <br>
            <br>
            <label for="date">Date:</label>
            <br>
            <input class="input" type="date" name="date" id="date"  required value=@yield('todays-date',  $toEdit->date_created)>
            <br>
            <br>
            <input class="submit" type="submit" name="submit" id="submit" value="Save">
        
    </form>
@stop

@section('js')

@stop