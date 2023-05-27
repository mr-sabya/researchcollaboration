<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use App\Models\Topic;
use App\Models\Room;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()){
            return redirect()->route('user.login.form');
        }

        $rooms = Room::where('user_id', Auth::user()->id)->get();

        return view('frontend.room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::user()){
            return redirect()->route('user.login.form');
        }

        $topics = Topic::orderBy('name', 'ASC')->get();
        return view('frontend.room.create', compact('topics'));
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
            'name' => 'required|string|max:255',
            'topic_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048',
            'short_description' => 'required|string|max:255',
            'description' => 'required',
        ]);

        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $input['slug'] = $this->getSlug($request->name);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('/upload/images');
            $image->move($destinationPath, $name);
            $input['image'] = $name;
        }

        Room::create($input);

        return redirect()->route('user.room');
    }


    public function getSlug($name)
    {
        $rooms =  Room::where('name', $name)->get();

        $count = $rooms->count();
        if($count == 0){
            $slug = Str::slug($name);
        }else{
            $slug =Str::slug($name)."-".$count;
        }

        return $slug;
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
        if(!Auth::user()){
            return redirect()->route('user.login.form');
        }

        $topics = Topic::orderBy('name', 'ASC')->get();
        $room = Room::findOrFail(intval($id));
        return view('frontend.room.edit', compact('topics', 'room'));
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
        $room = Room::findOrFail(intval($id));

        $request->validate([
            'name' => 'required|string|max:255',
            'topic_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048',
            'short_description' => 'required|string|max:255',
            'description' => 'required',
        ]);

        $input = $request->all();
        $input['user_id'] = Auth::user()->id;

        if($room->name != $request->name){
            $input['slug'] = $this->getSlug($request->name);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('/upload/images');
            $image->move($destinationPath, $name);
            $input['image'] = $name;
        }

        $room->update($input);

        return redirect()->route('user.room');
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
