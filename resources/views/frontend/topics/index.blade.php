@extends('frontend.layouts.app')

@section('content')

<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="text-center pb-2">
                    <h1 class="">Topics</h1>
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
                    <h4 class="section-title">Topics</h4>
                </div>
            </div>

            @foreach($topics as $topic)
            <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                <div class="custom-block custom-block-overlay">
                    <a href="{{ route('topic.show', $topic->id) }}" class="custom-block-image-wrap">
                        <img src="{{ url('upload/images', $topic->image) }}"
                        class="custom-block-image img-fluid" alt="">
                    </a>

                    <div class="custom-block-info custom-block-overlay-info">
                        <h5 class="mb-1">
                            <a href="{{ route('topic.show', $topic->id) }}">
                                {{ $topic->name }}
                            </a>
                        </h5>

                        <p class="badge mb-0">{{ $topic->rooms->count()}} Researchs</p>
                    </div>
                </div>
            </div>
            @endforeach
        

        </div>
    </div>
</section>

@endsection