<?php namespace hedron\Http\Controllers;
use Auth;
use hedron\Artwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtworksController extends Controller {
/*Constants*/
/********************Public Functions*******************************
****************************************************************/
        protected $THUMB_FILE_PATH;
        protected $ARTWORK_FILE_PATH;

        public function __construct() {
            $this->middleware('auth');
            $this->THUMB_FILE_PATH = public_path()."/images/gallery/thumb/";
            $this->ARTWORK_FILE_PATH = public_path()."/images/gallery/";
        }
    /***************************************************************/
       public function index()
       {

           $artworks= Artwork::orderBy('title','DESC')->get();
           return view('admin.artworks',compact('artworks'));
       }
 /***************************************************************/
    public function create()
    {
        return view('admin.artworks-new');
    }

/*****************************************************************/
    public function edit(Artwork $artwork)
    {
        return view('admin.artworks-edit', compact( 'artwork') );
    }
    /**************************************************************** */
     public function update(Artwork $artwork, Request $request)
    {
        $artwork->fill($request->all());

               if ($request->hasFile('file_upload')){
                        $this->deleteImgsFromFileSystem($artwork->file_name);

                        list($ext,$fileName,$width,$height,$fileSize)=$this->SaveImginFS($artwork->slug,$request->file('file_upload'));
                        $artwork->file_name=$fileName;
                        $artwork->file_extension=$ext;
                        $artwork->file_size=$this->HumanFileSize($fileSize);
                        $artwork->file_width=$width;
                        $artwork->file_height=$height;

                        $this->MakeThumb($artwork,425,170,"425x170",100);
                        $this->MakeThumb($artwork,292,170,"220x170",100);
                        $this->MakeThumb($artwork,292,null,"292x",100);
                        $this->MakeThumb($artwork,220,null,"220xx",100);
               }
               else{
                    /*CHECK that the old file still exists befor renaming it.*/
                    /*TODO:rename all thumbnails*/
                    if(Storage::exists('/gallery/'.$artwork->filename)){
                        $newFileName=$artwork->slug.".".$artwork->file_extension;
                        rename($this->ARTWORK_FILE_PATH.$artwork->file_name, $this->ARTWORK_FILE_PATH.$newFileName);
                        $artwork->file_name=$newFileName;
                    }

              }

        $artwork->save();
        return redirect()->route('artworks_path',$artwork->slug)->with('message',"artwork saved succesfully.");

    }
 /*****************************************************************/
    public function store(Request $request){

        $artwork=Artwork::create($input = $request->all());


        /*if(!Request::file('file')->isValid()){
             return Redirect()->route('createArtwork_path')->with('message',"image Size Exceeds Limit")
                                                                                                ->withInput(Request::except('file'));
        }*/
        list($ext,$fileName,$width,$height,$fileSize)=$this->SaveImginFS($artwork->slug,$request->file('file_upload'));
    /*     $validate = $this->validate(Input::all());
         if($validate->passes() && Input::file('file')->isValid()){

*/
            $artwork->file_name=$fileName;
            $artwork->file_extension=$ext;
            $artwork->file_size=$this->HumanFileSize($fileSize);
            $artwork->file_width=$width;
            $artwork->file_height=$height;

            //Set the other artwork parameters  from Input:: and save
            $artwork->save();
            $this->MakeThumb($artwork,425,170,"425x170",150);
            $this->MakeThumb($artwork,292,170,"220x170",150);
            $this->MakeThumb($artwork,292,null,"292x",100);
            $this->MakeThumb($artwork,220,null,"220xx",100);
            return redirect()->route('editArtwork_path',$artwork->slug)->with('message',"New artwork added successfully.");

    }
 /*****************************************************************/
    public function Delete(Artwork $artwork){

        $this->deleteImgsFromFileSystem($artwork->file_name);
        $artwork->delete();
        return redirect()->route('artworks_path')->with('message',"Artwork deleted successfully.");

    }
 /********************PRIVATE FUNCTIONS******************************/
/*****************************************************************/
    private function deleteImgsFromFileSystem($filename){
        if (Storage::exists('/gallery/'.$filename))
        {
            Storage::delete('/gallery/'.$filename);
        }
        if (Storage::exists('/gallery/thumb/'.'220x_'.$filename))
        {
            Storage::delete('/gallery/thumb/'.'220x_'.$filename);
        }
        if (Storage::exists('/gallery/thumb/'.'292x_'.$filename))
        {
            Storage::delete('/gallery/thumb/'.'292x_'.$filename);
        }
        if (Storage::exists('/gallery/thumb/'.'425x170_'.$filename))
        {
            Storage::delete('/gallery/thumb/'.'425x170_'.$filename);
        }
    }
/*****************************************************************/

    private function HumanFilesize($bytes) {
        $size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.2f", $bytes / pow(1024, $factor)) . @$size[$factor];
    }
/*****************************************************************/
     private function SaveImginFS($slug, $file){
        $ext=$file->getClientOriginalExtension();
        $fileName=$slug.".".$ext;
        $file->move($this->ARTWORK_FILE_PATH,$fileName);
        $fileSize=$file->getClientSize();
        list($width, $height) = getimagesize($this->ARTWORK_FILE_PATH.$fileName);
        return array($ext,$fileName,$width,$height,$fileSize);

     }

  /*******************************************************************/
    function MakeThumb($artwork,$thumbWidth,$thumbHeight,$type,$percent) {

        $dest=$this->THUMB_FILE_PATH.$type."_".$artwork->file_name;
        $src=$this->ARTWORK_FILE_PATH.$artwork->file_name;

        /* read the source artwork */
        /*create the directory if it doesnt exist*/
        if (!file_exists($this->THUMB_FILE_PATH)) {
            mkdir($this->THUMB_FILE_PATH, 0777, true);
        }

        if($artwork->file_extension =="png"){
            $source_artwork = imagecreatefrompng($src);
        }
        else{
            $source_artwork = imagecreatefromjpeg($src);
        }

        if ($thumbHeight == null){
            $thumbHeight=($thumbWidth*$artwork->file_height)/$artwork->file_width;
        }

        $factor=$artwork->file_width/(($percent/100)*$thumbWidth);
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

        /* create a new, "virtual" artwork */
            $widthOffset=abs($artwork->horizontal_offset);

        $heightOffset=abs($artwork->vertical_offset);
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
