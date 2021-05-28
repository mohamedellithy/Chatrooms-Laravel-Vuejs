<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //

    function messages(){
        return $this->HasMany('App\message','room_id','id');
    }

}
