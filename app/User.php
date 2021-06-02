<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    function messages(){
        return $this->HasMany('App\message','sender_id','id');
    }

    function rooms(){
        return $this->belongsToMany('App\Room','room_user','user_id','room_id');
    }

    function User_IDS(){
        return $this->belongsToMany('App\Room','room_user','user_id','room_id')->withPivot('user_id');
    }

    function canJoinRoom(){
        return true;
    }

    function channelkey(){
        $id_users = $this->rooms()->pluck('user_id')->toArray();
        $channelKey = implode('',$id_users);
        return $channelKey;
    }

    function UserActive(){
        return $this->update(['is_active'=>1]);
    }
}
