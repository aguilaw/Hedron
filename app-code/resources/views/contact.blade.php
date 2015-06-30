@extends('app')
@section('header-mssg')
<p class="speech">Let's be friends!</p><p class="speech"> Questions, Comments? Contact me here.</p>
@endsection
@section('content')
<section><form class="contact-form" action="#" method="post">
	<div class="form-group">
		{!! Form::label('Name*',null) !!}
		<span class="name-wrap" id="fname-wrap">
		{!! Form::input('text','link',null,['class' =>'input name']) !!}
		<span>First</span>
	</span>
		<span class="name-wrap" id="fname-wrap">
		{!! Form::input('text','link',null,['class' =>'input name']) !!}
		<span>Last</span>
	</span>
	</div>
	<div class="form-group">
		{!! Form::label('Email*',null) !!}
		{!! Form::input('text','Email',null,['class' =>'input']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('Subject*',null) !!}
		{!! Form::input('text','Subject',null,['class' =>'input']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('Message*',null) !!}
		{!! Form::textarea('message',null) !!}
	</div>
	{!! Form::submit('Send',['class' =>'submit span_2_of_4']) !!}
</form>
</section>
@endsection
