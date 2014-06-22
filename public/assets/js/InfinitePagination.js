/*get more updates when the bottom of the updates box is reached*/
/*****sq-rnd = the box containing the list of updates*/
$(document).ready(function(){
    var page=2;
    $('#sq-rnd').scroll(function(){
        /*Where does th eextra 1px come from? without it sP=111 and sH=112*/
        var scrollPosition = $(this).scrollTop() + $(this).outerHeight()+1;
        var divTotalHeight = this.scrollHeight 
        
        if( scrollPosition == divTotalHeight ){
            $('#load-more-ajax').show();
            $.ajax({
                url: "/?page="+page,
                datatype:"json",
                success: function(data){
                    if(data){
                        $("#updates-widget").append(data);
                        $('#load-more-ajax').hide();
                        page=page+1;
                    }else{
                        $('#load-more-ajax').html('<center>No more posts to show.</center>');
                    }
                }
            });
        }
        else{$('#load-more-ajax').hide();}
    });
});
