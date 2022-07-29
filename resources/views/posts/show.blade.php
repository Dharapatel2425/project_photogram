@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src ="/storage/{{$post->image}}"  class="w-100" alt="img"/>
        </div>
        <div class="col-4">
            <div class="d-flex text-center">
                <div class="">
                    <img src="{{$post->user->profile->profileImage()}}" alt="img" 
                        class="rounded-circle" width="40" height="40"/>
                </div>
                <div class="ps-3">
                    <div class="fw-bold pt-2">
                        <a href="/profile/{{$post->user->id}}" class="text-decoration-none">
                            <span class="text-dark">{{$post->user->username}}</span>
                        </a>
                        <!-- <a href="" class="ps-2">Follow</a> -->
                        
                    </div>
                </div>
            </div>
            <hr>
            <div>
                
                <p><span class="fw-bold">
                    <a href="/profile/{{$post->user->id}}" class="text-decoration-none">
                        <span class="text-dark">{{$post->user->username}}</span>
                    </a>
                </span> {{$post->caption}}</p>
            </div>
        </div>

    </div>
    

            
</div>
@endsection
