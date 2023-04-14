<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
	public function profile()
	{
		if(!Auth::user()){
			return redirect()->route('user.login.form');
		}

		$user = User::where('id', Auth::user()->id)->first();
		return view('frontend.profile.profile', compact('user'));
	}
}
