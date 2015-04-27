<?php namespace hedron\Http\Controllers;


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
        return view('home');
	}
/***********************************************************************/
	public function ShowGallery($toShow=null)
	{
        $artworks=Artwork::where('link_to','=','gallery')
                        ->orderBy('date_created','desc')
                        ->get();
		return view('gallery',compact('artworks','currYear','toShow'));
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
         $images=Image::where('link_to','=','sketchbook')
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
}
