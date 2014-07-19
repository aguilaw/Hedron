@extends('base')

@section('title')
{{"Page Not Found"}}
@stop


@section('js')
@stop


@section('styles')
	<link rel="stylesheet" href={{ asset("assets/css2/errorStyles.css")}}> 
@stop


@section('body')
<h1 id="err-no">Error 404:</h1>
    <h1 id="mssg">Page Not Found</h1>
    <img  id="img" src={{asset("assets/error/hedronJacket.png")}}>
@stop
