@extends('frontend.layouts.app')

@section('content')


<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="text-center pb-2">
                    <h4 class="">{{ $room->name }}</h4>
                </div>
            </div>
        </div>
    </div>
</section>

@if($room_member->is_approved == 1)

<section class="trending-podcast-section section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 ">
                <div class="section-title-wrap mb-5">
                    <h4 class="section-title">Chat</h4>
                </div>



                <div class="card" id="chat3" style="border-radius: 15px;">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6 col-lg-5 mb-4 mb-md-0">

                                <div class="p-3">

                                    <div class="input-group rounded mb-3">
                                        <h4>Members</h4>
                                    </div>

                                    <div data-mdb-perfect-scrollbar="true" style="position: relative; height: 600px; overflow-y: scroll">
                                        <ul class="list-unstyled mb-0">
                                            @foreach($room_members as $member)
                                            <li class="p-2 border-bottom">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex flex-row">
                                                        <div>
                                                            @if(Auth::user()->image != null)
                                                            <img src="{{ url('upload/images', $member->user['image']) }}" class="d-flex align-self-center me-3" width="60">
                                                            @else
                                                            <img src="{{ $member->user->getUrlfriendlyAvatar($size=200) }}" class="d-flex align-self-center me-3" width="60">
                                                            @endif


                                                            <span class="badge bg-success badge-dot"></span>
                                                        </div>
                                                        <div class="pt-1">
                                                            <p class="fw-bold mb-0">{{ $member->user['name']}}</p>
                                                            <!-- <p class="small">
                                                                Active
                                                            </p> -->
                                                        </div>
                                                    </div>

                                                </div>
                                            </li>
                                            @endforeach

                                        </ul>
                                    </div>

                                </div>

                            </div>

                            <div class="col-md-6 col-lg-7">

                                <div class="pt-3 pe-3" data-mdb-perfect-scrollbar="true" id="chat_box" style="position: relative; height: 600px; overflow-y: scroll;">

                                    @foreach($chats as $chat)
                                    @if($chat->user_id == Auth::user()->id)
                                    <div class="d-flex flex-row justify-content-end">
                                        <div>
                                            <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">{{ $chat->message }}</p>
                                            <p class="small me-3 mb-3 rounded-3 text-muted">{{ date('d-m-Y | h:m a', strtotime($chat->created_at)) }}</p>
                                        </div>
                                        @if(Auth::user()->image != null)
                                        <img src="{{ url('upload/images', $chat->user['image']) }}" style="width: 45px; height: 100%;">
                                        @else
                                        <img src="{{ $chat->user->getUrlfriendlyAvatar($size=200) }}" style="width: 45px; height: 100%;">
                                        @endif

                                    </div>
                                    @else

                                    <div class="d-flex flex-row justify-content-start">
                                        @if(Auth::user()->image != null)
                                        <img src="{{ url('upload/images', $chat->user['image']) }}" style="width: 45px; height: 100%;">
                                        @else
                                        <img src="{{ $chat->user->getUrlfriendlyAvatar($size=200) }}" style="width: 45px; height: 100%;">
                                        @endif
                                        <div>
                                            <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">{{ $chat->message }}</p>
                                            <p class="small me-3 mb-3 rounded-3 text-muted">{{ date('d-m-Y | h:m a', strtotime($chat->created_at)) }}</p>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>

                                <div class="text-muted d-flex justify-content-start align-items-center pe-3 pt-3 mt-2">
                                    @if(Auth::user()->image != null)
                                    <img src="{{ url('upload/images', Auth::user()->image) }}" style="width: 40px; height: 100%;">
                                    @else
                                    <img src="{{ $user->getUrlfriendlyAvatar($size=200) }}" style="width: 40px; height: 100%;">
                                    @endif


                                    <form action="{{ route('chat.create')}}" method="post">
                                        @csrf
                                        <input type="hidden" id="room_id" name="room_id" value="{{ $room->id }}">
                                        <input type="text" class="form-control form-control-lg" id="message" name="message" placeholder="Type message">
                                    </form>
                                    <a class="ms-1 text-muted" href="#!"><i class="fas fa-paperclip"></i></a>
                                    <a class="ms-3 text-muted" href="#!"><i class="fas fa-smile"></i></a>
                                    <a class="ms-3" href="#!"><i class="fas fa-paper-plane"></i></a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
@else
<section class="trending-podcast-section section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 ">
                <div class="section-title-wrap mb-5">
                    <h4 class="section-title">Chat</h4>
                </div>
                <h4 class="text-danger">Wait for Approve by Room owner</h4>
            </div>
        </div>
    </div>
</section>
@endif


@endsection

@section('scripts')
<script>
    window.onload = function() {
        var chatBox = document.getElementById('chat_box');
        chatBox.scrollTop = chatBox.scrollHeight; // Scroll to the bottom of the chat box
    }
</script>
@endsection