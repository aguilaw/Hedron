<?php

class AdminController extends BaseController {

    public function __construct() {
        $this->beforeFilter('auth',array('except' => array('AdminLogin','VerifyLogin')));
    }
/*****************************************************************/    
	public function AdminLogin()
    {  
        return View::make('admin-login');
        
	}
/****************************************************************
Display the homepage for the admin dashboard
*****************************************************************/    
	public function AdminDashboard()
    {  
         return Redirect::action('ImagesController@MakeNewImage');
        
	}
/****************************************************************
accept the credentials provided by the user and authenticate.
It they are valid the admin dashboard is displayed 
****************************************************************/    
	public function VerifyLogin()
	{
        if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
            
            return Redirect::to('admin/images/new')->with('message', 'You are now logged in!');
        } 
        else {
            return Redirect::to('adminLogin')
            ->with('message', 'Your username/password combination was incorrect')
            ->withInput();
        }
        
	}

/*****************************************************************/        
    public function Logout()
    {   
        Auth::logout();
        return Redirect::action('PagesController@ShowHome');
    
    }

}