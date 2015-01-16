$(document).ready(function(){

    
    AddFeaturedToHTML(featured);    
    displaceImgs();
    rotateImgs();
});


function AddFeaturedToHTML(featImgs){
    var leftFrame= $(".frame").first();
    var  midFrame=leftFrame.next();
    var  rightFrame=midFrame.next();
    for (var i=0;i<featImgs.length;i++){
           var imgUrl= HOME_URL+'/'+featImgs[i]['link_to']+'/'+featImgs[i]['id'];
         var imgSource= FEAT_THUMB_URL+"ICON_"+featImgs[i]['file_name'];
            
                $("<a  id='img-a-left' href="+imgUrl+"><img id='img-left' src="+imgSource+"></a>").appendTo(leftFrame).css("opacity",0);
                 $("<a  id='img-a-mid' href="+imgUrl+"><img id='img-mid' src="+imgSource+"></a>").appendTo(midFrame).css("opacity",0);
                  $("<a  id='img-a-right' href="+imgUrl+"><img id='img-right' src="+imgSource+"></a>").appendTo(rightFrame).css("opacity",0);           
    }
  
}

function displaceImgs(){
        var leftFrame= $(".frame").first();
    var  midFrame=leftFrame.next();
    var  rightFrame=midFrame.next();
      /*Move the first image to the back so  all the frames display the previous image to the frame on the right*/
    midFrame.children().first().appendTo(midFrame);  
    leftFrame.children().first().appendTo(leftFrame); 
    leftFrame.children().first().appendTo(leftFrame);
    
}
function rotateImgs(){
     var duration = 500;
     var interval= 2000;
         var leftFrame= $(".frame").first();
    var  midFrame=leftFrame.next();
    var  rightFrame=midFrame.next();
     midFrame.children()
                    .first()
                    .css({"opacity":1})
                    .animate({"opacity": 0,"duration": duration })
                    .next()
                    .animate({"opacity": 1,"duration": duration })
                    .promise()
                    .done(function(){
                        $(this).prev().css("opacity",0).appendTo(midFrame);
                        });
          leftFrame.children()
                    .first()
                    .css({"opacity":1})
                    .animate({"opacity": 0,"duration": duration })
                    .next()
                    .animate({"opacity": 1,"duration": duration })
                    .promise()
                    .done(function(){
                        $(this).prev().css("opacity",0).appendTo(leftFrame);
                        });
         rightFrame.children()
                    .first()
                    .css({"opacity":1})
                    .animate({"opacity": 0,"duration": duration })
                    .next()
                    .animate({"opacity": 1,"duration": duration })
                    .promise()
                    .done(function(){
                       $(this).prev().css("opacity",0).appendTo(rightFrame);
                        setTimeout(rotateImgs, interval);
                        });
    
}
