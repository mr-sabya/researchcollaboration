@extends('frontend.layouts.app')

@section('content')


<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="text-center pb-2">
                    <h1 class="">{{ $user->name }}</h1>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="trending-podcast-section section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 mb-4">
                <div class="custom-block ">
                    <div class="row">
                        <div class="col-lg-3">
                            @if($user->image != null)
                            <img src="{{ url('upload/images', $user->image) }}" class="owl-carousel-image img-fluid" alt="">
                            @else
                            <img src="{{ $user->getUrlfriendlyAvatar($size=200) }}" class="owl-carousel-image img-fluid" alt="">
                            @endif
                        </div>
                        <div class="col-lg-9">
                            <h5>{{ $user->name }}</h5>
                            <p>Department:
                                @if($user->department_id != null)
                                {{ $user->department['name'] }}
                                @endif
                            </p>
                            <p>Topics:
                                @foreach($user->topics as $topic)
                                <span class="badge bg-primary">{{ $topic->name }}</span>
                                @endforeach
                            </p>
                            <p>Email: {{ $user->email }}</p>
                            <p>Phone: {{ $user->phone }}</p>
                            <p>Address: {{ $user->address }}</p>
                            <p>{!! $user->short_bio !!}</p>
                            <ul class="social-icon">

                                @if($user->facebook != null)
                                <li class="social-icon-item">
                                    <a href="{{ $user->facebook }}" target="_blank" class="social-icon-link bi-facebook"></a>
                                </li>
                                @endif

                                @if($user->linkedin)
                                <li class="social-icon-item">
                                    <a href="{{ $user->linkedin }}" target="_blank" class="social-icon-link bi-linkedin"></a>
                                </li>
                                @endif

                                @if($user->github)
                                <li class="social-icon-item">
                                    <a href="{{ $user->github }}" target="_blank" class="social-icon-link bi-github"></a>
                                </li>
                                @endif

                                @if($user->stackoverflow != null)
                                <li class="social-icon-item">
                                    <a href="{{ $user->stackoverflow}}" target="_blank" class="social-icon-link bi-stack-overflow"></a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 mb-4">
                <div class="custom-block ">
                    <h4>Description</h4>
                    <p>{!! $user->description !!}</p>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="section-title-wrap mb-5">
                    <h4 class="section-title">Latest Research Chat Rooms </h4>
                </div>
            </div>
            @foreach($rooms as $room)
            <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                <div class="custom-block custom-block-full mb-4">
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
                        @if($room->status == 1)
                        <span class="badge bg-success mb-2">Running</span>
                        @elseif($room->status == 2)
                        <span class="badge bg-danger mb-2">Closed</span>
                        @endif

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