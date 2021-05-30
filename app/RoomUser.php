<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomUser extends Model
{
    //

    function ChannelKeys($room_id){
        return $this->where('room_id',$room_id)->pluck('user_id')->toArray();
    }
}
