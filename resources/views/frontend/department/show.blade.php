@extends('frontend.layouts.app')

@section('content')

<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="text-center pb-2">
                    <h1 class="">{{ $department->name }} Discipline</h1>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="topics-section section-padding pb-0 mb-5" id="section_3">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12">
                <div class="section-title-wrap mb-5">
                    <h4 class="section-title">Members</h4>
                </div>
            </div>


            @foreach($users as $user)

            @if($user->is_admin != 1)
            <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                <div class="custom-block custom-block-overlay">
                    @if($user->image != null)
                    <img src="{{ url('upload/images', $user->image) }}" class="owl-carousel-image img-fluid" alt="">
                    @else
                    <img src="{{ $user->getUrlfriendlyAvatar($size=400) }}" class="owl-carousel-image img-fluid" alt="">
                    @endif

                    <div class="owl-carousel-info">
                        <h4 class="mb-2">
                            @if($user->id == auth()->user()->id)
                            <a href="{{ route('profile') }}">{{ str_limit($user->name, $limit = 10, $end = '...') }}</a>
                            @else
                            <a href="{{ route('member.show', $user->id) }}">{{ str_limit($user->name, $limit = 10, $end = '...') }}</a>
                            @endif
                        </h4>
                        <span class="badge">
                            @if($user->r_area != null)
                            {{ $user->r_area['name'] }}
                            @else
                            <span style="color: #878787">Not Set Yet!</span>
                            @endif
                        </span>


                        <div class="social-share pt-3 pb-3">
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
            @endif

            @endforeach

        </div>

    </div>

</section>




@endsection