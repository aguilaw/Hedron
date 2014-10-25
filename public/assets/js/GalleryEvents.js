(function(){
$(".gallery").css({"color":"#feb900","background-color":"#383838"});
    $("#blanket, #sketch-popup").click(function(){
         $('#blanket').fadeOut("slow");
         $('#sketch-popup').fadeOut("slow");
    }); 
    $(".diag-thumb").click(function(){
        loadGalleryImg($(this).attr('id'));
    }); 
    
})();

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
