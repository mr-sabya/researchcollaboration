<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand me-lg-5 me-0" href="{{ route('index')}}">
            <img src="{{ url('assets/frontend/images/pod-talk-logo.png') }}" class="logo-image img-fluid" alt="templatemo pod talk">
        </a>

        <form action="{{ route('search')}}" method="post" class="custom-form search-form flex-fill me-3" role="search">
            @csrf
            <div class="input-group input-group-lg">
                <input name="search" type="search" class="form-control" id="search" placeholder="Search Topics" aria-label="Search" required>

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
                    <a class="nav-link" href="{{ route('topic.index') }}">Topics</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('member.index') }}">Members</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="{{ route('room.index')}}">Chat Rooms</a>
                </li>
            </ul>

            <div style="display: flex; align-items: center; justify-content: center; gap: 40px;">
                <a href="{{ route('notification.index') }}" class="nav-link position-relative" style="color: #fff;">
                    <i class="bi bi-bell-fill"></i>
                    <span class="position-absolute badge rounded-pill bg-danger" style="top: -8px; left: 8px;">
                        {{ Auth::user()->unreadNotifications()->count() }}
                    </span>
                </a>

                <div>
                    <div style="display: flex; align-items: center; justify-content: center;">
                        <div class="profile-image" style="width: 50px;">
                            @if(Auth::user()->image != null)
                            <img src="{{ url('upload/images', Auth::user()->image) }}">
                            @else
                            <img src="{{ Auth::user()->getUrlfriendlyAvatar($size=200) }}">
                            @endif
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #fff; text-decoration: none;">
                                {{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('profile')}}">Profile</a></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </div>
            </div>


        </div>
    </div>
</nav>