<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage(){
        $imagePath = ($this->image) ? $this->image :'profile/uQcq6hxA6Zlmcqfzl90OHZV0j4nStWDEshIhiqKI.png';
       return '/storage/'. $imagePath;   
    }

    public function followers(){
        
        return $this->belongsToMany(User::class);
    }
    public function user(){
        return $this->belongsTo(user::class);
    }
}
