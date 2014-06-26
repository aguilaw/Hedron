<?php

class UsersController extends BaseController {
/********************Public Functions*******************************/
/*****************************************************************/
      public function __construct() {
        $this->beforeFilter('auth');
    }
    
    public function UserNew()
    {
        $users=User::orderBy('lname','asc')->get();
        $toEdit=new User;
        return View::make('admin-users-new',compact('users','toEdit'));
    }
/*****************************************************************/
    public function SaveUserNew()
    {           
        /*Save the Image info to the Database*/
        $user= new User;
        $user->fname=Input::get('fname');
        $user->lname=Input::get('lname');
        $user->password=Hash::make(Input::get('password'));
        $user->role=Input::get('role');
        $user->email=Input::get('email');
        $user->save();
        return Redirect::action('UsersController@UserNew');
    }
/*****************************************************************/
    public function UserEdit(User $user)
    {   
        $users=User::orderBy('lname','asc')->get();
        $toEdit=$user;
        return View::make('admin-users', compact('users' , 'toEdit') );
    }
/*****************************************************************/    
    public function SaveUserEdit(User $user)
    {           
            /*Save the Image info to the Database*/
        $user->fname=Input::get('fname');
        $user->lname=Input::get('lname');
        $user->password=Hash::make(Input::get('password'));
        $user->role=Input::get('role');
        $user->email=Input::get('email');
        $user->save();
        return Redirect::action('UsersController@UserEdit',$user->id);
    }
/*****************************************************************/    
    public function UserDelete($user)
    {
        $user->delete();
        $redirect=User::first();
        if($redirect ==null){
            return Redirect::action('UsersController@UserNew');
        }
        else{
             return Redirect::action('UsersController@UserEdit',$redirect->id);
        }
    }
    
/*****************************************************************/    
    public function validate($input) {

        $rules = array(
            'fname' =>'Required|Alpha|Min:1|Max:200',
            'lname' => 'Required|Alpha|Min:1|Max:200',
            'role'    =>'Required|Alpha|Min:1|Max:200',
            'email'  => 'Required|Between:3,64|Email|Unique:users',
            'password'  =>'Required|AlphaNum|Between:4,20|Confirmed',
            'password_verify'=>'Required|AlphaNum|Between:4,20',
        );

        return Validator::make($input, $rules);
    }
}
