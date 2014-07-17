@extends('admin-base')

@section('specific-styles')
	<link rel="stylesheet" href={{asset("assets/css2/AdminImagesStyles.css")}}>
@stop

@section('js')
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
    @if($user->email != "aguilaw@hedron.com")
        <a id="delete" href={{ action('UsersController@UserDelete', $user->id) }}>
            <i class="fa fa-times"></i>
        </a >
     @endif
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
            <label for="fname">First Name:</label>
                <input class="input" type="text" name="fname" id="fname"   autocomplete="off" required value="@yield('re-fill-fname',  $toEdit->fname)">
            <label for="lname">Last Name:</label>
                <input class="input" type="text" name="lname" id="lname"  autocomplete="off" value="@yield('re-fill-lname',  $toEdit->lname)" >
            <label for="role">Role:</label>
                <input class="input-radio first-radio" type="radio" name="role" id="role" required value="admin" 
                    @if($toEdit->role == "admin") checked @endif >Admin
                <input class="input-radio" type="radio" name="role" id="role" required value="user" 
                    @if($toEdit->role == "user") checked @endif >User
               <!-- <input class="input" type="text" name="role" id="role"  placeholder="" autocomplete="off" required value="@yield('pre-fill',  $toEdit->role)"> -->
            <label for="email">Email:</label>
                <input class="input"  type="text" name="email" id="email" required autocomplete="off" value="@yield('pre-fill-email',  $toEdit->email)">
            <label for="password">@yield('pre-fill-password',"change Password  &nbsp (4-20 characters):")</label>
                <input class="input"  type="password" name="password" autocomplete="off" id="password" @yield('required',"")>
            <label for="password_confirmation">Verify Password:</label>
            <input class="input"  type="password" name="password_confirmation" autocomplete="off" id="password_confirmation" @yield('required',"")>

            <hr>
            
            <!--readonly File info -->
             <input class="submit" type="submit" name="submit" id="submit" value="Save">
             @section('pre-fill')
             <button class="del-bttn" type="submit" formaction={{action('ImagesController@ImageDelete', $toEdit->id) }}> Delete </button>
             @show
        
    </form>
@stop