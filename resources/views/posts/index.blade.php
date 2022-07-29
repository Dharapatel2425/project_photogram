@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row pb-4" >
        <div class="col-6">
            <a href="/user" class="text-decoration-none">Show Other Users</a>
        </div>
        <div class="col-6" style="text-align: end;">
            <a href="/profile/{{ auth()->user()->id}}" class="text-decoration-none">Profile</a>
        </div>
        
    </div>
    @foreach($posts as $post)
    
    <div class="row">
        <div class="col-6 offset-3">
            <a href="/profile/{{$post->user->id}}" class="text-decoration-none">
                <img src ="/storage/{{$post->image}}"  class="w-100" alt="img"/>       
            </a>
            
        </div>
    </div>
    <div class="row pt-2 pb-4">    
        <div class="col-6 offset-3">
            <div>
                <p><span class="fw-bold">
                    <a href="/profile/{{$post->user->id}}" class="text-decoration-none">
                        <span class="text-dark">{{$post->user->username}}</span>
                    </a>
                </span> {{$post->caption}}</p>
            </div>
        </div>

    </div>
    
    @endforeach
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{$posts->links()}}
        </div>
    </div>
    
            
</div>
@endsection
