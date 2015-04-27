<?php namespace hedron\Http\Controllers;
use Auth;
use hedron\Post;
use Illuminate\Http\Request;

class PostsController extends Controller {
/*Constants*/
/********************Public Functions*******************************
****************************************************************/
        public function __construct() {
            $this->middleware('auth');
        }
    /***************************************************************/
       public function index()
       {
           $posts=Post::orderBy('date_created','desc')->get();
           return view('admin.posts',compact('posts'));
       }
 /***************************************************************/
    public function create()
    {
        return view('admin.posts-new');
    }

/*****************************************************************/
    public function edit(Post $posts)
    {
        return "in controller edit post";
    }
    /**************************************************************** */
     public function update($posts)
    {
        return "in controller updated post";
    }
 /*****************************************************************/
    public function store(){

        return "in controller strored post";
    }
 /*****************************************************************/
    public function Delete($posts){
        $posts->delete();
        $redirect=Post::first();
        if($redirect==null){
            return Redirect::action('PostController@MakeNewPost')->with('message',"Post deleted successfully.");
         }
         else{
            return Redirect::action('PostController@EditPost',$redirect->id)->with('message',"Post deleted successfully.");
         }


    }
}
