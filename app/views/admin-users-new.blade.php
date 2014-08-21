@extends('admin-users')

@section('pre-fill')

@stop

@section('pre-fill-email')
@if(Input::old('email') != "")
    {{Input::old('email')}}
@else
{{"@hedron.com"}}
@endif
@stop



@section('re-fill-fname')
{{Input::old('fname')}}
@stop

@section('re-fill-lname')
{{Input::old('lname')}}
@stop

@section('pre-fill-password')
    Password  &nbsp (4-20 characters):
@stop

@section('action')
    {{ action('UsersController@SaveNewUser') }}
@stop

@section('required')
required
@stop