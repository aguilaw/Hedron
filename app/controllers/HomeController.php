<?php

class HomeController extends BaseController {
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
    
}