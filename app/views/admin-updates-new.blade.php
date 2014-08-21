@extends('admin-updates')

@section('pre-fill')

@stop

@section('action')
    {{ action('UpdatesController@SaveNewUpdate') }}
@stop

@section('todays-date')
{{date('Y-m-d');}}
@stop

@section('required')
required
@stop