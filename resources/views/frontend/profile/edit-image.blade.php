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
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <form class="custom-form subscribe-form" action="{{ route('profile.image.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Select Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                                <small>Please select 300/300 image</small><br>
                                @if($errors->has('image'))
                                <small style="color: red">{{ $errors->first('image') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <button class="form-control">Change</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection