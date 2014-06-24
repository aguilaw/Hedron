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
        $validate = $this->validate(Input::all());
         if($validate->passes()){
                /*if the uploaded file has changed replace the last file with the new one*/
                if (Input::hasFile('file')){
                        unlink($this->DEST_PATH.$image->file_name);
                        list($title,$ext,$date,$year,$fileName,$width,$height,$fileSize)=$this->SaveImginFS();
                        $image->file_name=$fileName;
                        $image->file_ext=$ext;
                        $image->file_size=$this->HumanFileSize($fileSize);
                        $image->file_width=$width;
                        $image->file_height=$height;
                 }
                 /*if the title or the year  change the file is renamed to maintain the naming convention*/
                elseif(($image->title != Input::get('title')) || ($image->date_created != Input::get('date'))){
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
        else{
           return Redirect::action('ImagesController@ImageEdit',$image->id)->withErrors($validate->messages());
        }
    }   
 /*****************************************************************/     
    public function SaveImageNew(){
        if (Input::file('file')->isValid()){
            list($title,$ext,$date,$year,$fileName,$width,$height,$fileSize)=$this->SaveImginFS();
            
            /*Save the Image info to the Database*/
            $image= new Image;
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
     private function SaveImginFS(){
     
        $title = str_replace(' ', '-', Input::get('title'));
        $date=explode('-',Input::get('date'));
        $year=$date[0];            
        $ext=Input::file('file')->getClientOriginalExtension();
        $fileName=$year."_".$title.".".$ext;
        
        
        Input::file('file')->move($this->DEST_PATH,$fileName);
        $fileSize=Input::file('file')->getClientSize();
        list($width, $height) = getimagesize($this->DEST_PATH.$fileName);
       
        
        return array($title,$ext,$date,$year,$fileName,$width,$height,$fileSize);
     
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
/*****************************************************************/    
    public function validate($input) {

        $rules = array(
                'tools'  =>'Required|Alpha|Min:3|Max:200',
                'file' => 'Image',
                'type'=>'required|alpha',
                'title'=>'alphaNum',
               // 'desc'=>'alpha|max:300', /*fails eventhough input only contained letters and nums*/
                'featured'=>'alpha',
               // 'left'=>'numeric',
               // 'top'=>'numeric',
                
        );

        return Validator::make($input, $rules);
}
   
}