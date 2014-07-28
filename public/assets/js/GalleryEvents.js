(function(){
    $("#blanket, #sketch-popup").click(function(){
         $('#blanket').fadeOut("slow");
         $('#sketch-popup').fadeOut("slow");
    }); 
    $(".diag-thumb").click(function(){
        loadGalleryImg($(this).attr('id'));
    }); 
})();
