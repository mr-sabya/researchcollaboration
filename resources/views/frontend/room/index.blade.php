@extends('frontend.layouts.app')

@section('content')

<header class="header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center">
                <h2 class="mb-0">Chat Room</h2>
            </div>

        </div>
    </div>
</header>


<section class="about-section section-padding">
    <div class="container">
        <div class="row">
            @include('frontend.profile.partials.menu')
            <div class="col-lg-9">
                <div class="trending-podcast-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 mb-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h4 class="m-0">{{ $rooms->count() }} {{ $rooms->count() == 1 ? 'Room' : 'Rooms' }}</h4>
                                    <a class="btn custom-btn smoothscroll" href="{{ route('user.room.create') }}">Create Room</a>
                                </div>
                            </div>

                            @foreach($rooms as $room)
                            <div class="col-lg-6 col-12 mb-4 mb-lg-0">
                                <div class="custom-block custom-block-full">
                                    <div class="custom-block-image-wrap">
                                        <a href="detail-page.html">
                                            <img src="{{ url('upload/images', $room->image) }}" class="custom-block-image img-fluid"
                                            alt="">
                                        </a>
                                    </div>

                                    <div class="custom-block-info">
                                        <h5 class="mb-2">
                                            <a href="detail-page.html">
                                                {{ str_limit($room->name, $limit = 20, $end = '...') }}
                                            </a>
                                        </h5>

                                        <div class="profile-block d-flex">
                                            <img src="{{ url('upload/images', $room->publisher['image']) }}"
                                            class="profile-block-image img-fluid" alt="">

                                            <p>{{ $room->publisher['name']}}
                                                <strong>{{ $room->publisher['r_area']['name']}}</strong>
                                            </p>
                                        </div>

                                        <p class="mb-0">{{ $room->short_description }}</p>

                                        <div class="custom-block-bottom d-flex justify-content-between mt-3">
                                            <a href="#" class="bi-person me-1">
                                                <span>100k</span>
                                            </a>

                                            <a href="#" class="bi-heart me-1">
                                                <span>2.5k</span>
                                            </a>

                                            <a href="#" class="bi-chat me-1">
                                                <span>924k</span>
                                            </a>
                                        </div>

                                        <div class="mt-4 d-flex gap-4 border-top pt-2">
                                            <a href="{{ route('user.room.edit', $room->id)}}"><i class="bi bi-pencil"></i> Edit</a>
                                            <a href="javacript::void(0)" class="delete" data-id="{{ $room->id }}"> <i class="bi bi-archive"></i> Delete</a>
                                        </div>
                                    </div>

                        
                                </div>
                            </div>
                            @endforeach
                            



                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection