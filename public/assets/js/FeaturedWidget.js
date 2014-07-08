$(document).ready(function(){
    StartFeaturedWidget(featured);
});

function FeaturedWidget (images) {
    this.top=0;  
    this.mid=1;
    this.btm=2;
    this.imgs=images;

    this.imgCount= this.imgs.length;
    
    this.getTopName=function(){   
        return "ICON_"+this.imgs[this.top]['file_name'];
    }
    this.getMidName=function(){    
        return "ICON_"+this.imgs[this.mid]['file_name'];
    }
    this.getBtmName=function(){    
        return "ICON_"+this.imgs[this.btm]['file_name'];
    }
    
    this.getTopID=function(){   
        return this.imgs[this.top]['id'];
    }
    this.getMidID=function(){    
        return this.imgs[this.mid]['id'];
    }
    this.getBtmID=function(){    
        return this.imgs[this.btm]['id'];
    }
    
    this.getTopLeft=function(){    
        return this.imgs[this.top]['pos_x'];
    }
    this.getTopTop= function(){    
        return this.imgs[this.top]['pos_y'];
    }
    
    
}

FeaturedWidget.prototype.SetNextCycle=function(){
       /*FIND A BETTER WAY..?*******************************************/
        if(this.top==this.imgCount-1){
            this.top=0;
        }
        else{
            this.top++;
        }
        if(this.mid==this.imgCount-1){
            this.mid=0;
        }
        else{
            this.mid++;
        }
        if(this.btm==this.imgCount-1){
            this.btm=0;
        }
        else{
            this.btm++;
        }
    }


function StartFeaturedWidget(featuredImgs) {
     var featWidg= new FeaturedWidget(featuredImgs);
     $('#img-a-left').attr("href",GALLERY_URL+"/"+featWidg.getBtmID());
     $('#img-a-mid').attr("href",GALLERY_URL+"/"+featWidg.getMidID());
     $('#img-a-right').attr("href",GALLERY_URL+"/"+featWidg.getTopID());
     
     $("#img-left").css({ "background-image": "url("+FEAT_THUMB_URL+featWidg.getBtmName()+")", "background-repeat": "none"});
     $("#img-mid").css({ "background-image": "url("+FEAT_THUMB_URL+featWidg.getMidName()+")" ,"background-repeat": "none" });
     $("#img-right").css({  "background-image": "url("+FEAT_THUMB_URL+featWidg.getTopName()+")","background-repeat": "none"});
    setInterval(function(){CycleImgs(featWidg)} , 3500);

}

function CycleImgs(featWidg){ 
    featWidg.SetNextCycle();
     $('#img-a-left').attr("href",GALLERY_URL+"/"+featWidg.getBtmID());
     $('#img-a-mid').attr("href",GALLERY_URL+"/"+featWidg.getMidID());
     $('#img-a-right').attr("href",GALLERY_URL+"/"+featWidg.getTopID());
     
     
      $("#img-left").css({ "background-image": "url("+FEAT_THUMB_URL+featWidg.getBtmName()+")"});
     $("#img-mid").css({ "background-image": "url("+FEAT_THUMB_URL+featWidg.getMidName()+")" });
     $("#img-right").css({  "background-image": "url("+FEAT_THUMB_URL+featWidg.getTopName()+")"});
     
}

function SetLeftTop(left, top, imgFileName,id){
    $(id).css({"left":left+"px", "top":top+"px", "background-image": "url("+FEAT_THUMB_URL+imgFileName+")" });
}