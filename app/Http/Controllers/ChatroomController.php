<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\message;
use DB;
use Auth;
use Illuminate\Support\Collection;
class ChatroomController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function send_message(Request $request){
        //
        $insertMessage = new message();
        $insertMessage->message   = $request->input('message') ;
        $insertMessage->room_id   = $request->input('room_id') ;
        $insertMessage->sender_id = Auth::user()->id ;
        $insertMessage->save();

        return (['room_id'=>$request->input('room_id'),'message'=>$request->input('message')]);
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
        $rooms = Auth::user()->rooms->unique('id');
        $messages = collect($rooms)->map(function($value,$index){
             return $value->messages;
        })->flatten()->sortByDesc('created_at')->unique('room_id');
        return (['messages'=> $messages]);
    }


}
