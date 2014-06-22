<?php

class AdminController extends BaseController {

	public function AdminLogin()
    {  
       if(Session::has('user')){
            return Redirect::action('ImagesController@ImageNew');
        }
        else{
            return View::make('admin-login');
        }
	}

	public function VerifyLogin()
	{
        $admin= User::where('email', '=', Input::get('email'))
            ->where('password','=', sha1(Input::get('password')))
             ->where('role','=', 'admin')
            ->get();
		
		if ($admin->count()==1){
            $admin_name=$admin->first()->lname." , ".$admin->first()->fname;
			Session::put('user',$admin_name);
			return Redirect::action('ImagesController@ImageNew');
		}
        else {
            return Redirect::action('AdminController@AdminLogin');
        }
	}
    
    public function Logout()
    {   
        Session::forget('user');
        return Redirect::action('HomeController@ShowHome');
    
    }
            
    
	public function CreateUpdate()
	{
		/*$update=new Update;
		$update->type='mssg';
		$update->mssg='Will be adding more sketches soon!';
		date_default_timezone_set('America/Los_Angeles');
		$update->date= date('Y-m-d');
		$update->save();*/
	}
    public function AddImgs()
    {

    }
}