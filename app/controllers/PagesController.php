<?php

class PagesController extends BaseController {
    public function ShowHome()
	{
          $updates=Update::orderBy('date_created','desc')->paginate(3);  
          if (Request::ajax()) {
          return Response::json(View::make('home-updates',compact('updates'))->render());
        }
          $featured=Image::where('featured','=','checked')
                                ->get();
        
		return View::make('home',compact('featured','updates'));
	}
/***********************************************************************/
	public function ShowGallery()
	{
		return View::make('coming-soon');
	}
/***********************************************************************/
	public function ShowAbout()
	{
		return View::make('about');
	}
/***********************************************************************/
	public function ShowContact()
	{
		return View::make('contact');
	}
/***********************************************************************/
	public function ShowLatestProject()
	{
		return View::make('latest-project');
	}
/***********************************************************************/
	public function ShowSketchbook()
	{
         $sketches=Image::where('link_to','=','sketchbook')
                        ->orderBy('date_created','desc')
                        ->get();       
		return View::make('sketchbook',compact('sketches'));
	}
/***********************************************************************/    
    public function ShowSketch($sketch)
	{
		return View::make('coming-soon');
	}
/***********************************************************************/    
    public function ShowImage()
	{
		return View::make('coming-soon');
	}
/***********************************************************************/
	public function ShowComingSoon()
	{
		return View::make('coming-soon');
	}
/***********************************************************************/
}
