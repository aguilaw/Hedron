<?php

class ImagesController extends BaseController {
/*Constants*/
    private $DEST_PATH="";
    
/********************Public Functions*******************************/
/*****************************************************************/ 
    public function __construct() {
        $this->beforeFilter('auth');
        $this->DEST_PATH=Config::get('globals.DEST_PATH');
    }
    
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
        $validate = $this->validate(Input::all());
         if($validate->passes()){
                /*if the uploaded file has changed replace the last file with the new one*/
                if (Input::hasFile('file')){
                        unlink($this->DEST_PATH.$image->file_name);
                        list($ext,$fileName,$width,$height,$fileSize)=$this->SaveImginFS($image->id);
                        $image->file_name=$fileName;
                        $image->file_ext=$ext;
                        $image->file_size=$this->HumanFileSize($fileSize);
                        $image->file_width=$width;
                        $image->file_height=$height;
                 }
                 /*if the title or the year  change the file is renamed to maintain the naming convention*/
                //elseif(($image->title != Input::get('title')) || ($image->date_created != Input::get('date'))){
                   /* $title = str_replace(' ', '-', Input::get('title'));
                    $date=explode('-',Input::get('date'));
                    $year=$date[0];
                    $newFileName=$year."_".$title.".".$image->file_ext;*/
                     $newFileName=$image->id.".".$image->file_ext;
                    rename($this->DEST_PATH.$image->file_name, $this->DEST_PATH.$newFileName);
                    $image->file_name=$newFileName;
                    
               /* }
                else{}/*
             /*Set the other image parameters  from Input:: and save*/
            $this->SetValsFromInput($image);
            $this->make_thumb($image,580,370,"FEAT",1.2,0);
            $this->make_thumb($image,350,200,"ICON",2.5,0);
            return Redirect::action('ImagesController@ImageEdit',$image->id)->with('message',"Image saved succesfully.");
        }
        else{
           return Redirect::action('ImagesController@ImageEdit',$image->id)->withErrors($validate->messages());
        }
    }   
 /*****************************************************************/     
    public function SaveImageNew(){
        if (Input::file('file')->isValid()){
            
            /*Save the Image info to the Database*/
            $image= new Image;
            $image->save();
             list($ext,$fileName,$width,$height,$fileSize)=$this->SaveImginFS($image->id);
            $image->file_name=$fileName;
            $image->file_ext=$ext;
            $image->file_size=$this->HumanFileSize($fileSize);
            $image->file_width=$width;
            $image->file_height=$height;
            
            /*Set the other image parameters  from Input:: and save*/
            $this->SetValsFromInput($image);
        }
        else{ }
        
        return Redirect::action('ImagesController@ImageEdit',$image->id)->with('message',"New image added successfully.");
    }
 /*****************************************************************/     
    public function ImageDelete($image){
        $image->delete();
        $redirect=Image::first();
        if($redirect==null){
            return Redirect::action('ImagesController@ImageNew')->with('message',"Image deleted successfully.");
         }
         else{
            return Redirect::action('ImagesController@ImageEdit',$redirect->id)->with('message',"Image deleted successfully.");
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
     private function SaveImginFS($id){
     
        /*$title =preg_replace("/[^A-Za-z0-9]/", "_", Input::get('title'));
        $date=explode('-',Input::get('date'));
        $year=$date[0];            
        $fileName=$year."_".$title.".".$ext;*/
         $ext=Input::file('file')->getClientOriginalExtension();
        $fileName=$id.".".$ext;
        Input::file('file')->move($this->DEST_PATH,$fileName);
        $fileSize=Input::file('file')->getClientSize();
        list($width, $height) = getimagesize($this->DEST_PATH.$fileName);
       
        
        return array($ext,$fileName,$width,$height,$fileSize);
     
     }
/*****************************************************************/
    private function SetValsFromInput($image){
         $image->title=Input::get('title');
            $image->date_created=Input::get('date');
            $image->tools=Input::get('tools');
            /*when the project type is not one of the defaults get data from text box*/
            if(Input::get('type')=="Other"){
                $image->project_type=Input::get('type-other-val');
            }
            else{
                 $image->project_type=Input::get('type');
            }
            $image->description=Input::get('desc');
            if(Input::get('featured') != null){
                $image->featured=Input::get('featured');
            }
            else{
                $image->featured="";
            }
            $image->link_to=Input::get('link-to');
           
            $image->pos_x=Input::get('left');
            $image->pos_y=Input::get('top');
            $image->save();

    }
  /*******************************************************************/
    function make_thumb($image,$thumbWidth,$thumbHeight,$type,$factor,$offset) {
    $dest=$this->DEST_PATH."thumb/".$type."_".$image->file_name;
    $src=$this->DEST_PATH.$image->file_name;
        /* read the source image */
        /*create the directory if it doesnt exist*/
        if (!file_exists($this->DEST_PATH."thumb")) {
            mkdir($this->DEST_PATH."thumb", 0777, true);
        }
        
        if($image->file_ext =="png"){
            $source_image = imagecreatefrompng($src);
        }
        else{
            $source_image = imagecreatefromjpeg($src);
        }
        
        if( $image->file_height > $image->file_width ){
            /* Portrait */
           $desired_width = $thumbWidth*$factor;
           $desired_height = $image->file_height * ( ($thumbHeight*$factor) / $image->file_height);
         }
        else{
            /* Landscape */
            $desired_height = $thumbHeight*$factor;
            $desired_width = $image->file_width * ( $thumbWidth*$factor / $image->file_width );
        }
        
        /* create a new, "virtual" image */
            $widthOffset=abs(Input::get('left'))*.70+$offset;
        
        $heightOffset=abs(Input::get('top'))*.65;
        $virtual_image = imagecreatetruecolor($thumbWidth, $thumbHeight);
        
        /* copy source image at a resized size */
        imagecopyresampled($virtual_image, $source_image, 0, 0, $widthOffset, $heightOffset,$thumbWidth, $thumbHeight, $desired_width , $desired_height);
        
        /* create the physical thumbnail image to its destination */
        if($image->file_ext =="png"){
           imagepng($virtual_image, $dest);
        }
        else{
           imagejpeg($virtual_image, $dest);
        }
        
    }
/*****************************************************************/    
    public function validate($input) {

        $rules = array(
                'tools'  =>array('Min:3','Max:200','regex:/[A-Za-z0-9\(,\)\- ]/','required'),
                'file' => 'Image',
                'type'=>array('regex:/[A-Za-z0-9\(,\)\- ]/','required'),
                'title'=>'regex:/[A-Za-z0-9_@#$%^&*()!,.`+=-~:;"\/) ]/',
               // 'desc'=>'alpha|max:300', /*fails eventhough input only contained letters and nums*/
                'featured'=>'alpha',
               // 'left'=>'numeric',
               // 'top'=>'numeric',
        );

        return Validator::make($input, $rules);
}

   
}