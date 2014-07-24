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
        $images=Image::where('link_to','=','gallery')
                        ->orderBy('date_created','desc')
                        ->get();
        $aDate=explode('-',$images->first()->date_created);
         $currYear=$aDate[2];
		return View::make('gallery',compact('images','currYear'));
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
       

         $images=Image::where('link_to','=','sketchbook')
                        ->orderBy('date_created','desc')
                        ->get();     
         $aDate=explode('-',$images->first()->date_created);
         $currYear=$aDate[2];
		return View::make('sketchbook',compact('images','currYear'));
	}
/***********************************************************************/    
    public function ShowSketch($sketch)
	{
        if (Request::ajax()) {
            return Response::json(View::make('show-sketch',compact('sketch'))->render());
        };
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
