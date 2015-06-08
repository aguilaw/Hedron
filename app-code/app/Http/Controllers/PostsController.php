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
    public function edit(Post $post)
    {
        return view('admin.posts-edit',compact('post'));
    }
    /**************************************************************** */
     public function update(Post $post, Request $request)
    {
        $post->fill($request->all())->save();
        return redirect()->route('posts_path')->with('message',"post saved succesfully.");
    }
 /*****************************************************************/
    public function store(Request $request){

        $post=Post::create($input = $request->all());
        $post->save();
        return redirect()->route('posts_path')->with('message',"post saved succesfully.");
    }
 /*****************************************************************/
    public function Delete($posts){
        $posts->delete();
        return redirect()->route('posts_path')->with('message',"post deleted successfully.");
        }
}
