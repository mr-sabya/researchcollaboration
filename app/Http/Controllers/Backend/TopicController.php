<?php

namespace App\Http\Controllers\Backend;

use App\Models\Topic;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::orderBy('id', 'DESC')->get();
        return view('backend.topic.index', compact('topics'));
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
            'slug' => 'string|required|max:255|unique:topics',
            'image' => 'required|image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048',
        ]);


        $topic = new Topic;

        $topic->name = $request->name;
        $topic->slug = $request->slug;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('/upload/images');
            $image->move($destinationPath, $name);
            $topic->image = $name;
        }

        $topic->save();

        return redirect()->route('admin.topic.index');
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
        $topic = Topic::findOrFail(intval($id));
        return view('backend.topic.edit', compact('topic'));
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
        $topic = Topic::findOrFail(intval($id));

        if($request->slug == $topic->slug){
            $request->validate([
                'name' => 'string|required|max:255',
                'slug' => 'string|required|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048',
            ]);
        }else{
            $request->validate([
                'name' => 'string|required|max:255',
                'slug' => 'string|required|max:255|unique:topics',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048',
            ]);
        }

        $topic->name = $request->name;
        $topic->slug = $request->slug;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('/upload/images');
            $image->move($destinationPath, $name);
            $topic->image = $name;
        }

        $topic->save();

        return redirect()->route('admin.topic.index');
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
