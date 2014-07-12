/*get more updates when the bottom of the updates box is reached*/
/*****sq-rnd = the box containing the list of updates*/
$(document).ready(function(){
    var page=2;
    $('#sq-rnd').data('ajaxready', true).scroll(function(){
        if ($(this).data('ajaxready') == false) return;
        var scrollPosition = $(this).scrollTop() + $(this).outerHeight();
        var divTotalHeight = this.scrollHeight 
        
        if( scrollPosition == divTotalHeight ){
            $('#load-more-ajax').show();
            $(this).data('ajaxready', false);
            $.ajax({
                url: "/?page="+page,
                datatype:"json",
                success: function(data){
                    if(data){
                        $("#updates-widget").append(data);
                        $('#load-more-ajax').hide();
                        page=page+1;
                    }else{
                        $('#load-more-ajax').html('No more posts to show.');
                        
                    }
                },
                complete:function(jqXHR, textStatus){
                    $(this).data('ajaxready', true);
                }
            });
              $(this).data('ajaxready', true);
        }
        else{$('#load-more-ajax').hide();}
    });
});
