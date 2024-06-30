<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Research Collaboration</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Sono:wght@200;300;400;500;700&display=swap"
    rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap-icons.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.theme.default.min.css') }}">

    <!-- summernote -->
    <link href="{{ asset('assets/frontend/summernote/summernote-lite.min.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/templatemo-pod-talk.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/custom.css') }}">


</head>

<body>

    <main>

        @include('frontend.partials.nav')

        @yield('content')

    </main>


    @include('frontend.partials.footer')


    <!-- JAVASCRIPT FILES -->
    <script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/summernote/summernote-lite.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @yield('scripts')
    <script src="{{ asset('assets/frontend/js/custom.js') }}"></script>
    

</body>

</html>