@extends('admin-users')

@section('pre-fill')

@stop

@section('pre-fill-email')
{{"@hedron.com"}}
@stop

@section('pre-fill-password')
    Password  &nbsp (4-20 characters):
@stop

@section('action')
    {{ action('UsersController@SaveUserNew') }}
@stop

@section('required')
required
@stop