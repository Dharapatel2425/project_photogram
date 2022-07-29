<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
       $users = auth()->user()->following()->pluck('profiles.user_id');
       //$users_id = auth()->user()->id;
       
       $posts = Post::whereIn('user_id',$users)->with('user')->latest()->paginate(5);

        return view('posts.index',compact('posts'));
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        
       $data = $this->validate($request,[
        'caption' => 'required',
        'image'=> 'mimes:jpeg,jpg,png,gif,jifi|required|max:10000',
       ]);


        $imagePath = request('image')->store('uploads','public');
              
        $image = Image::make(public_path("storage/".$imagePath))->resize(300, 200);
        
        $image->save();
       
       auth()->user()->posts()->create([
        'caption' => $data['caption'],
        'image'=> $imagePath,
       ]);
       $id = auth()->user()->id;
       return redirect('/profile/'.$id);
        
    }

    public function show(\App\Models\Post $post){
        return view('posts.show',compact('post'));
    }
}
