<?php

class ImagesController extends BaseController {
/*Constants*/
    private $DEST_PATH="../public/assets/gallery/";
    
/********************Public Functions*******************************/
/*****************************************************************/ 
    public function ImageNew()
    {
        $images=Image::orderBy('date_created','desc')->get();
        $toEdit=new Image;
        return View::make('admin-images-new',compact('images','toEdit'));
    }
/*****************************************************************/    
    public function ImageEdit(Image $image)
    {   
        $images=Image::orderBy('date_created','desc')->get();
        $toEdit=$image;
        return View::make('admin-images', compact('images' , 'toEdit') );
    }
/*****************************************************************/  
     public function SaveImageEdit($image)
    {
            if(($image->title != Input::get('title')) || ($image->date_created != Input::get('date'))){
                $title = str_replace(' ', '-', Input::get('title'));
                $date=explode('-',Input::get('date'));
                $year=$date[0];
                $newFileName=$year."_".$title.".".$image->file_ext;
                rename($this->DEST_PATH.$image->file_name, $this->DEST_PATH.$newFileName);
                $image->file_name=$newFileName;
            }
            else{}
         /*Set the other image parameters  from Input:: and save*/
        $this->SetOtherParams($image);
        return Redirect::action('ImagesController@ImageEdit',$image->id);
    }   
 /*****************************************************************/     
    public function SaveImageNew(){
        if (Input::file('file')->isValid()){
            /*Move the image into the gallery folder*/
            $title = str_replace(' ', '-', Input::get('title'));
            $ext=Input::file('file')->getClientOriginalExtension();
            $date=explode('-',Input::get('date'));
            $year=$date[0];            
            $fileName=$year."_".$title.".".$ext;
            
            Input::file('file')->move($this->DEST_PATH,$fileName);
            
            /*Save the Image info to the Database*/
            $image= new Image;
            
            //gather additional file information             
            list($width, $height) = getimagesize($this->DEST_PATH.$fileName);
            $fileSize=Input::file('file')->getClientSize();
            
            $image->file_name=$fileName;
            $image->file_ext=$ext;
            $image->file_size=$this->HumanFileSize($fileSize);
            $image->file_width=$width;
            $image->file_height=$height;
            
            /*Set the other image parameters  from Input:: and save*/
            $this->SetOtherParams($image);
        }
        else{ }
        
        return Redirect::action('ImagesController@ImageEdit',$image->id);
    }
 /*****************************************************************/     
    public function ImageDelete($image){
        $image->delete();
        $redirect=Image::first();
        if($redirect==null){
            return Redirect::action('ImagesController@ImageNew');
         }
         else{
            return Redirect::action('ImagesController@ImageEdit',$redirect->id);
         }

    
    }   
 /********************PRIVATE FUNCTIONS******************************/   
/*****************************************************************/    
    private function HumanFilesize($bytes) {
        $size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.2f", $bytes / pow(1024, $factor)) . @$size[$factor];
    }
/*****************************************************************/  
    private function SetOtherParams($image){
         $image->title=Input::get('title');
            $image->date_created=Input::get('date');
            $image->tools=Input::get('tools');
            $image->project_type=Input::get('type');
            $image->description=Input::get('desc');
                $image->featured=Input::get('featured');
            
            $image->pos_x=Input::get('left');
            $image->pos_y=Input::get('top');
            $image->save();

    }
    
   
}