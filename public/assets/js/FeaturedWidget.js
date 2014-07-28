$(document).ready(function(){
    StartFeaturedWidget(featured);
});

function FeaturedWidget (images) {
    this.right=0;  
    this.mid=1;
    this.left=2;
    this.imgs=images;

    this.imgCount= this.imgs.length;
    
    this.getRightName=function(){   
        return "ICON_"+this.imgs[this.right]['file_name'];
    }
    this.getMidName=function(){    
        return "ICON_"+this.imgs[this.mid]['file_name'];
    }
    this.getLeftName=function(){    
        return "ICON_"+this.imgs[this.left]['file_name'];
    }
    
    this.getRightID=function(){   
        return this.imgs[this.right]['id'];
    }
    this.getMidID=function(){    
        return this.imgs[this.mid]['id'];
    }
    this.getLeftID=function(){    
        return this.imgs[this.left]['id'];
    }
    
    this.getRightHref=function(){   
        return HOME_URL+'/'+this.imgs[this.right]['link_to']+'/'+this.imgs[this.right]['id'];
    }
    this.getMidHref=function(){    
         return HOME_URL+'/'+this.imgs[this.mid]['link_to']+'/'+this.imgs[this.mid]['id'];
    }
    this.getLeftHref=function(){    
        return HOME_URL+'/'+this.imgs[this.left]['link_to']+'/'+this.imgs[this.left]['id'];
    }
    
    
    
}

FeaturedWidget.prototype.SetNextCycle=function(){
       /*FIND A BETTER WAY..?*******************************************/
        if(this.right==this.imgCount-1){
            this.right=0;
        }
        else{
            this.right++;
        }
        if(this.mid==this.imgCount-1){
            this.mid=0;
        }
        else{
            this.mid++;
        }
        if(this.left==this.imgCount-1){
            this.left=0;
        }
        else{
            this.left++;
        }
    }


function StartFeaturedWidget(featuredImgs) {
     var featWidg= new FeaturedWidget(featuredImgs);
     $('#img-a-left').attr("href",featWidg.getLeftHref());
     $('#img-a-mid').attr("href",featWidg.getMidHref());
     $('#img-a-right').attr("href",featWidg.getRightHref());
     
     $("#img-left").css({ "background-image": "url("+FEAT_THUMB_URL+featWidg.getLeftName()+")", "background-repeat": "none"});
     $("#img-mid").css({ "background-image": "url("+FEAT_THUMB_URL+featWidg.getMidName()+")" ,"background-repeat": "none" });
     $("#img-right").css({  "background-image": "url("+FEAT_THUMB_URL+featWidg.getRightName()+")","background-repeat": "none"});
    setInterval(function(){CycleImgs(featWidg)} , 2500);

}

function CycleImgs(featWidg){ 
    featWidg.SetNextCycle();
     $('#img-a-left').attr("href",featWidg.getLeftHref());
     $('#img-a-mid').attr("href",featWidg.getMidHref());
     $('#img-a-right').attr("href",featWidg.getRightHref());
     
     
      $("#img-left").css({ "background-image": "url("+FEAT_THUMB_URL+featWidg.getLeftName()+")"});
     $("#img-mid").css({ "background-image": "url("+FEAT_THUMB_URL+featWidg.getMidName()+")" });
     $("#img-right").css({  "background-image": "url("+FEAT_THUMB_URL+featWidg.getRightName()+")"});
     
}
