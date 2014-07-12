<?php

class UpdatesController extends BaseController {
/********************Public Functions*******************************/
/*****************************************************************/
  public function __construct() {
        $this->beforeFilter('auth');
    }  
  public function UpdateNew()
    {
        $updates=Update::orderBy('date_created','desc')->get();
        $toEdit=new update;
        return View::make('admin-updates-new',compact('updates','toEdit'));
    }
/*****************************************************************/
    public function SaveUpdateNew()
    {           
            /*Save the Image info to the Database*/
            $update= new Update;
             $this->SetValsFromInput($update);
           $update->save();
        return Redirect::action('UpdatesController@UpdateNew')->with('message',"Update saved successfully.");
    }
/*****************************************************************/
    public function UpdateEdit(Update $update)
    {   
        $updates=Update::orderBy('date_created','desc')->get();
        $toEdit=$update;
        return View::make('admin-updates', compact('updates' , 'toEdit') );
    }
/*****************************************************************/    
    public function SaveUpdateEdit(Update $update)
    {           
            /*Save the Image info to the Database*/
             $this->SetValsFromInput($update);
           $update->save();
        return Redirect::action('UpdatesController@UpdateEdit',$update->id)->with('message',"Update saved successfully.");
    }
/*****************************************************************/    
    public function UpdateDelete($update)
    {
        $update->delete();
        $redirect=Update::first();
        if($redirect ==null){
            return Redirect::action('UpdatesController@UpdateNew');
        }
        else{
             return Redirect::action('UpdatesController@UpdateEdit',$redirect->id)->with('message',"Update deleted successfully.");
        }
    }
 /*****************************************************************/       
    public function SetValsFromInput($update) {
         $update->date_created=Input::get('date');
            $update->type=Input::get('updt-type');
            $update->FA_icon_name=Input::get('icon-name');
            /*Set the other image parameters  from Input:: and save*/
           $update->message=Input::get('mssg');
    }
}
