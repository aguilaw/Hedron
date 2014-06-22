@extends('admin-images')

@section('pre-fill')
    {{""}}
@stop

@section('action')
    {{ action('ImagesController@SaveImageNew') }}
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