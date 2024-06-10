<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index(){
        $rooms=Room::all();
        return view('rooms',compact('rooms'));
    }
    public function showRoom(Room $room){
        $messages=$room->messages()->with('user')->get();
        return view('show-room',compact('room','messages'));
    }
}
