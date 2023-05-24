<?php

namespace App\Http\Controllers\Backend;

use App\Models\Area;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResearchAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::orderBy('id', 'DESC')->get();
        return view('backend.area.index', compact('areas'));
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
            'name' => 'string|required|max:255',
            'slug' => 'string|required|max:255|unique:areas',
        ]);

        $area = new Area;
        $area->name = $request->name;
        $area->slug = $request->slug;

        $area->save();

        return redirect()->route('admin.research-area.index');
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
        $area = Area::findOrFail(intval($id));
        return view('backend.area.edit', compact('area'));
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
        $area = Area::findOrFail(intval($id));

        if($request->slug == $area->slug){
            $request->validate([
                'name' => 'string|required|max:255',
                'slug' => 'string|required|max:255',
            ]);

        }else{
            $request->validate([
                'name' => 'string|required|max:255',
                'slug' => 'string|required|max:255|unique:areas',
            ]);

        }
        
        $area->name = $request->name;
        $area->slug = $request->slug;

        $area->save();

        return redirect()->route('admin.research-area.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
