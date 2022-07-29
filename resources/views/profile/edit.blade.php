@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')
    <div class="row">
        <div class="col-8 offset-2">
            <div class="row text-center mb-4">
                <h2>Edit Profile </h2>
            </div>
            <div class="row mb-3">
                <label for="title" class="col-md-4 col-form-label text-md-end">Title</label>
                <div class="col-md-6">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" 
                        title="title" name ="title" value="{{ old('title') ?? $user->profile->title }} "
                         required autocomplete="title" autofocus>

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-md-4 col-form-label text-md-end">Description</label>
                <div class="col-md-6">
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" 
                        title="description" name ="description" value="{{ old('description')?? $user->profile->description }}" 
                        required autocomplete="description" autofocus>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="url" class="col-md-4 col-form-label text-md-end">URL</label>
                <div class="col-md-6">
                    <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" 
                        title="url" name ="url" value="{{ old('url') ?? $user->profile->url}}" required  autofocus>

                        @error('url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="image" class="col-md-4 col-form-label text-md-end">Profile Image</label>
                <div class="col-md-6">
                    <input id="image" type="file" 
                            class="form-control-file" 
                            id="image" name="image"/>

                    @error('image')
                        <strong>{{ $message }}</strong>
                    @enderror        
                </div>
            </div>
            <div class="text-center">
                <button class="btn btn-primary">Save Profile</button>
            </div>  
        </div>
    </div>
    </form>
   
</div>
@endsection
