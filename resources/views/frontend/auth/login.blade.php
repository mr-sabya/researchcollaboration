@extends('frontend.layouts.app')

@section('content')



<header class="d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center">
                <h2 class="mb-0">Login</h2>
            </div>

        </div>
    </div>
</header>


<section class="about-section section-padding" id="section_2">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-12 mx-auto">
                <div class="pb-5 mb-5">
                    <div class="section-title-wrap mb-4">
                        <h4 class="section-title">Login</h4>
                    </div>

                    <form action="{{ route('user.login')}}" method="post" class="custom-form subscribe-form">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                            @if($errors->has('email'))
                            <small style="color: red">{{ $errors->first('email') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <button class="form-control" type="submit">Login</button>
                        <div>Don't have any account?<a href="{{ route('user.register.form')}}">Create One</a></div>
                    </form>

                    <img src="images/medium-shot-young-people-recording-podcast.jpg"
                    class="about-image mt-5 img-fluid" alt="">
                </div>
            </div>

        

        </div>
    </div>
</section>
@endsection