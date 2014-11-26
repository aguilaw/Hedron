(function(){
    /*when an image is clicked queue the database for the */
    $(".diag-thumb").click(function(){
        loadSketch($(this).attr('id'));
    });
    /*When the close button is clicked return image view to full size*/
    $(".close-bttn").click(function(){
           var percentThumbs=.89;
           var percentFrame=.05;
           var parentWidth =$('.view').width();
            var thumbsWidth =  Math.round(percentThumbs*parentWidth);
            var frameWidth =  Math.round(percentFrame*parentWidth);
            $('#frame').animate({width:0,padding:0},300);
          $('.book-wrap').animate({width:"100%"},300).css("text-align", "left");
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
                             $("#img-frame").ready().html(data);
                            $("#frame").ready().animate({width:frameWidth,padding:"2%"},300);
                            $(".sketch").fadeIn("slow");
                            /*only resize the list of sketches when the image view is closed*/
                            var width=$('.book-wrap').innerWidth();
                            if(width != thumbsWidth){
                            $('.book-wrap').ready().animate({width:thumbsWidth+"px"},300).css("text-align", "center");
                           }
                        }else{
                            $('#frame').html('There was a problem with the image.');
                            
                        }
                    }
                });
        
}
