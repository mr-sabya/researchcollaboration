@extends('frontend.layouts.app')

@section('content')

<header class="header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center">
                <h2 class="mb-0">Edit Room</h2>
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
                                    <h4 class="m-0">Edit Room ({{ $room->name }} )</h4>
                                    <a class="btn custom-btn smoothscroll" href="{{ route('user.room.index') }}">All Rooms</a>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <form action="{{ route('user.room.update', $room->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Name<span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ $room->name }}">
                                        @if($errors->has('name'))
                                        <small style="color: red">{{ $errors->first('name') }}</small>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Topic<span class="text-danger">*</span></label>
                                        <select class="form-control" name="topic_id" id="topic_id">
                                            <option value="" selected disabled>--select topic--</option>
                                            @foreach($topics as $topic)
                                            <option value="{{ $topic->id }}" {{ $room->topic_id == $topic->id ? 'selected' : '' }}>{{ $topic->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('topic_id'))
                                        <small style="color: red">{{ $errors->first('topic_id') }}</small>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Image<span class="text-danger">*</span></label>
                                        <input type="file" name="image" id="image" class="form-control">
                                        <small>Image must be 300*300px | Image <a href="{{ url('upload/images', $room->image)}}" target="_blank">{{ url('upload/images', $room->image)}}</a></small><br>
                                        @if($errors->has('image'))
                                        <small style="color: red">{{ $errors->first('image') }}</small>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Short Description<span class="text-danger">*</span></label>
                                        <textarea class="form-control" cols="20" name="short_description" id="short_description" rows="3">{{ $room->short_description }}</textarea>
                                        @if($errors->has('short_description'))
                                        <small style="color: red">{{ $errors->first('short_description') }}</small>
                                        @endif
                                    </div>


                                    <div class="form-group">
                                        <label>Description<span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="description" id="description">{!! $room->description !!}</textarea>
                                        @if($errors->has('description'))
                                        <small style="color: red">{{ $errors->first('description') }}</small>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Paper Link</label>
                                        <input type="text" name="paper_link" class="form-control"  value="{{ $room->paper_link }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1">Running</option>
                                            <option value="2">Closed</option>
                                        </select>
                                    </div>


                                    <button class="btn custom-btn smoothscroll" type="submit">Update Room</button>
                                </form>
                            </div>

                        </div>
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
        placeholder: 'Your Research description here.....',
        tabsize: 2,
        height: 300,
    });
    
</script>
@endsection