@extends('frontend.layouts.app')

@section('content')


<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="text-center pb-2">
                    <h1 class="">Research Rooms</h1>
                </div>
            </div>
        </div>
    </div>
</section>




<section class="trending-podcast-section section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 d-flex justify-content-between mb-5">
                <div class="section-title-wrap ">
                    <h4 class="section-title">{{ $room->name}}</h4>
                </div>


                @if($room->status == 1)
                @if(Auth::user()->checkRoom($room->id))
                <a href="{{ route('room.chat', $room->id) }}" class="btn btn-primary d-flex align-items-center px-5">Chat</a>
                @else
                <a href="{{ route('room.joinchat', $room->id)}}" class="btn btn-primary d-flex align-items-center px-5">Join Chat</a>
                @endif

                @elseif($room->status == 2)
                <span class="btn btn-danger d-flex align-items-center px-5">Closed</span>
                @endif


            </div>

            <div class="col-lg-12 mb-4 mb-lg-0">
                <div class="custom-block custom-block-full">

                    <div class="d-flex align-items-center">
                        <div class="custom-block-image-wrap">

                            <img src="{{ url('upload/images', $room->image) }}" class="custom-block-image img-fluid" alt="">

                        </div>
                        <div class="custom-block-info">
                            <h5 class="mb-2">
                                {{ $room->name }}
                            </h5>

                            <div class="profile-block d-flex">
                                <img src="{{ url('upload/images', $room->publisher['image']) }}" class="profile-block-image img-fluid" alt="">

                                <p>{{ $room->publisher['name']}}
                                    <strong>{{ date('d F, Y', strtotime($room->created_at)) }}</strong>
                                </p>
                            </div>
                            <h4><a href="{{ $room->paper_link }}">Go to Paper Link</a></h4>
                        </div>

                    </div>


                    <div class="custom-block-info">
                        <p class="mb-0">{!! $room->description !!}</p>

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


        </div>
    </div>
</section>
@endsection