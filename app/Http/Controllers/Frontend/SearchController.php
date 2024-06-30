<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
        $search = $request->search;
        $rooms = Room::where('name', 'LIKE', "%$search%")->paginate(15);
        // return $rooms;
        return view('frontend.search.index', compact('rooms', 'search'));
    }
}
