@extends('frontend.layouts.app')

@section('content')


<section class="hero-section">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12">
                <div class="text-center mb-5 pb-2">
                    <h1 class="">Share your Research</h1>

                    <p class="">Shaer and complete your research.</p>

                    <a href="#section_2" class="btn custom-btn smoothscroll mt-3">Start Contrubuting</a>
                </div>

                <div class="owl-carousel owl-theme">

                    @foreach($users as $user)
                    <div class="owl-carousel-info-wrap item">
                        @if($user->image != null)
                        <img src="{{ url('upload/images', $user->image) }}" class="owl-carousel-image img-fluid" alt="">
                        @else
                        <img src="{{ $user->getUrlfriendlyAvatar($size=200) }}" class="owl-carousel-image img-fluid" alt="">
                        @endif

                        <div class="owl-carousel-info">
                            <h4 class="mb-2">
                                <a href="#">{{ str_limit($user->name, $limit = 10, $end = '...') }}</a>
                            </h4>
                            <span class="badge">
                                @if($user->r_area != null)
                                {{ $user->r_area['name'] }}
                                @else
                                <span style="color: #878787">Not Set Yet!</span>
                                @endif
                            </span>
                        </div>

                        <div class="social-share">
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

                    @endforeach
                    
                </div>
            </div>

        </div>
    </div>
</section>



<section class="topics-section section-padding pb-0" id="section_3">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12">
                <div class="section-title-wrap mb-5">
                    <h4 class="section-title">Topics</h4>
                </div>
            </div>

            @foreach($topics as $topic)
            <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                <div class="custom-block custom-block-overlay">
                    <a href="detail-page.html" class="custom-block-image-wrap">
                        <img src="{{ url('upload/images', $topic->image) }}"
                        class="custom-block-image img-fluid" alt="">
                    </a>

                    <div class="custom-block-info custom-block-overlay-info">
                        <h5 class="mb-1">
                            <a href="listing-page.html">
                                {{ $topic->name }}
                            </a>
                        </h5>

                        <p class="badge mb-0">50 Episodes</p>
                    </div>
                </div>
            </div>
            @endforeach
        

        </div>
    </div>
</section>


<section class="trending-podcast-section section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12">
                <div class="section-title-wrap mb-5">
                    <h4 class="section-title">Trending episodes</h4>
                </div>
            </div>

            <div class="col-lg-4 col-12 mb-4 mb-lg-0">
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

            <div class="col-lg-4 col-12 mb-4 mb-lg-0">
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

            <div class="col-lg-4 col-12">
                <div class="custom-block custom-block-full">
                    <div class="custom-block-image-wrap">
                        <a href="detail-page.html">
                            <img src="{{ url('assets/frontend/images/podcast/12577967_02.jpg') }}" class="custom-block-image img-fluid"
                            alt="">
                        </a>
                    </div>

                    <div class="custom-block-info">
                        <h5 class="mb-2">
                            <a href="detail-page.html">
                                Daily Talk
                            </a>
                        </h5>

                        <div class="profile-block d-flex">
                            <img src="{{ url('assets/images/profile/handsome-asian-man-listening-music-through-headphones.jpg') }}"
                            class="profile-block-image img-fluid" alt="">

                            <p>
                                William
                                <img src="{{ url('assets/frontend/images/verified.png') }}" class="verified-image img-fluid" alt="">
                                <strong>Vlogger</strong>
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
</section>
@endsection