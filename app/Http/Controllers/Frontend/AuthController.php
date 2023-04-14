<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
	public function showLoginForm()
	{
		return view('frontend.auth.login');
	}

	public function login(Request $request)
	{
		$request->validate([
			'email' => 'required|max:255|email',
			'password' => 'required',
		]);

		if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => 0])) {
			$request->session()->regenerate();

			return redirect()->route('profile');
		}

		return back()->withErrors([
			'email' => 'The provided credentials do not match our records.',
		])->onlyInput('email');
	}

	public function logout(Request $request)
	{
		Auth::logout();
		return redirect()->route('user.login.form');
	}

	public function showRegisterForm()
	{
		return view('frontend.auth.register');
	}

	public function register(Request $request)
	{
		$request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|max:255|email|unique:users',
			'phone' => 'required|max:14|unique:users',
			'password' => 'required|string|min:8|confirmed',
		]);

		$user = new User;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->phone = $request->phone;
		$user->password = Hash::make($request->password);
		$user->save();
		Auth::login($user);

		return redirect()->route('profile');
	}
}
