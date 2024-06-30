<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::where('is_admin', 0)->orderBy('id', 'DESC')->paginate(15);
        return view('backend.user.index', compact('users'));    
    }
}
