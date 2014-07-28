(function(){
       $(".close-bttn").click(function(){
         $('#frame').html("").animate({width:"5%"},500,function() {});
          $('.book-wrap').animate({width:"85%"},300,function() {}).css("overflow","visible");
    }); 
})();