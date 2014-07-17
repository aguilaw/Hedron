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
        $validate = $this->validate(Input::all());
        if($validate->passes()){
            $user= new User;
           /* $user->fname=Input::get('fname');
            $user->lname=Input::get('lname');
            $user->password=Hash::make(Input::get('password'));
            $user->role=Input::get('role');
            $user->email=Input::get('email');*/
            $this->SetValsFromInput($user);
            $user->save();
            return Redirect::action('UsersController@UserEdit',$user->id)->with('message',"User saved successfully.");
        }
        else{
           return Redirect::action('UsersController@UserNew')->withErrors($validate->messages())
                                                                                         ->withInput(Input::except('password','password_confirmation'));
        }
    }
/*****************************************************************/
    public function UserEdit(User $user)
    {  
        if(($user->email == Config::get('globals.WEBMASTER_@')) && (Auth::user()->email != Config::get('globals.WEBMASTER_@'))){
             return Redirect::action('UsersController@UserNew')->with('message',"Not Authorized to access Webmaster's Information");
        }
        $users=User::orderBy('lname','asc')->get();
        $toEdit=$user;
        return View::make('admin-users', compact('users' , 'toEdit') );
    }
/*****************************************************************/    
    public function SaveUserEdit(User $user)
    {           
            /*Save the Image info to the Database*/
       /* $user->fname=Input::get('fname');
        $user->lname=Input::get('lname');
        $user->password=Hash::make(Input::get('password'));
        $user->role=Input::get('role');
        $cuser->email=Input::get('email')*/
        if(Input::get('email')==$user->email){
            $validate = $this->validate(Input::except('email'));
        }
        else{
            $validate = $this->validate(Input::all());
         }
         if($validate->passes()){
            $this->SetValsFromInput($user);
            $user->save();
            return Redirect::action('UsersController@UserEdit',$user->id)->with('message',"User saved successfully.");
        }
        else{
           return Redirect::action('UsersController@UserEdit',$user->id)->withErrors($validate->messages());
        }
    }
/*****************************************************************/    
    public function UserDelete($user)
    {
        $user->delete();
        $redirect=User::first();
        if($redirect ==null){
            return Redirect::action('UsersController@UserNew')->with('message',"User deleted successfully.");
        }
        else{
             return Redirect::action('UsersController@UserEdit',$redirect->id)->with('message',"User deleted successfully.");
        }
    }
 /*****************************************************************/    
    public function SetValsFromInput($user) {
        $user->fname=Input::get('fname');
        $user->lname=Input::get('lname');
        if(Input::has('password')){
            $user->password=Hash::make(Input::get('password'));
        }
        else{}
        $user->role=Input::get('role');
        $user->email=Input::get('email');
     }
/*****************************************************************/    
    public function validate($input) {

        $rules = array(
            'fname' =>'Required|Alpha|Min:1|Max:200',
            'lname' => 'Required|Alpha|Min:1|Max:200',
            'role'    =>'Required|Alpha|Min:1|Max:200',
            'email'  => array('Between:3,64','Email','Unique:users','regex:/[^+*@]/'),
            'password'  =>array('regex:/[A-Za-z0-9_@#$%^&*()!,.`+=-~:;"\/) ]/','Between:4,20','Confirmed'),
            'password_verify'=>'AlphaNum|Between:4,20',
        );

        return Validator::make($input, $rules);
    }
}
