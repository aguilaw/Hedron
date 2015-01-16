(function(){
    /*when an image is clicked queue the database for the  sketch details*/
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
            $(this).fadeOut("fast");
            $("#img-frame").fadeOut("fast").promise().done(function(){
            $('.view').children().first()
                            .animate({width:0,padding:0},300)
                            .next()
                            .animate({width:thumbsWidth},300)
                            .promise()
                            .done(function(){
                                $(this).css("text-align", "left");
                               
                            });
           });
          
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
                             $('.view').children().first()
                            .animate({width:frameWidth,padding:"2%"},300)
                            .next()
                            .animate({width:thumbsWidth+"px"},300)
                            .promise()
                            .done(function(){
                                $(".close-bttn").fadeIn("fast");
                                $("#img-frame").html(data).fadeIn("fast");
                                $(this).css("text-align", "center");
                            });
                            
                            
                        }else{
                            $('#frame').html('There was a problem with the image.');
                            
                        }
                    }
                });
        
}
