(function(){

       $(".close-bttn").click(function(){
           var percentThumbs=.89;
           var percentFrame=.05;
           var parentWidth =$('.view').width();
            var thumbsWidth =  Math.round(percentThumbs*parentWidth);
            var frameWidth =  Math.round(percentFrame*parentWidth);
         $('#frame').html("").animate({width:frameWidth},300);
          $('.book-wrap').animate({width:thumbsWidth},300).css("overflow-y","visible","overflow-x","scroll");
    }); 
})();