(function(){
    $(".diag-thumb").click(function(){
        $.ajax({
                url: $(this).attr('id'),
                datatype:"json",
                success: function(data){
                    if(data){
                        $("#frame").html(data).fadeIn("slow");
                       
                    }else{
                        $('#load-more-ajax').html('No more posts to show.');
                        
                    }
                }
            });
    }); 
    
/*  $(document).mouseup(function (e)
{
    var container = new Array();
    container.push($('#frame'));
    container.push($('.diag-thumb-img'));
    
    $.each(container, function(i, val) {
       /* if (!val.is(e.target) // if the target of the click isn't the container...
            && val.has(e.target).length === 0) // ... nor a descendant of the container
        {
        alert(e.target);
            $("#frame").hide();
        //}
    });
});*/
    
})();
