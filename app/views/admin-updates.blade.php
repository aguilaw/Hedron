@extends('admin-base')

@section('specific-styles')
	<link rel="stylesheet" href={{asset("assets/css2/UpdatesStyles.css")}}>
@stop

@section('js')
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
        <p><input class="radio first-radio " type="radio"  name="updt-type" value="mssg" {{ $toEdit->type == "mssg" ? "checked" : ""}}> 
            <i class="fa fa-2x fa-comments type-icon"></i>Comment
        <input class="radio" type="radio"  name="updt-type" value="gallery" {{ $toEdit->type == "gallery" ? "checked" : ""}}> 
            <i class="fa fa-2x fa-picture-o type-icon"></i>Gallery
        </p>
        <p><input class="radio first-radio" type="radio"  name="updt-type" value="sketch" {{ $toEdit->type == "sketch" ? "checked" : ""}}> 
            <i class="fa fa-2x fa-pencil type-icon"></i>Sketch
        <input class="radio" type="radio"  name="updt-type" value="event" {{ $toEdit->type == "event" ? "checked" : ""}}> 
            <i class="fa fa-2x fa-thumb-tack type-icon"></i>Event
        </p>
        <p><input class="radio radio-other first-radio" type="radio" name="updt-type" id="type-other" required value="Other" >
            <input class="radio input-radio-other" type="text" name="type-other-val" id="type-other-val"  autocomplete="off"  placeholder="other" 
                @if($toEdit->type == "Other")  value="{{ $toEdit->type}}"@endif  > </p>
                
        <label for="icon-type">Font Awesome Icon:</label
        <input class="input" type="text" name="icon-name" id="icon-name"  value=@yield('pre-fill',  $toEdit->FA_icon_name)>
        <a href='http://fortawesome.github.io/Font-Awesome/icons/' target='_blank'><i class="fa fa-question-circle"></i>  Need Icon Names?</a>
        <label for="mssg">Message:</label>
        <textarea name="mssg" id="mssg"   maxlength="300" autocomplete="off" required >@yield('pre-fill',  $toEdit->message)</textarea>
        <label for="date">Date:</label>
        <input class="input" type="date" name="date" id="date"  required value=@yield('todays-date',  $toEdit->date_created)>
        <br>
        <input class="submit" type="submit" name="submit" id="submit" value="Save">
        @section('pre-fill')
         <button class="del-bttn" type="submit" formaction={{action('UpdatesController@UpdateDelete', $toEdit->id) }}> Delete </button>
         @show
    </form>
@stop

@section('js')

@stop