<?php

class ImagesController extends BaseController {
/*Constants*/
    
/********************Public Functions*******************************
****************************************************************/
    public function __construct() {
        $this->beforeFilter('auth');
    }
 /***************************************************************/   
    public function MakeNewImage()
    {
        $images=Image::orderBy('date_created','desc')->get();
        $toEdit=new Image;
        return View::make('admin-images-new',compact('images','toEdit'));
    }
    
/*****************************************************************/    
    public function EditImage(Image $image)
    {   
        $images=Image::orderBy('date_created','desc')->get();
        $toEdit=$image;
        return View::make('admin-images', compact('images' , 'toEdit') );
    }
    
/**************************************************************** */  
     public function SaveImageEdit($image)
    {
        $validate = $this->validate(Input::all());
         if($validate->passes()){
                /*if the uploaded file has changed replace the last file with the new one*/
                if (Input::hasFile('file')){
                        unlink(Config::get('globals.DEST_PATH').$image->file_name);
                        list($ext,$fileName,$width,$height,$fileSize)=$this->SaveImginFS($image->id);
                        $image->file_name=$fileName;
                        $image->file_ext=$ext;
                        $image->file_size=$this->HumanFileSize($fileSize);
                        $image->file_width=$width;
                        $image->file_height=$height;
                 }
                     $newFileName=$image->id.".".$image->file_ext;
                    rename(Config::get('globals.DEST_PATH').$image->file_name, Config::get('globals.DEST_PATH').$newFileName);
                    $image->file_name=$newFileName;
             /*Set the other image parameters  from Input:: and save*/
            $this->SetValsFromInput($image);
            $this->MakeThumb($image,380,350,"ICON",200);
            return Redirect::action('ImagesController@EditImage',$image->id)->with('message',"Image saved succesfully.");
        }
        else{
           return Redirect::action('ImagesController@EditImage',$image->id)->withErrors($validate->messages());
        }
    }   
 /*****************************************************************/     
    public function SaveNewImage(){
        if(!Input::file('file')->isValid()){
             return Redirect::action('ImagesController@MakeNewImage')->with('message',"Image Size Exceeds Limit")
                                                                                                ->withInput(Input::except('file'));
        }
        
         $validate = $this->validate(Input::all());
         if($validate->passes() && Input::file('file')->isValid()){
            
            /*Save the Image info to the Database*/
            $image= new Image;
            //save to assign an id
            $image->save();
            list($ext,$fileName,$width,$height,$fileSize)=$this->SaveImginFS($image->id);
            $image->file_name=$fileName;
            $image->file_ext=$ext;
            $image->file_size=$this->HumanFileSize($fileSize);
            $image->file_width=$width;
            $image->file_height=$height;
            
            /*Set the other image parameters  from Input:: and save*/
            $this->SetValsFromInput($image);
            return Redirect::action('ImagesController@EditImage',$image->id)->with('message',"New image added successfully.");
        }
        else{ 
        return Redirect::action('ImagesController@MakeNewImage')->withErrors($validate->messages()) 
                                                                                         ->withInput(Input::except('file'));
        }
    }
 /*****************************************************************/     
    public function DeleteImage($image){
        $image->delete();
        $redirect=Image::first();
        if($redirect==null){
            return Redirect::action('ImagesController@MakeNewImage')->with('message',"Image deleted successfully.");
         }
         else{
            return Redirect::action('ImagesController@EditImage',$redirect->id)->with('message',"Image deleted successfully.");
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
        $ext=Input::file('file')->getClientOriginalExtension();
        $fileName=$id.".".$ext;
        Input::file('file')->move(Config::get('globals.DEST_PATH'),$fileName);
        $fileSize=Input::file('file')->getClientSize();
        list($width, $height) = getimagesize(Config::get('globals.DEST_PATH').$fileName);
       
        
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
    function MakeThumb($image,$thumbWidth,$thumbHeight,$type,$percent) {
    $dest=Config::get('globals.DEST_PATH')."thumb/".$type."_".$image->file_name;
    $src=Config::get('globals.DEST_PATH').$image->file_name;
        /* read the source image */
        /*create the directory if it doesnt exist*/
        if (!file_exists(Config::get('globals.DEST_PATH')."thumb")) {
            mkdir(Config::get('globals.DEST_PATH')."thumb", 0777, true);
        }
        
        if($image->file_ext =="png"){
            $source_image = imagecreatefrompng($src);
        }
        else{
            $source_image = imagecreatefromjpeg($src);
        }
        /*the factor required to scale the thumbsize area to match that in admin/imgs
            if img full height is 800 it is displayed as 700px in dmin/img (width:200% of 350px square)
            the 300px square becomes .875*350=400px*/
        $factor=$image->file_height/(($percent/100)*$thumbHeight);
        
        if( $image->file_height > $image->file_width ){
            // Portrait 
           $desired_width = $thumbWidth*$factor;
           $desired_height = $image->file_height * ( ($thumbHeight*$factor) / $image->file_height);
         }
        else{
             //Landscape
             
            $desired_height = $thumbHeight*$factor;
            $desired_width = $image->file_width * ( $thumbWidth*$factor / $image->file_width );
        }
         //   return "f".$factor." h".$desired_height." w".$desired_width;
        /* create a new, "virtual" image */
            $widthOffset=abs(Input::get('left'));
        
        $heightOffset=abs(Input::get('top'))*1.6;
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
                'file' => 'Image','Max:2000',
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