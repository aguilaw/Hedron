<div class="form-group ">
    {!! Form::label('type',null) !!}
    {!! Form::input('text','type',null,['class' =>'input']) !!}
</div>
<div class="form-group">
    {!! Form::label('date_created',null) !!}
    <input type="date" value= {{ date('Y-m-d') }} name="date_created" class="input">
</div>
<div class="form-group">
    {!! Form::label('message',null) !!}
    {!! Form::textarea('message',null) !!}
</div>
<div class="form-group">
    {!! Form::label('icon_class',null) !!}
    <span class="center">
        <div class="form-group-inline ">
        {!! Form::radio('icon_class','fa-picture') !!}
        <i class="fa fa-2x fa-picture-o type-icon"></i>Gallery
        </div>
        <div class="form-group-inline ">
        {!! Form::radio('icon_class','fa-pencil') !!}
        <i class="fa fa-2x fa-pencil type-icon"></i>Sketch
        </div>
        <div class="form-group-inline ">
        {!! Form::radio('icon_class','fa-thumb-tack') !!}
        <i class="fa fa-2x fa-thumb-tack type-icon"></i>Event
        </div>
        <div class="form-group-inline ">
        {!! Form::radio('icon_class','fa-comments') !!}
        <i class="fa fa-2x fa-comments type-icon"></i>Comment
        </div>
        <div class="form-group">
        {!! Form::input('text','icon_class_other',null,['class' =>'input other','placeholder'=>'other']) !!}
        </div>
</span>
    <a href='http://fortawesome.github.io/Font-Awesome/icons/' target='_blank'><i class="fa fa-question-circle"></i>  Need Icon Names?</a>
</div>
<div class="form-group">
    {!! Form::label('link',null) !!}
    {!! Form::input('text','link',null,['class' =>'input']) !!}
</div>
<div class="form-group">
    {!! Form::label('slug',null) !!}
    {!! Form::input('text','slug',null,['class' =>'input']) !!}
</div>
{!! Form::submit('Save Changes',['class' =>'submit span_2_of_4']) !!}
