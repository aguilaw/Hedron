(function(){
    $("#blanket, #sketch-popup").click(function(){
         $('#blanket').fadeOut("slow");
         $('#sketch-popup').fadeOut("slow");
    }); 
    $(".diag-thumb").click(function(){
        $.ajax({
                url: $(this).attr('id'),
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
    }); 
})();
