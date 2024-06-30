<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
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
        return view('frontend.topics.index', compact('topics'));
    }

    public function show($id)
    {
        $topic = Topic::findOrFail(intval($id));
        $rooms = Room::where('topic_id', $topic->id)->get();
        return view('frontend.topics.show', compact('topic', 'rooms'));  
    }
}
