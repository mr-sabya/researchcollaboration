<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //notification list
    public function index()
    {
        $user = User::find(Auth::user()->id);
        $notifications = $user->notifications;
        return view('frontend.notification.index', compact('notifications'));
    }

    public function show($id)
    {
        $user = User::find(Auth::user()->id);
        $notification = $user->notifications->where('id', $id)->first();
        $notification->markAsRead();

        $room = Room::where('id', $notification->data['data']['room_id'])->first();
        if($room){
            return redirect()->route('room.show', $room->id);
        }else
            return back();
    }
}
