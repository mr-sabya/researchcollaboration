<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use App\Models\Area;
use App\Models\User;
use App\Models\Department;
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
		// return $user;
		return view('frontend.profile.profile', compact('user'));
	}

	public function updateProfilePage()
	{
		if(!Auth::user()){
			return redirect()->route('user.login.form');
		}

		$user = User::where('id', Auth::user()->id)->first();
		$departments = Department::all();
		$areas = Area::all();
		return view('frontend.profile.edit', compact('user', 'departments', 'areas'));
	}


	public function updateProfile(Request $request, $id)
	{
		$request->validate([
            'name' => 'required|string|max:255',
            'short_bio' => 'required|string|max:255',
        ]);

        $input = $request->all();
        $user = User::findOrFail(intval($id));

        $user->update($input);

        return redirect()->route('profile');
	}



	public function profileImage()
	{
		if(!Auth::user()){
			return redirect()->route('user.login.form');
		}

		$user = User::where('id', Auth::user()->id)->first();
		return view('frontend.profile.edit-image', compact('user'));
	}

	public function updateImage(Request $request)
	{
		$request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048',
        ]);

        $user = User::where('id', Auth::user()->id)->first();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('/upload/images');
            $image->move($destinationPath, $name);
            $user->image = $name;
        }

        $user->save();

        return redirect()->route('profile');
	}
}
