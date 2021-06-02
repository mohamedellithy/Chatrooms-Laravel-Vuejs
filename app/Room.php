<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Room extends Model
{
    //

    function messages(){
        return $this->HasMany('App\message','room_id','id');
    }

    function users(){
        return $this->belongsToMany(User::class,'room_user','room_id','user_id');
    }



}
