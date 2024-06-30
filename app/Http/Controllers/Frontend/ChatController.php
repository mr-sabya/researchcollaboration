<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Room;
use App\Models\RoomMember;
use Illuminate\Http\Request;

class ChatController extends Controller
{/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index($id)
    {
        $room = Room::where('id', $id)->first();
        $room_member = RoomMember::where('user_id', auth()->user()->id)->where('room_id', $room->id)->first();
        $room_members = RoomMember::where('room_id', $room->id)->with('user')->get();
        $chats = Chat::where('room_id', $room->id)->get();
        return view('frontend.chat.index', compact('room', 'room_member', 'room_members', 'chats'));
    }
}
