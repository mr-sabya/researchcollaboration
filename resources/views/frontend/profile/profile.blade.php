@extends('frontend.layouts.app')

@section('content')

<header class="header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center">
                <h2 class="mb-0">Profile</h2>
            </div>

        </div>
    </div>
</header>


<section class="about-section profile-section section-padding">
    <div class="container">
        <div class="row">
            @include('frontend.profile.partials.menu')
            <div class="col-lg-9">
                <div class="text-center profile">
                    <div class="profile-image">
                        @if(Auth::user()->image != null)
                        <img src="{{ url('upload/images', Auth::user()->image) }}">
                        @else
                        <img src="{{ $user->getUrlfriendlyAvatar($size=200) }}">
                        @endif
                        <a href="{{ route('profile.image')}}" class="edit"><i class="bi bi-pencil"></i></a>
                    </div>
                    <h3 class="mt-3">{{ Auth::user()->name }}</h3>
                    <a href="{{ route('profile.edit') }}" class="btn custom-btn mt-3 mb-5"><i class="bi bi-pencil"></i> Edit Profile</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <td>Email</td>
                            <td>{{ Auth::user()->email }}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{ Auth::user()->phone }}</td>
                        </tr>
                        <tr>
                            <td>Department</td>
                            <td>
                                @if(Auth::user()->department_id != null)
                                {{ Auth::user()->department['name'] }}
                                @else
                                <span style="color: #878787">Not Set Yet!</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Research Area</td>
                            <td>
                                @if(Auth::user()->r_area != null)
                                {{ Auth::user()->r_area['name'] }}
                                @else
                                <span style="color: #878787">Not Set Yet!</span>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>Short Description</td>
                            <td>{{ Auth::user()->short_bio }}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>{!! Auth::user()->description !!}</td>
                        </tr>

                        <tr>
                            <td>Social Media</td>
                            <td>
                                
                                <a class="social" href="{{ Auth::user()->facebook }}">
                                    <i class="bi bi-facebook"></i>
                                </a>
                                <a class="social" href="{{ Auth::user()->linkedin }}">
                                    <i class="bi bi-linkedin"></i>
                                </a>

                                <a class="social" href="{{ Auth::user()->github }}">
                                    <i class="bi bi-github"></i>
                                </a>

                                <a class="social" href="{{ Auth::user()->stackoverflow }}">
                                    <i class="bi bi-stack-overflow"></i>
                                </a>

                            </td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection