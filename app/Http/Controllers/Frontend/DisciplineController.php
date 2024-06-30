<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class DisciplineController extends Controller
{
    //

    public function show($id)
    {
        $department = Department::findOrFail(intval($id));
        $users = User::where('department_id', $id)->get();
        return view('frontend.department.show', compact('users', 'department'));
    }
}
