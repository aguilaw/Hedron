$(document).ready(function() {
    var drag= $("#draggable");
    drag.css({"top":tops+"px", "left":left+"px"});
    
    drag.draggable({
        drag:function(){
            var position=$(this).position();
            $("#top").val(position.top);
            $("#left").val(position.left);    
        }
    });
    /*/admin/IMAGES: when the text box corresponding to the "other" radio
    button is in focus select "other" radion button*/
    $("#type-other-val").focus(function(){
        $('.radio-other').attr('checked',true);
    });
});

