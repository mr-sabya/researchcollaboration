<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\RoomMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
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


    //approve room member
    public function approveMember($id)
    {
        $room_member = RoomMember::findOrFail(intval($id));
        $room_member->is_approved = 1;
        $room_member->save();

        return back();
    }



    public function chat(Request $request)
    {
        $chat = new Chat();
        $chat->user_id = auth()->user()->id;
        $chat->room_id = $request->room_id;
        $chat->message = $request->message;
        $chat->save();

        return back();
    }
}
