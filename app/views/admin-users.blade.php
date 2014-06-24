@extends('admin-base')

@section('specific-styles')
	<link rel="stylesheet" href={{asset("assets/css2/AdminImagesStyles.css")}}>
@stop

@section('js')
<script type="text/JavaScript" src={{ asset("assets/js/adminPagesEvents.js") }}></script>
@stop 
 
@section('type')
User
@stop

@section('type-pl')
Users
@stop

@section('type-create')
{{ action('UsersController@SaveUserNew') }}
@stop

@section('type-list')

    @foreach($users as $user)
    <li class="item">
    <a href= {{ action('UsersController@UserEdit', $user->id) }}>
        {{$user->lname.",".$user->fname}}
    </a>
    <a id="delete" href={{ action('UsersController@UserDelete', $user->id) }}>
        <i class="fa fa-times"></i>
     </a >
    <hr>
    </li>
    @endforeach
@stop


@section('form')
    @if($errors->any())
        @foreach($errors->all() as $error)
        {{$error}}
        <br>
        @endforeach
     @endif
    {{-- FIGURE OUT HOW TO USE A ROUTE TO PRODUCE THE URL--}} 
    <form class="forms" action =@yield('action', action('UsersController@UserEdit', $toEdit->id)) method ="post" role="form">
         <!--contains form and file info -->
        <div class="info-wrap">  
            <label for="fname">First Name:</label>
            <input class="input" type="text" name="fname" id="fname"   autocomplete="off" required value="@yield('pre-fill',  $toEdit->fname)">
            <br>
            <br>
            <label for="lname">Last Name:</label>
            <input class="input" type="text" name="lname" id="lname"  autocomplete="off" value="@yield('pre-fill',  $toEdit->lname)" >
            <br>
            <br>
            <label for="role">Role:</label>
            <input class="input" type="text" name="role" id="role"  placeholder="" autocomplete="off" required value="@yield('pre-fill',  $toEdit->role)">
            <br>
            <br>
            <label for="email">Email:</label>
            <input class="input"  type="text" name="email" id="email" required autocomplete="off" value="@yield('pre-fill',  $toEdit->email)">
            <br>
            <label for="password">Change Password  &nbsp (A-Z & 0-9):</label>
            <input class="input"  type="password" name="password" autocomplete="off" id="password" >
            <br>
            <label for="password_confirmation">Varify Password:</label>
            <input class="input"  type="password" name="password_confirmation" autocomplete="off" id="password_confirmation">
            <br>
            <hr>
            <br>
            <br>
            <!--readonly File info -->
             <input class="submit" type="submit" name="submit" id="submit" value="Save">
             @section('pre-fill')
             <button class="del-bttn" type="submit" formaction={{action('ImagesController@ImageDelete', $toEdit->id) }}> Delete </button>
             @show
        </div><!-- end .info-wrap-->
        
    </form>
@stop