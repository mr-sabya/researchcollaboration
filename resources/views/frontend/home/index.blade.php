@extends('frontend.layouts.app')

@section('content')


<section class="hero-section" style="background: #d3e9ff;">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12">
                <div class="text-center mb-5 pb-2">
                    <h1 class="">Share your Research</h1>

                    <p class="">Share and complete your research.</p>

                    <a href="#" class="btn custom-btn smoothscroll mt-3">Start Contrubuting</a>
                </div>

            </div>

        </div>
    </div>
</section>



<section class="trending-podcast-section section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Research Chat Rooms </h4>
                        </div>
                    </div>

                    @foreach($rooms as $room)
                    <div class="col-lg-6">
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

                    <div class="col-lg-12">
                        <a href="{{ route('room.index')}}" class="btn custom-btn smoothscroll mt-3">Browse All Chat Rooms</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-4">
                            <h4 class="section-title">Topics</h4>
                        </div>
                    </div>

                    @foreach($topics as $topic)
                    <div class="col-lg-12 topic">
                        <div class="d-flex mb-3">
                            <a href="{{ route('topic.show', $topic->id) }}" class="custom-block-image-wrap">
                                <div class="card-image">
                                    <img src="{{ url('upload/images', $topic->image) }}" class="custom-block-image img-fluid" alt="">
                                </div>
                            </a>

                            <div class="custom-block-info">
                                <h5 class="mb-1">
                                    <a href="{{ route('topic.show', $topic->id) }}">
                                        {{ $topic->name }}
                                    </a>
                                </h5>

                                <p class="badge mb-0">{{ $topic->rooms->count()}} Researchs</p>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>


                <div class="row mt-4">
                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-4">
                            <h4 class="section-title">Discipline</h4>
                        </div>
                    </div>
                    @foreach($departments as $department)
                    <div class="col-lg-12">
                        <div class="d-flex mb-3 border-bottom   ">
                            <h5>
                                <a href="{{ route('discipline.show', $department->id) }}">
                                    {{ $department->name }}
                                </a>
                            </h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>



        </div>
    </div>
</section>
@endsection