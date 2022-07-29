<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;

class ProfilesController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postCount = Cache::remember(
            'count.posts.'.$user->id,
            now()->addSeconds(30),
            function () use ($user){
                return $user->posts->count();
        });
        $followersCount = Cache::remember(
            'count.followers.'.$user->id,
            now()->addSeconds(30),
            function () use ($user){
                return $user->profile->followers->count();
        });
        $followingCount = Cache::remember(
            'count.following.'.$user->id,
            now()->addSeconds(30),
            function () use ($user){
                return $user->following->count();
        });
        
        
        

        return view('profile.index',compact('user','follows','postCount','followersCount','followingCount'));
    }
    public function edit(User $user){
        $this->authorize('update',$user->profile);
        return view('profile.edit',compact('user'));    
    }
    
    public function update(User $user){
        $this->authorize('update',$user->profile);
        $data = request()->validate([
            'title' => '',
            'description' => '',
            'url' => 'url',
            'image'=> '',
           ]);
           
           

           if(request('image')){
            
            $imagePath = request('image')->store('profile','public');
            
            $image = Image::make(public_path('storage/'.$imagePath))->resize(300,200);
            $image->save();
            $imageArr = ['image' => $imagePath];
           }

           auth()->user()->profile->update(array_merge(
                $data,
                $imageArr ?? [],
                
           ));

           

           $id = $user->id;
           return redirect('/profile/'.$id);
          
    }
}
