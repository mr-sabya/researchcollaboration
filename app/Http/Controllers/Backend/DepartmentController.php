<?php

namespace App\Http\Controllers\Backend;

use App\Models\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::orderBy('id', 'DESC')->get();
        return view('backend.department.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|required|unique:departments|max:255',
        ]);

        $department =  new Department;
        $department->name = $request->name;
        $department->save();

        return redirect()->route('admin.department.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::findOrFail(intval($id));
        return view('backend.department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $department = Department::findOrFail(intval($id));

        if($department->name == $request->name){
            $request->validate([
                'name' => 'bail|required|max:255',
            ]);
        }else{
            $request->validate([
                'name' => 'bail|required|max:255|unique:departments',
            ]);
        }
        

        $department->name = $request->name;
        $department->save();

        return redirect()->route('admin.department.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::findOrFail(intval($id));
        
        if($department->users->count() > 0){
            return back()->with('error', 'You can not delete this data');
        }else{
            $department->delete();
            return redirect()->route('admin.department.index')->with('success', 'Department has been deleted successfully');
        }
    }
}
