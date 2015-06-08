<?php namespace hedron\Http\Controllers;
use Auth;
use hedron\User;
use hedron\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class UsersController extends Controller {
/*Constants*/
use AuthenticatesAndRegistersUsers;

/********************Public Functions*******************************
****************************************************************/
        public function __construct(Guard $auth, Registrar $registrar) {
            $this->auth = $auth;
    		$this->registrar = $registrar;
        }
    /***************************************************************/

       public function index()
       {
          // $users=User::orderBy('date_created','desc')->get();
           return view('admin/users');
       }
 /***************************************************************/
    /*public function create()
    {
        return view('admin.users-new');
    }

/*****************************************************************/
    public function edit( $user)
    {

        return view('admin.admin-users'); //, compact('users' , 'toEdit') );
    }
    /**************************************************************** */
     public function update($user)
    {
        // $validate = $this->validate(Input::all());
        // if($validate->passes()){
                /*if the uploaded file has changed replace the last file with the new one*/

            return "in controller updated user";//Redirect::action('UsersController@EditUser',$user->id)->with('message',"user saved succesfully.");
        //}
        //else{
        //   return Redirect::action('UsersController@EditUser',$user->id)->withErrors($validate->messages());
        //}
    }
 /*****************************************************************/

 /*****************************************************************/
    public function Delete($user){
        $user->delete();
        $redirect=User::first();
        if($redirect==null){
            return Redirect::action('UsersController@MakeNewUser')->with('message',"User deleted successfully.");
         }
         else{
            return Redirect::action('UsersController@EditUser',$redirect->id)->with('message',"User deleted successfully.");
         }


    }
}
