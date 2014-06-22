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
     $(".diag-btm-img").css({ "background-image": "url("+IMG_URL+featWidg.getBtmName()+")", "background-repeat": "none" });
     $(".diag-mid-img").css({ "background-image": "url("+IMG_URL+featWidg.getMidName()+")" ,"background-repeat": "none" });
     $(".diag-top-img").css({ "left":featWidg.getTopLeft(), "top": featWidg.getTopTop(), "background-image": "url("+IMG_URL+featWidg.getTopName()+")","background-repeat": "none"  }).fadeIn("slow");
    setInterval(function(){CycleImgs(featWidg)} , 3500);

}

function CycleImgs(featWidg){ 
    featWidg.SetNextCycle();
     $(".diag-btm-img").css({ "background-image": "url("+IMG_URL+featWidg.getBtmName()+")" });
     $(".diag-mid-img").css({ "background-image": "url("+IMG_URL+featWidg.getMidName()+")" });
     $(".diag-top-img").css({ "background-image": "url("+IMG_URL+featWidg.getTopName()+")" ,"left":featWidg.getTopLeft(), "top": featWidg.getTopTop() });
     
}

function SetLeftTop(left, top, imgFileName,id){
    $(id).css({"left":left+"px", "top":top+"px", "background-image": "url("+IMG_URL+imgFileName+")" });
}