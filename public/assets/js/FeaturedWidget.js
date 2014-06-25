var IMG_URL= "/assets/gallery/"; 

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
        return this.imgs[this.top]['file_name'];
    }
    this.getMidName=function(){    
        return this.imgs[this.mid]['file_name'];
    }
    this.getBtmName=function(){    
        return this.imgs[this.btm]['file_name'];
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
     $('.diag-btm').attr("href",URLtoGallery+"/"+featWidg.getBtmID());
     $('.diag-mid').attr("href",URLtoGallery+"/"+featWidg.getMidID());
     $('.diag-top').attr("href",URLtoGallery+"/"+featWidg.getTopID());
     
     $(".diag-btm-img").css({ "background-image": "url("+IMG_URL+featWidg.getBtmName()+")", "background-size":"cover"});
     $(".diag-mid-img").css({ "background-image": "url("+IMG_URL+featWidg.getMidName()+")" ,"background-repeat": "none" ,"background-size":"cover"});
     $(".diag-top-img").css({ "left":featWidg.getTopLeft(), "top": featWidg.getTopTop(), "background-image": "url("+IMG_URL+featWidg.getTopName()+")","background-repeat": "none","background-size":"cover"}).fadeIn("slow");
    setInterval(function(){CycleImgs(featWidg)} , 3500);

}

function CycleImgs(featWidg){ 
    featWidg.SetNextCycle();
     $('.diag-btm').attr("href",URLtoGallery+"/"+featWidg.getBtmID());
     $('.diag-mid').attr("href",URLtoGallery+"/"+featWidg.getMidID());
     $('.diag-top').attr("href",URLtoGallery+"/"+featWidg.getTopID());
     
     $(".diag-btm-img").css({ "background-image": "url("+IMG_URL+featWidg.getBtmName()+")" });
     $(".diag-mid-img").css({ "background-image": "url("+IMG_URL+featWidg.getMidName()+")" });
     $(".diag-top-img").css({"left":featWidg.getTopLeft(), "top": featWidg.getTopTop(), "background-image": "url("+IMG_URL+featWidg.getTopName()+")" });
     
}

function SetLeftTop(left, top, imgFileName,id){
    $(id).css({"left":left+"px", "top":top+"px", "background-image": "url("+IMG_URL+imgFileName+")" });
}