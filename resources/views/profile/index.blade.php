@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row pb-4" >
        <div class="col-12" style="text-align: end;">
            <a href="/" class="text-decoration-none">Home</a>
        </div>
        
    </div>
    <div class="row">
        <div class="col-2">
            <img src="{{$user->profile->profileImage()}}" alt="img" class="rounded-circle h-100  w-100"
            />
        </div>
        <div class="col-10 ps-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-4">
                    <div class="h3">{{$user->username }}</div>
                    <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
                </div>
                
                @can('update',$user->profile)
                <a href="/post/create">Add New Post</a>
                @endcan
            </div>
            @can('update',$user->profile)
            <div><a href="/profile/{{$user->id}}/edit">Edit Profile</a></div>
            @endcan
            <div class="d-flex">
                <div><strong>{{$postCount}}</strong> Posts</div>
                <div class="ps-3"><strong>{{$followersCount}} </strong> Followers</div>
                <div class="ps-3"><strong>{{$followingCount}} </strong>Following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{$user->profile->title }}</div>
            <div >{{$user->profile->description }}</div>
            <div><a href="#">{{$user->profile->url}}  </a></div>
        </div>
    <div>
    <div class="row pt-5">
        @foreach ($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/post/{{$post->id}}">
                <img src ="/storage/{{$post->image}}"  class="w-100" alt="img"/>
            </a>    
        </div>
        @endforeach
        
        
    </div>
</div>
@endsection
