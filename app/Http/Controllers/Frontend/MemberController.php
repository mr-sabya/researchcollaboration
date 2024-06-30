<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{/**
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
        $users = User::where('is_admin', 0)->latest()->get();
        return view('frontend.member.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail(intval($id));
        $rooms = Room::where('user_id', $user->id)->get();

        return view('frontend.member.show', compact('user', 'rooms'));
    }
}
