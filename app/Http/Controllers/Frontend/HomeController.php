<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Topic;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    	$topics = Topic::orderBy('name', 'ASC')->take(4)->get();
    	$users = User::where('is_admin', 0)->latest()->take(10)->get();
    	return view('frontend.home.index', compact('topics', 'users'));
    }
}
