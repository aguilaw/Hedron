<?php namespace hedron\Http\Controllers;

use hedron\Artwork;
use hedron\Post;
class PagesController extends Controller {
    public function __construct() {
        $this->middleware('auth',['only' => 'ShowAdminDashboard']);
    }


    public function ShowHome()
	{
          /*$updates=Update::orderBy('date_created','desc')->paginate(3);
          if (Request::ajax()) {
          return Response::json(View::make('home-updates',compact('updates'))->render());
        }
          $featured=Image::where('featured','=','checked')
                                ->get();

		return View::make('home',compact('featured','updates'));*/
        $featured=Artwork::where('featured' ,'=', '1')->take(5)->orderBy('date_created','desc')->get();
        $posts=Post::orderBy('date_created', 'desc')->take(5)->get();
        $items=$this->mergeCollectionsBydate($featured,$posts);
        return view('home',compact('items'));
	}
/***********************************************************************/
	public function ShowWork($toShow=null)
	{
        $thumbnails=Artwork::select('file_name', 'slug','type', 'title','date_created','description','tools','commissioner')->where('display_in','=','gallery')
                        ->orderBy('date_created','desc')
                        ->get();
		return view('work',compact('thumbnails','toShow'));
	}
/***********************************************************************/
	public function ShowAbout()
	{
		return view('about');
	}
/***********************************************************************/
	public function ShowContact()
	{
		return view('contact');
	}
/***********************************************************************/
	public function ShowLatestProject()
	{
		return view('latest-project');
	}
/***********************************************************************/
	public function ShowSketchbook($toShow=null)
	{
        if (Request::ajax()) {
            return Response::json(View::make('show-sketch',compact('toShow'))->render());
        }
         $thumbnails=Artwork::where('link_to','=','sketchbook')
                        ->orderBy('date_created','desc')
                        ->get();
         $aDate=explode('-',$images->first()->date_created);
         $currYear=$aDate[2];
		return View::make('sketchbook',compact('images','currYear','toShow'));
	}


/***********************************************************************/
public function ShowAdminDashboard()
{

     return redirect()->route('artworks_path');

}
/***********************************************************************/
private function mergeCollectionsBydate($c1,$c2){
    $merged=$c2->merge($c1);
    /*$merged->sortByDesc(function($item){
        return $item->date_created;
    });
    */
    $merged->shuffle();
    return $merged;
}

}
