var IMG_URL= "/assets/gallery/";

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
    
   
    
   
});

