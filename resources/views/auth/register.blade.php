@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-sm-12">
            <div class="login-card card-block">
                <form class="md-float-material" action="{{ route('register')}}" method="post">
                    @csrf
                    <div class="text-center">
                        <img src="{{ url('assets/frontend/images/pod-talk-logo.png') }}" alt="logo" style="width: 100px;">
                    </div>
                    <h3 class="text-center txt-primary">
                        Create New account
                    </h3>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-input-wrapper">
                                <input type="text" name="name" id="name" class="md-form-control" value="{{ old('name')}}" required="required">
                                <label>Name</label>
                                @if($errors->has('name'))
                                <small style="color: red">{{ $errors->first('name')}}</small>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="md-input-wrapper">
                                <input type="email" name="email" id="email" class="md-form-control" autocomplete="new-email" value="{{ old('email')}}" required="required">
                                <label>Email</label>
                                @if($errors->has('email'))
                                <small style="color: red">{{ $errors->first('email')}}</small>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="md-input-wrapper">
                                <input type="text" name="phone" id="phone" class="md-form-control" value="{{ old('phone')}}" required="required">
                                <label>Phone</label>
                                @if($errors->has('phone'))
                                <small style="color: red">{{ $errors->first('phone')}}</small>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="md-input-wrapper">
                                <input type="password" name="password" id="password" class="md-form-control" autocomplete="new-password"required="required">
                                <label>Password</label>
                                @if($errors->has('password'))
                                <small style="color: red">{{ $errors->first('password')}}</small>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="md-input-wrapper">
                                <input id="password-confirm" type="password" class="md-form-control" name="password_confirmation" autocomplete="new-password" required="required">
                                <label>Confirm Password</label>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xs-10 offset-xs-1">
                            <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">REGISTER</button>
                        </div>
                    </div>
                    <!-- <div class="card-footer"> -->
                    <div class="col-sm-12 col-xs-12 text-center">
                        <span class="text-muted">Allready have an account?</span>
                        <a href="{{ route('login') }}" class="f-w-600 p-l-5">Sign In</a>
                    </div>

                    <!-- </div> -->
                </form>



                <!-- end of form -->
            </div>
            <!-- end of login-card -->
        </div>
        <!-- end of col-sm-12 -->
    </div>
    <!-- end of row -->
</div>
@endsection