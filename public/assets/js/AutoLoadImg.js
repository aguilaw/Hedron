function loadSketch(ajaxURL){
    $.ajax({
                    url: ajaxURL,
                    datatype:"json",
                    success: function(data){
                        if(data){
                            $("#frame").html(data);
                                 $('#frame').animate({width:"60%"},300,function() {
        // Animation complete.
      });
                                   $('.book-wrap').animate({width:"30%",overflow:"visible"},300,function() {});
                                   $('.book-wrap').css("overflow","visible");
                           
                                $(".sketch").fadeIn("slow");
                           
                           
                        }else{
                            $('#frame').html('There was a problem with the image.');
                            
                        }
                    }
                });
        
}

function loadGalleryImg(ajaxURL){
    $.ajax({
                url: ajaxURL,
                datatype:"json",
                success: function(data){
                    if(data){
                        $("#sketch-popup").html(data);
                        $('#sketch-popup').fadeIn("slow");
                        $('#blanket').fadeIn("slow");
                    }else{
                        $('#load-more-ajax').html('No more posts to show.');
                        
                    }
                }
            });
}
