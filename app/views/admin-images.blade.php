@extends('admin-base')

@section('specific-styles')
	<link rel="stylesheet" href={{asset("assets/css2/AdminImagesStyles.css")}}>
@stop

@section('js')
<script type="text/JavaScript" src={{ asset("assets/js/adminPagesEvents.js") }}></script>
	<script type="text/JavaScript" src= {{ asset("assets/js/button.js") }}></script>
    <script type="text/JavaScript" src= {{ asset("assets/js/verify.js") }}></script>
@stop 
 
@section('type')
Image
@stop

@section('type-pl')
Images
@stop

@section('type-create')
{{ action('ImagesController@SaveImageNew') }}
@stop

@section('type-list')

    @foreach($images as $image)
    <li class="item">
    <a href= {{ action('ImagesController@ImageEdit', $image->id) }}>
        {{$image->title}}
    </a>
    <a id="delete" href={{ action('ImagesController@ImageDelete', $image->id) }}>
        <i class="fa fa-times"></i>
     </a >
    <!-- <p>{{$image->date_created}}<p> -->
    <hr>
    </li>
    
    @endforeach
    
@stop


@section('form')
    {{-- FIGURE OUT HOW TO USE A ROUTE TO PRODUCE THE URL--}} 
    <form class="forms" action =@yield('action', action('ImagesController@ImageEdit', $toEdit->id)) enctype="multipart/form-data" method ="post" role="form">
         <!--contains form and file info -->
        <div class="info-wrap">  
            <label for="title">Title:</label>
            <input class="input" type="text" name="title" id="title"   autocomplete="off" required value="@yield('pre-fill',  $toEdit->title)">
            <br>
            <br>
            <label for="date">Date:</label>
            <input class="input" type="date" name="date" id="date"  required value=@yield('pre-fill',  $toEdit->date_created)>
            <br>
            <br>
            <label for="tools">Tools:</label>
            <input class="input" type="text" name="tools" id="tools" placeholder="other" value="@yield('pre-fill',  $toEdit->tools)" >
            <br>
            <br>
            <label for="type">Type:</label>
            <input class="input" type="text" name="type" id="type"  placeholder="" required value="@yield('pre-fill',  $toEdit->project_type)">
            <br>
            <br>
            <label for="desc">Description:</label>
            <br>
            <textarea class="input"  name="desc" id="desc" rows="20" columns="40">@yield('pre-fill', $toEdit->description)</textarea>
            <br>
            <input class="" type="checkbox" name="featured" id="featured" value="checked" @yield('pre-fill',   $toEdit->featured  )> Featured
            <br>
            <hr>
            <!-- Upload the file -->
            <label for="file"> @yield('upload', "Change") Image File:</label>
            <input type="file" name="file" id="file" @yield('required', "")>
            <br>

            <br>
            <!--readonly File info -->
            <label for="file-width">Width:</label>
                <input class="static-info" type="text" name="file-width" id="file-width"  readonly value="@yield('pre-fill', $toEdit->file_width) px">
            <label for="file-height">Height:</label>
                <input class="static-info" type="text" name="file-height" id="file-height"  readonly value="@yield('pre-fill', $toEdit->file_height) px" >
            <br>
            <label for="file-size">File Size:</label>
                <input class="static-info" type="text" name="file-size" id="file-size" readonly value="@yield('pre-fill', $toEdit->file_size)">
            <label for="file-ext">Extension:</label>
                <input class="static-info" type="text" name="file-ext" id="file-ext"  readonly value="@yield('pre-fill',  $toEdit->file_ext)">
                <br>
             <input class="submit" type="submit" name="submit" id="submit" value="Save">
             @section('pre-fill')
             <button class="del-bttn" type="submit" formaction={{action('ImagesController@ImageDelete', $toEdit->id) }}> Delete </button>
             @show
        </div><!-- end .info-wrap-->
        
        
        <!-- wraps the image and position info-->
        <div class="image-pos-wrap">
        @section('pre-fill-script')
        <script>
                                var tops= {{$toEdit->pos_y}};
                                var left= {{$toEdit->pos_x}};
                                
                                var imgUrl = "url("+IMG_URL+'{{$toEdit->file_name}}'+")";
                            </script>
         @show
            <div class="diag-top" id="frame"> 
                    <!-- load page then load the matching image within the parallelogram 
                            arguments are the saved left and top  values as well as the image file_title -->
                            
                    <img class="diag-img" id="draggable" src="/assets/transparent.gif" >
             </div><!--end .diag-top -->
             
            <br><br>
            <label for="left">Left (px):</label>
            <input type="text" class="static-info" id="left" name="left" value=" {{ $toEdit->pos_x }} px" readonly>
            <label for="top">Top:</label>
            <input type="text" class="static-info" id="top" name="top" value=" {{ $toEdit->pos_y }} px" readonly><br>
            <br>
        </div><!--end .image-pos-wrap -->
        
    </form>
@stop