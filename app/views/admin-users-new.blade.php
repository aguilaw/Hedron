@extends('admin-users')

@section('pre-fill')

@stop

@section('action')
    {{ action('UsersController@SaveUserNew') }}
@stop

@section('required')
required
@stop