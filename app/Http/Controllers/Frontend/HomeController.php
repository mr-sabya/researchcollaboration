<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Room;
use App\Models\Topic;
use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
    	$topics = Topic::orderBy('name', 'ASC')->get();
		$departments = Department::orderBy('name', 'ASC')->get();
		
        $user = Auth::user();

        $rooms = array();
        // return $user_topics;

        
    	$rooms = Room::whereHas('topic', function ($query) use ($user) {
            $query->whereIn('id', $user->topics()->pluck('id')->toArray());
        })->get();
        // return $rooms;
    	return view('frontend.home.index', compact('topics', 'departments', 'rooms'));
    }
}
