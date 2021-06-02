<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\message;
use App\RoomUser;
use DB;
use Auth;
use App\Room;
use App\User;
use Illuminate\Support\Collection;
use App\Events\chatroom;
class ChatroomController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendMessage(Request $request){
        # insert new message
        $insertMessage = new message();
        $insertMessage->message   = $request->input('message') ;
        $insertMessage->room_id   = $request->input('room_id') ;
        $insertMessage->sender_id = Auth::user()->id ;
        $insertMessage->save();
        $test =  Room::find($request->input('room_id'))->users->map(function($value,$index) use ($insertMessage){
            // return $value;
            broadcast(new chatroom($insertMessage,$value['id']) )->toOthers();
        })->all();
        return (['test'=>$test,'room_id'=>$request->input('room_id'),'message'=>$request->input('message')]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showMessages($room_id)
    {
        $messages = message::where('room_id',$room_id)->latest()->limit(10)->get();
        $filter_messages = collect($messages)->map(function($value,$index){
            $value['type'] = Auth::user()->id == $value->sender_id ? 'ks-from' : 'ks-self';
            return $value;
        })->all();
        return (['messages'=>$filter_messages]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function lastMessage($room_id){
        $messages = message::where([
            'room_id'      =>$room_id,
            'sender_id'    =>Auth::user()->id
        ])->latest('created_at')->limit(1)->get();
        return (['messages'=>$messages]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function getPrevsMessages(){
        $rooms_id = Auth::user()->rooms->pluck('id')->toArray();
        $rooms    = Room::select('creator_id','id','created_at')
                    ->whereIN('id',$rooms_id)
                    ->with(['users'=>function($query){
                        $query->where('users.id','!=',Auth::user()->id)->select('users.id','users.name')->groupBy('users.id');
                    }])->with([
                    'messages'=>function($query){
                        $query->latest()->limit(1);
                    }])->get();

        return (['messages'=> $rooms]);
    }
}
