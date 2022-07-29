@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row pb-4" >
        <div class="col-12" style="text-align: end;">
            <a href="/" class="text-decoration-none">Home</a>
        </div>
        
    </div>
    <div class="pb-4 pt-4 d-flex justify-content-center"><h4>All Users</h4></div>
        <div class=" d-flex justify-content-center">
            <div class="">
                <form action="{{route('user.index')}}" method="GET" role="search">
                {{csrf_field()}}
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search Users">
                            <span class="input-group-btn  ps-2">
                                <button type="submit" class="btn btn-info"><i class="fa fa-search"></i></button>
                            </span>
                    </div>
                </form> 
            </div>
        </div>
        @foreach($users as $user)
        <div class="pb-4 pt-4 d-flex justify-content-center">
            <a href="/profile/{{ $user->id}}" class="text-decoration-none">{{$user->username}}</a>
        </div>
        @endforeach
    </div>
@endsection
