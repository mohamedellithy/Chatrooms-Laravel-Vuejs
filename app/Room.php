<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //

    function messages(){
        return $this->HasMany('App\message','room_id','id');
    }

    function users(){
        return $this->belongsToMany('App\User','room_users','room_id','user_id');
    }



}
