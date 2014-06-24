@extends('admin-updates')

@section('pre-fill')

@stop

@section('action')
    {{ action('UpdatesController@SaveUpdateNew') }}
@stop

@section('todays-date')
{{date('Y-m-d');}}
@stop

@section('required')
required
@stop