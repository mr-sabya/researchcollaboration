<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand me-lg-5 me-0" href="{{ route('index')}}">
            <img src="{{ url('assets/frontend/images/pod-talk-logo.png') }}" class="logo-image img-fluid" alt="templatemo pod talk">
        </a>

        <form action="#" method="get" class="custom-form search-form flex-fill me-3" role="search">
            <div class="input-group input-group-lg">
                <input name="search" type="search" class="form-control" id="search" placeholder="Search Topics"
                aria-label="Search">

                <button type="submit" class="form-control" id="submit">
                    <i class="bi-search"></i>
                </button>
            </div>
        </form>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('index') ? 'active' : ''}}" href="{{ route('index')}}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="about.html">Topics</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="about.html">Members</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Chat Rooms</a>
                </li>
            </ul>

            <div class="ms-4">
                @if(Auth::user())
                <a href="{{ route('profile')}}" class="btn custom-btn custom-border-btn">Profile</a>

                <a href="{{ route('user.logout')}}" class="btn custom-btn custom-border-btn" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout</a>


                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                @else
                <a href="{{ route('user.login.form')}}" class="btn custom-btn custom-border-btn">Login</a>
                @endif
            </div>
        </div>
    </div>
</nav>