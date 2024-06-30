<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Room;
use App\Models\RoomMember;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\CreateRoom;
use Illuminate\Support\Str;

class RoomController extends Controller
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

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::where('user_id', Auth::user()->id)->get();

        return view('frontend.profile.room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics = Topic::orderBy('name', 'ASC')->get();
        return view('frontend.profile.room.create', compact('topics'));
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
            $name = time() . '.' . $image->getClientOriginalName();
            $destinationPath = public_path('/upload/images');
            $image->move($destinationPath, $name);
            $input['image'] = $name;
        }

        $room = Room::create($input);


        $newChat = new RoomMember();
        $newChat->user_id = Auth::user()->id;
        $newChat->room_id = $room->id;
        $newChat->is_approved = 1;
        $newChat->save();


        // send notification

        $data = array(
            'user_id' => Auth::user()->id,
            'room_id' => $room->id,
            'room_name' => $room->name,
            'name' => Auth::user()->name,
        );


        $users = $room->topic->users;
        // $users = User::where('is_admin', '!=', 1)->where('id', '!=', Auth::user()->id)->get();
        foreach ($users as $user) {
            $user->notify(new CreateRoom($data));
        }

        return redirect()->route('user.room.index');
    }


    public function getSlug($name)
    {
        $rooms =  Room::where('name', $name)->get();

        $count = $rooms->count();
        if ($count == 0) {
            $slug = Str::slug($name);
        } else {
            $slug = Str::slug($name) . "-" . $count;
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
        $topics = Topic::orderBy('name', 'ASC')->get();
        $room = Room::with('members')->findOrFail(intval($id));
        
        $room_members = RoomMember::where('room_id', $room->id)->with('user')->get();
        $chats = Chat::where('room_id', $room->id)->get();
        return view('frontend.profile.room.show', compact('topics', 'room', 'room_members', 'chats'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topics = Topic::orderBy('name', 'ASC')->get();
        $room = Room::findOrFail(intval($id));
        return view('frontend.profile.room.edit', compact('topics', 'room'));
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

        if ($room->name != $request->name) {
            $input['slug'] = $this->getSlug($request->name);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalName();
            $destinationPath = public_path('/upload/images');
            $image->move($destinationPath, $name);
            $input['image'] = $name;
        }

        $room->update($input);

        return redirect()->route('user.room.index');
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
