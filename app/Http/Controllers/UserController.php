<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index(Request $request){
        $search =  $request->get('search');
        $users = User::where('username','like','%'.$search.'%')->orderBy('id')->paginate(6);
        return view('user.index',compact('users'));
    }
   
}
