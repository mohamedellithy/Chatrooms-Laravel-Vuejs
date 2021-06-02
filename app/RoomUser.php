<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RoomUser extends Pivot
{
    //

    function ChannelKeys($room_id){
        return $this->where('room_id',$room_id)->pluck('user_id')->toArray();
    }
}
