@extends('app')

@section('content')
<header class="page-header span_9_of_9 underline">
	<div class="span_5_of_9 center">
		<div class="speech-bubble post-bubble ">
			<p class="speech">Let's be friends!</p><p class="speech"> Questions, Comments? Contact me here.</p>
		</div>
		<span><img class="hedron-head" src="{{ asset('images/brand/hedron_head_small.png') }}" alt="Hedron" ></span>
	</div>
</header>
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
