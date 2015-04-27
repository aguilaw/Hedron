<?php namespace hedron\Http\Controllers;
use Auth;
use hedron\Artwork;
use Illuminate\Http\Request;

class ArtworksController extends Controller {
/*Constants*/
/********************Public Functions*******************************
****************************************************************/
        public function __construct() {
            $this->middleware('auth');
        }
    /***************************************************************/
       public function index()
       {
           $artworks=Artwork::orderBy('date_created','desc')->get();
           return view('admin/artworks',compact('artworks'));
       }
 /***************************************************************/
    public function create()
    {
        return view('admin.artworks-new');
    }

/*****************************************************************/
    public function edit(Artwork $artwork)
    {
        $artworks=Artwork::orderBy('date_created','desc')->get();
        $toEdit=$artwork;
        return view('admin.admin-artworks'); //, compact('artworks' , 'toEdit') );
    }
    /**************************************************************** */
     public function update($artwork)
    {
        // $validate = $this->validate(Input::all());
        // if($validate->passes()){
                /*if the uploaded file has changed replace the last file with the new one*/
                if (Input::hasFile('file')){
                        unlink(Config::get('globals.DEST_PATH').$artwork->file_name);
                        list($ext,$fileName,$width,$height,$fileSize)=$this->SaveImginFS($artwork->id);
                        $artwork->file_name=$fileName;
                        $artwork->file_ext=$ext;
                        $artwork->file_size=$this->HumanFileSize($fileSize);
                        $artwork->file_width=$width;
                        $artwork->file_height=$height;
               }
                     $newFileName=$artwork->id.".".$artwork->file_ext;
                    rename(Config::get('globals.DEST_PATH').$artwork->file_name, Config::get('globals.DEST_PATH').$newFileName);
                    $artwork->file_name=$newFileName;
             /*Set the other artwork parameters  from Input:: and save*/
            $this->SetValsFromInput($artwork);
            $this->MakeThumb($artwork,380,350,"ICON",200);
            return Redirect::action('ArtworksController@EditArtwork',$artwork->id)->with('message',"artwork saved succesfully.");
        //}
        //else{
        //   return Redirect::action('ArtworksController@EditArtwork',$artwork->id)->withErrors($validate->messages());
        //}
    }
 /*****************************************************************/
    public function store(){
        if(!Input::file('file')->isValid()){
             return Redirect::action('ArtworksController@MakeNewArtwork')->with('message',"image Size Exceeds Limit")
                                                                                                ->withInput(Input::except('file'));
        }

         $validate = $this->validate(Input::all());
         if($validate->passes() && Input::file('file')->isValid()){

            /*Save the artwork info to the Database*/
            $artwork= new Artwork;
            //save to assign an id
            $artwork->save();
            list($ext,$fileName,$width,$height,$fileSize)=$this->SaveImginFS($artwork->id);
            $artwork->file_name=$fileName;
            $artwork->file_ext=$ext;
            $artwork->file_size=$this->HumanFileSize($fileSize);
            $artwork->file_width=$width;
            $artwork->file_height=$height;

            /*Set the other artwork parameters  from Input:: and save*/
            $this->SetValsFromInput($artwork);
            return Redirect::action('ArtworksController@EditArtwork',$artwork->id)->with('message',"New artwork added successfully.");
        }
        else{
        return Redirect::action('ArtworksController@MakeNewArtwork')->withErrors($validate->messages())
                                                                                         ->withInput(Input::except('file'));
        }
    }
 /*****************************************************************/
    public function Delete($artwork){
        $artwork->delete();
        $redirect=Artwork::first();
        if($redirect==null){
            return Redirect::action('ArtworksController@MakeNewArtwork')->with('message',"Artwork deleted successfully.");
         }
         else{
            return Redirect::action('ArtworksController@EditArtwork',$redirect->id)->with('message',"Artwork deleted successfully.");
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
    private function SetValsFromInput($artwork){
         $artwork->title=Input::get('title');
            $artwork->date_created=Input::get('date');
            $artwork->tools=Input::get('tools');
            /*when the project type is not one of the defaults get data from text box*/
            if(Input::get('type')=="Other"){
                $artwork->project_type=Input::get('type-other-val');
            }
            else{
                 $artwork->project_type=Input::get('type');
            }
            $artwork->description=Input::get('desc');
            if(Input::get('featured') != null){
                $artwork->featured=Input::get('featured');
            }
            else{
                $artwork->featured="";
            }
            $artwork->link_to=Input::get('link-to');

            $artwork->pos_x=Input::get('left');
            $artwork->pos_y=Input::get('top');
            $artwork->save();

    }
  /*******************************************************************/
    function MakeThumb($artwork,$thumbWidth,$thumbHeight,$type,$percent) {
    $dest=Config::get('globals.DEST_PATH')."thumb/".$type."_".$artwork->file_name;
    $src=Config::get('globals.DEST_PATH').$artwork->file_name;
        /* read the source artwork */
        /*create the directory if it doesnt exist*/
        if (!file_exists(Config::get('globals.DEST_PATH')."thumb")) {
            mkdir(Config::get('globals.DEST_PATH')."thumb", 0777, true);
        }

        if($artwork->file_ext =="png"){
            $source_artwork = imagecreatefrompng($src);
        }
        else{
            $source_artwork = imagecreatefromjpeg($src);
        }
        /*the factor required to scale the thumbsize area to match that in admin/imgs
            if img full height is 800 it is displayed as 700px in dmin/img (width:200% of 350px square)
            the 300px square becomes .875*350=400px*/
        $factor=$artwork->file_height/(($percent/100)*$thumbHeight);

        if( $artwork->file_height > $artwork->file_width ){
            // Portrait
           $desired_width = $thumbWidth*$factor;
           $desired_height = $artwork->file_height * ( ($thumbHeight*$factor) / $artwork->file_height);
         }
        else{
             //Landscape

            $desired_height = $thumbHeight*$factor;
            $desired_width = $artwork->file_width * ( $thumbWidth*$factor / $artwork->file_width );
        }
         //   return "f".$factor." h".$desired_height." w".$desired_width;
        /* create a new, "virtual" artwork */
            $widthOffset=abs(Input::get('left'));

        $heightOffset=abs(Input::get('top'))*1.6;
        $virtual_artwork = imagecreatetruecolor($thumbWidth, $thumbHeight);

        /* copy source artwork at a resized size */
        imagecopyresampled($virtual_artwork, $source_artwork, 0, 0, $widthOffset, $heightOffset,$thumbWidth, $thumbHeight, $desired_width , $desired_height);

        /* create the physical thumbnail artwork to its destination */
        if($artwork->file_ext =="png"){
           imagepng($virtual_artwork, $dest);
        }
        else{
           imagejpeg($virtual_artwork, $dest);
        }

    }


}
