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


<section class="about-section section-padding">
    <div class="container">
        <div class="row">
            @include('frontend.profile.partials.menu')
            <div class="col-lg-9">
                <div class="text-center">
                    <img src="{{ $user->getUrlfriendlyAvatar($size=200) }}" class="profile-img">
                    <h3 class="mt-3">{{ Auth::user()->name }}</h3>
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
                            <td>Short Description</td>
                            <td>{{ Auth::user()->short_description }}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>{{ Auth::user()->description }}</td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection