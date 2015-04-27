@extends('app')

@section ('quick-styles')
<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
		<style>

			.container {
                width:100%;
				text-align: center;
                margin-top: 20%;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 72px;
				margin-bottom: 40px;
                font-weight: 100;
				font-family: 'Lato';
                color: #B0BEC5;
			}
		</style>
@stop

@section('content')
	<body>

		<div class="container">
			<div class="content">
				<div class="title">It seems we took a wrong turn..</div>
			</div>
		</div>
@stop
