@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-1">
            <img src="img/1.jpeg" alt="img" 
            style="width:100px;height:100px;border-radius: 50%;"/>
        </div>
        <div class="col-11 ps-5">
            <div><h1>PhotoGram</h1></div>
            <div class="d-flex">
                <div><strong>153</strong> Posts</div>
                <div class="ps-3"><strong>23k </strong> Followers</div>
                <div class="ps-3"><strong>12 </strong>Following</div>
            </div>
            <div class="pt-4 font-weight-bold">www.google.com</div>
            <div >Even the simplest things can be beautiful.</div>
            <div><a href="#">www.google.com</a></div>
        </div>
    <div>
    <div class="row pt-5">
        <div class="col-4"><img src="img/2.jfif"  class="w-100" alt="img"/></div>
        <div class="col-4"><img src="img/3.jfif"  class="w-100" alt="img"/></div>
        <div class="col-4"><img src="img/4.jfif"  class="w-100" alt="img"/></div>
    </div>
</div>
@endsection
