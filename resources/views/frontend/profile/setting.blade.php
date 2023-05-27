@extends('frontend.layouts.app')

@section('content')

<header class="header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center">
                <h2 class="mb-0">Setting</h2>
            </div>

        </div>
    </div>
</header>


<section class="about-section section-padding">
    <div class="container">
        <div class="row">
            @include('frontend.profile.partials.menu')
            <div class="col-lg-9">

                <div class="row">
                    <div class="col-lg-6">
                        <form  action="{{ route('user.password.update', $user->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Current Password</label>
                                <input type="password" name="current_password" id="current_password" class="form-control" autocomplete="new-password">
                                @if($errors->has('current_password'))
                                <small style="color: red">{{ $errors->first('current_password') }}</small>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                                @if($errors->has('password'))
                                <small style="color: red">{{ $errors->first('password') }}</small>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Current Password</label>
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>

                            <div class="form-group">
                                <button class="btn custom-btn w-100">Update</button>
                            </div>
                        </form>

                    </div>
                </div>

                

            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>

    $('#description').summernote({
        placeholder: 'Your description here.....',
        tabsize: 2,
        height: 300,
    });
    
</script>
@endsection