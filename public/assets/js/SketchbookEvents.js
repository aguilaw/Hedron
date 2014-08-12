(function(){
    
    $(".diag-thumb").click(function(){
        loadSketch($(this).attr('id'));
    });
})();

function loadSketch(ajaxURL){
    var percent=.38;
    var add_width = Math.round(percent*$('.view').width());
    
    var percentThumbs=.38;
   var percentFrame=.59;
   var parentWidth =$('.view').width();
    var thumbsWidth =  Math.round(percentThumbs*parentWidth);
    var frameWidth =  Math.round(percentFrame*parentWidth);
            
    $.ajax({
                    url: ajaxURL,
                    datatype:"json",
                    success: function(data){
                        if(data){
                            $("#frame").ready().html(data).animate({width:frameWidth},300);
                            $(".sketch").fadeIn("slow");
                            /*only resize when the image view is closed*/
                            var width=$('.book-wrap').innerWidth();
                            if(width != thumbsWidth){
                            $('.book-wrap').ready().animate({width:thumbsWidth+"px"},300).css("overflow-y","visible");
                           }
                           
                        }else{
                            $('#frame').html('There was a problem with the image.');
                            
                        }
                    }
                });
        
}