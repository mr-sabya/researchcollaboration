<header class="main-header-top hidden-print">
	<a href="{{ route('dashboard')}}" class="logo" style="display: flex; align-items: center; justify-content: center;">
		<!-- <img class="img-fluid able-logo" src="{{ url('assets/backend/images/logo.png') }}" alt="Theme-logo"> -->
		<h5 style="font-size: 20px;">Research Collaboration</h5>
	</a>
	<nav class="navbar navbar-static-top">
		<!-- Sidebar toggle button-->
		<a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>
		<ul class="top-nav lft-nav">


			<li class="dropdown pc-rheader-submenu message-notification search-toggle">
				<a href="#!" id="morphsearch-search" class="drop icon-circle txt-white">
					<i class="ti-search"></i>
				</a>
			</li>
		</ul>
		<!-- Navbar Right Menu-->
		<div class="navbar-custom-menu f-right">


			<ul class="top-nav">
				<!--Notification Menu-->

				<li class="dropdown notification-menu">
					<a href="#!" data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
						<i class="icon-bell"></i>
						<span class="badge badge-danger header-badge">9</span>
					</a>
					<ul class="dropdown-menu">
						<li class="not-head">You have <b class="text-primary">4</b> new notifications.</li>
						<li class="bell-notification">
							<a href="javascript:;" class="media">
								<span class="media-left media-icon">
									<img class="img-circle" src="{{ url('assets/backend/images/avatar-1.png') }}" alt="User Image">
								</span>
								<div class="media-body"><span class="block">Lisa sent you a mail</span><span class="text-muted block-time">2min ago</span></div>
							</a>
						</li>


						<li class="not-footer">
							<a href="#!">See all notifications.</a>
						</li>
					</ul>
				</li>


				<!-- User Menu-->
				<li class="dropdown">
					<a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
						<span>
							@if(Auth::user()->image == null)
							<img class="img-circle " src="{{ Auth::user()->getUrlfriendlyAvatar($size=200) }}" style="width:40px;" alt="User Image">
							@else
							<img class="img-circle " src="{{ url('upload/images', Auth::user()->image) }}" style="width:40px;" alt="User Image">
							@endif
						</span>
						<span>{{ Auth::user()->name }} <i class=" icofont icofont-simple-down"></i></span>

					</a>
					<ul class="dropdown-menu settings-menu">
						<li><a href="#!"><i class="icon-settings"></i> Settings</a></li>
						<li><a href="#"><i class="icon-user"></i> Profile</a></li>
						
						<li class="p-0">
							<div class="dropdown-divider m-0"></div>
						</li>
						
						<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
							document.getElementById('logout-form').submit();"><i class="icon-logout"></i> Logout</a>
						</li>



						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>

					</ul>
				</li>
			</ul>

			<!-- search -->
			<div id="morphsearch" class="morphsearch">
				<form class="morphsearch-form">

					<input class="morphsearch-input" type="search" placeholder="Search..." />

					<button class="morphsearch-submit" type="submit">Search</button>

				</form>

				<!-- /morphsearch-content -->
				<span class="morphsearch-close"><i class="icofont icofont-search-alt-1"></i></span>
			</div>
			<!-- search end -->
		</div>
	</nav>
</header>