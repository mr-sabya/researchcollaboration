<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use App\Models\Room;
use App\Http\Controllers\Controller;
use App\Models\RoomMember;
use Illuminate\Http\Request;


class RoomController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $rooms = Room::orderBy('name', 'ASC')->paginate(15);
        return view('frontend.room.index', compact('rooms'));
    }

    public function show($id)
    {
        $room = Room::findOrFail(intval($id));
        return view('frontend.room.show', compact('room'));
    }

    public function joinChat($id)
    {
        $room = Room::findOrFail(intval($id));

        $newChat = new RoomMember();
        $newChat->user_id = auth()->user()->id;
        $newChat->room_id = $room->id;
        $newChat->save();

        return back()->with('success', 'Thank you for your request, Owner will approve your request');
    }
}
