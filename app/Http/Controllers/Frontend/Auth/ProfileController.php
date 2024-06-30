<?php

namespace App\Http\Controllers\Frontend\Auth;

use Auth;
use App\Models\Area;
use App\Models\User;
use App\Models\Department;
use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
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


	public function profile()
	{
		$user = User::where('id', Auth::user()->id)->first();
		// return $user;
		return view('frontend.profile.profile', compact('user'));
	}

	public function updateProfilePage()
	{
		$user = User::with('topics')->where('id', Auth::user()->id)->first();
		// return $user;
		$departments = Department::all();
		$topics = Topic::all();
		return view('frontend.profile.edit', compact('user', 'departments', 'topics'));
	}


	public function updateProfile(Request $request, $id)
	{
		$user = User::findOrFail(intval($id));


		if ($user->phone == $request->phone) {
			$request->validate([
				'name' => 'required|string|max:255',
				'short_bio' => 'required|string|max:255',
				'phone' => 'required|string|max:15',
			]);
		} else {
			$request->validate([
				'name' => 'required|string|max:255',
				'short_bio' => 'required|string|max:255',
				'phone' => 'required|string|max:15|unique:users',
			]);
		}


		$input = $request->all();
		$user->update($input);

		$user->topics()->sync($request->topics);

		return redirect()->route('profile');
	}



	public function profileImage()
	{
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
			$name = time() . '.' . $image->getClientOriginalName();
			$destinationPath = public_path('/upload/images');
			$image->move($destinationPath, $name);
			$user->image = $name;
		}

		$user->save();

		return redirect()->route('profile');
	}



	// setting
	public function setting()
	{
		$user = User::where('id', Auth::user()->id)->first();

		return view('frontend.profile.setting', compact('user'));
	}


	public function updatePassword(Request $request, $id)
	{
		$request->validate([
			'current_password' => 'required|string|min:8',
			'password' => 'required|string|min:8|confirmed',
		]);

		$user = User::findOrFail(intval($id));

		if (Hash::check($request->current_password, $user->password)) {
			$user->password = Hash::make($request->password);
			$user->save();
			return redirect()->route('profile');
		} else {
			return back()->with('error', 'Current password does not match');
		}
	}
}
