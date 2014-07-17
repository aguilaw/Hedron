@extends('admin-images')

@section('pre-fill')

@stop

@section('pre-fill-title')
{{Input::old('title')}}
@stop

@section('pre-fill-title')
{{Input::old('title')}}
@stop

@section('pre-fill-date')
{{Input::old('date')}}
@stop

@section('pre-fill-desc')
{{Input::old('desc')}}
@stop

@section('pre-fill-tools')
{{Input::old('tools')}}
@stop

@section('action')
    {{action('ImagesController@SaveImageNew') }}
@stop


@section('pre-fill-script')
<script>
    var tops= 0;
    var left= 0;   
    var imgUrl="";
</script>
 @stop
@section('upload')
Upload
@stop

@section('required')
required
@stop