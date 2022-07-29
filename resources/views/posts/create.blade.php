@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/post" enctype="multipart/form-data" method="POST">
        @csrf
    <div class="row">
        <div class="col-8 offset-2">
            <div class="row text-center mb-4">
                <h2>Add New Post </h2>
            </div>
            <div class="row mb-3">
                <label for="caption" class="col-md-4 col-form-label text-md-end">Post Caption</label>
                <div class="col-md-6">
                    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" 
                        caption="caption" name ="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus>

                        @error('caption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="image" class="col-md-4 col-form-label text-md-end">Post Image</label>
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
                <button class="btn btn-primary">Add New Post</button>
            </div>  
        </div>
    </div>
    </form>
   
</div>
@endsection
