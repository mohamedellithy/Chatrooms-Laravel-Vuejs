<?php
use App\RoomUser;
/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


Broadcast::channel('ChatroomChannel.{user_id}', function ($user,$user_id){
    # $rooms_allow = RoomUser::where('user_id',$user->id)->pluck('room_id')->toArray();
    # $status      = !empty($rooms_allow[$room_id]) ? true : false;
     return true;

});


Broadcast::channel('LiveChatroom', function ($user){
    # $rooms_allow = RoomUser::where('user_id',$user->id)->pluck('room_id')->toArray();
    # $status      = !empty($rooms_allow[$room_id]) ? true : false;
     return $user;

});
