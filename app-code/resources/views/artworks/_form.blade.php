<div class="quick-info">
@if (isset($artwork))
<span class="border-right"><i class="fa fa-4x fa-diamond @if( $artwork->featured == 1) selected-icon @else not-selected-icon @endif "></i></span>
<a  href={{ route('deleteArtwork_path',[$artwork->slug]) }} ><i class="fa  fa-2x fa-times"></i></a>
@else
<i class="fa fa-4x fa-diamond not-selected-icon"></i>
@endif
</div>
<div class="form-group ">
    {!! Form::label('featured','featured?',null) !!}
    {!! Form::radio('featured','1',null) !!}yes
    {!! Form::radio('featured','0',null) !!}no
</div>
<div class="form-group underline">
    {!! Form::file('file_upload',['class' =>'span_3_of_4 file-upload']) !!}
    {!! Form::submit('Upload',['class' =>'upload span_1_of_4']) !!}
</div>
<div class="form-group ">
    {!! Form::label('title',null) !!}
    {!! Form::input('text','title',null,['class' =>'input']) !!}
</div>
<div class="form-group">
    {!! Form::label('date_created',null) !!}
    <input type="date" value= @if (!isset($artwork)) date('Y-m-d') @else {{$artwork->date_created}} @endif name="date_created" class="input">
</div>
<div class="form-group">
    {!! Form::label('tools',null) !!}
    {!! Form::input('text','tools',null,['class' =>'input']) !!}
</div>
<div class="form-group">
    {!! Form::label('type',null) !!}
    {!! Form::input('text','type',null,['class' =>'input']) !!}
</div>
<div class="form-group">
    {!! Form::label('commissioner',null) !!}
    {!! Form::input('text','commissioner',null,['class' =>'input']) !!}
</div>
<div class="form-group">
    {!! Form::label('slug',null) !!}
    {!! Form::input('text','slug',null,['class' =>'input']) !!}
</div>
<div class="form-group">
    {!! Form::label('description',null) !!}
    {!! Form::textarea('description',null) !!}
</div>
<div class="form-group underline">
    {!! Form::label('display_in',null) !!}
    <div class="center">
        {!! Form::radio('display_in','Gallery','checked') !!} Gallery
        {!! Form::radio('display_in','Sketchbook') !!} Sketchbook
    </div>
</div>
<div class="form-group-inline">
    {!! Form::label('vertical_offset',null,['class' =>'span_1_of_4']) !!}
    {!! Form::input('number','vertical_offset','0',['readonly','class' =>'span_1_of_4']) !!}

    {!! Form::label('horizontal_offset',null,['class' =>'span_1_of_4']) !!}
    {!! Form::input('number','horizontal_offset','0',['readonly','class' =>'span_1_of_4']) !!}
</div>
<div class="form-group-inline">
    {!! Form::label('file_width',null,['class' =>'span_1_of_4']) !!}
    {!! Form::input('text','file_width',null,['readonly','class' =>'span_1_of_4']) !!}

    {!! Form::label('file_height',null,['class' =>'span_1_of_4']) !!}
    {!! Form::input('text','file_height',null,['readonly','class' =>'span_1_of_4']) !!}

    {!! Form::label('file_size',null,['class' =>'span_1_of_4']) !!}
    {!! Form::input('text','file_size',null,['readonly','class' =>'span_1_of_4']) !!}

    {!! Form::label('file_extension',null,['class' =>'span_1_of_4']) !!}
    {!! Form::input('text','file_extension',null,['readonly','class' =>'span_1_of_4']) !!}
</div>
{!! Form::submit('Save Changes',['class' =>'submit span_2_of_4']) !!}
