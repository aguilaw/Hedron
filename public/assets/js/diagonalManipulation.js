$(document).ready(function() {
    var drag= $("#draggable");
    drag.css({"top":tops+"px", "left":left+"px", "background-image": imgUrl });
    
    drag.draggable({
        drag:function(){
            var position=$(this).position();
            $("#top").val(position.top);
            $("#left").val(position.left);    
        }
    });
    
        /*/admin/IMAGES: when the text box corresponding to the "other" radio
    button is filled select "other"*/
    $("#type-other-val").focus(function(){
        $('.radio-other').attr('checked',true);
    });
    
});

