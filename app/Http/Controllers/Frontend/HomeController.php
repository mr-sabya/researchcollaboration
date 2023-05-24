<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Topic;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    	$topics = Topic::orderBy('name', 'ASC')->take(4)->get();
    	return view('frontend.home.index', compact('topics'));
    }
}
