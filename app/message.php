<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    //
     protected $fillable = ['message','sender_id','room_id','status'];

    # function WithUsers($query){
    #     return $query->
    # }

     function sender(){
        return $this->belongsTo('App\User','sender_id','id');
    }
}
