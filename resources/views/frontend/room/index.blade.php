@extends('frontend.layouts.app')

@section('content')

<header class="header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center">
                <h2 class="mb-0">Research Room</h2>
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
                                    <h4 class="m-0">30 Rooms</h4>
                                    <a class="btn custom-btn smoothscroll" href="{{ route('user.room.create') }}">Create Room</a>
                                </div>
                            </div>

                            <div class="col-lg-6 col-12 mb-4 mb-lg-0">
                                <div class="custom-block custom-block-full">
                                    <div class="custom-block-image-wrap">
                                        <a href="detail-page.html">
                                            <img src="{{ url('assets/frontend/images/podcast/27376480_7326766.jpg') }}" class="custom-block-image img-fluid"
                                            alt="">
                                        </a>
                                    </div>

                                    <div class="custom-block-info">
                                        <h5 class="mb-2">
                                            <a href="detail-page.html">
                                                Vintage Show
                                            </a>
                                        </h5>

                                        <div class="profile-block d-flex">
                                            <img src="{{ url('assets/frontend/images/profile/woman-posing-black-dress-medium-shot.jpg') }}"
                                            class="profile-block-image img-fluid" alt="">

                                            <p>Elsa
                                                <strong>Influencer</strong>
                                            </p>
                                        </div>

                                        <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>

                                        <div class="custom-block-bottom d-flex justify-content-between mt-3">
                                            <a href="#" class="bi-headphones me-1">
                                                <span>100k</span>
                                            </a>

                                            <a href="#" class="bi-heart me-1">
                                                <span>2.5k</span>
                                            </a>

                                            <a href="#" class="bi-chat me-1">
                                                <span>924k</span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="social-share d-flex flex-column ms-auto">
                                        <a href="#" class="badge ms-auto">
                                            <i class="bi-heart"></i>
                                        </a>

                                        <a href="#" class="badge ms-auto">
                                            <i class="bi-bookmark"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-12 mb-4 mb-lg-0">
                                <div class="custom-block custom-block-full">
                                    <div class="custom-block-image-wrap">
                                        <a href="detail-page.html">
                                            <img src="{{ url('assets/frontend/images/podcast/27670664_7369753.jpg') }}" class="custom-block-image img-fluid"
                                            alt="">
                                        </a>
                                    </div>

                                    <div class="custom-block-info">
                                        <h5 class="mb-2">
                                            <a href="detail-page.html">
                                                Vintage Show
                                            </a>
                                        </h5>

                                        <div class="profile-block d-flex">
                                            <img src="{{ url('assets/frontend/images/profile/cute-smiling-woman-outdoor-portrait.jpg') }}"
                                            class="profile-block-image img-fluid" alt="">

                                            <p>
                                                Taylor
                                                <img src="{{ url('assets/frontend/images/verified.png') }}" class="verified-image img-fluid" alt="">
                                                <strong>Creator</strong>
                                            </p>
                                        </div>

                                        <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>

                                        <div class="custom-block-bottom d-flex justify-content-between mt-3">
                                            <a href="#" class="bi-headphones me-1">
                                                <span>100k</span>
                                            </a>

                                            <a href="#" class="bi-heart me-1">
                                                <span>2.5k</span>
                                            </a>

                                            <a href="#" class="bi-chat me-1">
                                                <span>924k</span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="social-share d-flex flex-column ms-auto">
                                        <a href="#" class="badge ms-auto">
                                            <i class="bi-heart"></i>
                                        </a>

                                        <a href="#" class="badge ms-auto">
                                            <i class="bi-bookmark"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection