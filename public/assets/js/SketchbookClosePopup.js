(function(){

       $(".close-bttn").click(function(){
           var percentThumbs=.89;
           var percentFrame=.05;
           var parentWidth =$('.view').width();
            var thumbsWidth =  Math.round(percentThumbs*parentWidth);
            var frameWidth =  Math.round(percentFrame*parentWidth);
         $('#frame').html("").animate({width:0,padding:0},300);
          $('.book-wrap').animate({width:"100%"},300).css("overflow-y","visible","overflow-x","scroll");
    }); 
})();