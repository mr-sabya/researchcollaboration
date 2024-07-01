@extends('frontend.layouts.app')

@section('content')


<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="text-center pb-2">
                    <h1 class="">{{ $topic->name }}</h1>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="trending-podcast-section section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12">
                <div class="section-title-wrap mb-5">
                    <h4 class="section-title">Latest Research Chat Rooms </h4>
                </div>
            </div>

            @foreach($rooms as $room)
            <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                <div class="custom-block custom-block-full">
                    <div class="custom-block-image-wrap">
                        @auth
                        <a href="{{ $room->user_id == Auth::user()->id ? route('user.room.show', $room->id) :  route('room.show', $room->id)}}">
                            <img src="{{ url('upload/images', $room->image) }}" class="custom-block-image img-fluid" alt="">
                        </a>
                        @else
                        <a href="{{ route('room.show', $room->id)}}">
                            <img src="{{ url('upload/images', $room->image) }}" class="custom-block-image img-fluid" alt="">
                        </a>
                        @endauth
                    </div>

                    <div class="custom-block-info">
                        <h5 class="mb-2">
                            @auth
                            <a href="{{ $room->user_id == Auth::user()->id ? route('user.room.show', $room->id) :  route('room.show', $room->id)}}">
                                {{ str_limit($room->name, $limit = 18, $end = '...') }}
                            </a>
                            @else
                            <a href="{{ route('room.show', $room->id)}}">
                                {{ str_limit($room->name, $limit = 18, $end = '...') }}
                            </a>
                            @endauth
                        </h5>

                        <div class="profile-block d-flex">
                            <img src="{{ url('upload/images', $room->publisher['image']) }}" class="profile-block-image img-fluid" alt="">

                            <p>{{ $room->publisher['name']}}
                                <strong>{{ date('d F, Y', strtotime($room->created_at)) }}</strong>
                            </p>
                        </div>

                        <p class="mb-0">{{ $room->short_description }}</p>

                        <!-- <div class="custom-block-bottom d-flex justify-content-between mt-3">
                            <a href="#" class="bi-person me-1">
                                <span>100k</span>
                            </a>

                            <a href="#" class="bi-heart me-1">
                                <span>2.5k</span>
                            </a>

                            <a href="#" class="bi-chat me-1">
                                <span>924k</span>
                            </a>
                        </div> -->


                    </div>


                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endsection