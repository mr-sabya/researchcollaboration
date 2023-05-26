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

                <form  action="{{ route('profile.update', $user->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                        @if($errors->has('name'))
                        <small style="color: red">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Department</label>
                        <select class="form-control" name="department_id">
                            @foreach($departments as $department)
                            <option value="{{ $department->id }}" {{ $department->id == $user->department_id ? 'selected' : ''}}>{{ $department->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('department_id'))
                        <small style="color: red">{{ $errors->first('department_id') }}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Research Area</label>
                        <select class="form-control" name="r_area_id">
                            @foreach($areas as $area)
                            <option value="{{ $area->id }}" {{ $area->id == $user->r_area_id ? 'selected' : ''}}>{{ $area->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('r_area_id'))
                        <small style="color: red">{{ $errors->first('r_area_id') }}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Short Bio</label>
                        <textarea class="form-control" name="short_bio" id="short_bio">{{ $user->short_bio }}</textarea>
                        @if($errors->has('short_bio'))
                        <small style="color: red">{{ $errors->first('short_bio') }}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" id="description">{{ $user->description }}</textarea>
                        @if($errors->has('description'))
                        <small style="color: red">{{ $errors->first('description') }}</small>
                        @endif
                    </div>


                    <div class="form-group">
                        <label>Facebook</label>
                        <input type="text" name="facebook" id="facebook" class="form-control" value="{{ $user->facebook }}">
                        @if($errors->has('facebook'))
                        <small style="color: red">{{ $errors->first('facebook') }}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Linkedin</label>
                        <input type="text" name="linkedin" id="linkedin" class="form-control" value="{{ $user->linkedin }}">
                        @if($errors->has('linkedin'))
                        <small style="color: red">{{ $errors->first('linkedin') }}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Github</label>
                        <input type="text" name="github" id="github" class="form-control" value="{{ $user->github }}">
                        @if($errors->has('github'))
                        <small style="color: red">{{ $errors->first('github') }}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Stack Overflow</label>
                        <input type="text" name="stackoverflow" id="stackoverflow" class="form-control" value="{{ $user->stackoverflow }}">
                        @if($errors->has('stackoverflow'))
                        <small style="color: red">{{ $errors->first('stackoverflow') }}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <button class="btn custom-btn w-100">Update</button>
                    </div>
                </form>


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