<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<!-- Favicon icon -->
	<link rel="shortcut icon" href="{{ asset('assets/backend/images/favicon.png') }}" type="image/x-icon">
	<link rel="icon" href="{{ asset('assets/backend/images/favicon.ico') }}" type="image/x-icon">

	<title>Admin Dashboard - Research Collaboration</title>

	<!-- Google font-->
	<link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">

	<!-- themify -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/icon/themify-icons/themify-icons.css') }}">

	<!-- iconfont -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/icon/icofont/css/icofont.css') }}">

	<!-- simple line icon -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/icon/simple-line-icons/css/simple-line-icons.css') }}">

	<!-- Required Fremwork -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/plugins/bootstrap/css/bootstrap.min.css') }}">


	<!-- Style.css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/css/main.css') }}">

	<!-- Responsive.css-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/css/responsive.css') }}">

</head>

<body class="sidebar-mini fixed">
	<div class="loader-bg">
		<div class="loader-bar">
		</div>
	</div>
	<div class="wrapper">
		<!-- Navbar-->
		@include('backend.partials.header')
		<!-- Side-Nav-->
		@include('backend.partials.sidebar')
		<!-- Sidebar chat start -->

		<div class="content-wrapper">
			<!-- Container-fluid starts -->
			<!-- Main content starts -->
			<div class="container-fluid">
				<div class="row">
					<div class="main-header">
						<h4>Dashboard</h4>
					</div>

					@if(Session::has('error'))
					<div class="alert alert-danger alert-dismissible" role="alert">
						{{ Session::get('error')}}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					@elseif(Session::has('success'))
					<div class="alert alert-success alert-dismissible" role="alert">
						{{ Session::get('success')}}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					@endif
				</div>
				@yield('content')


			</div>
			<!-- Main content ends -->
			<!-- Container-fluid ends -->

		</div>
	</div>


	<!-- Required Jqurey -->
	<script src="{{ asset('assets/backend/plugins/Jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/backend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('assets/backend/plugins/tether/dist/js/tether.min.js') }}"></script>

	<!-- Required Fremwork -->
	<script src="{{ asset('assets/backend/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

	<!-- Scrollbar JS-->
	<script src="{{ asset('assets/backend/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
	<script src="{{ asset('assets/backend/plugins/jquery.nicescroll/jquery.nicescroll.min.js') }}"></script>

	<!--classic JS-->
	<script src="{{ asset('assets/backend/plugins/classie/classie.js') }}"></script>

	<!-- notification -->
	<script src="{{ asset('assets/backend/plugins/notification/js/bootstrap-growl.min.js') }}"></script>



	<!-- custom js -->
	<script type="text/javascript" src="{{ asset('assets/backend/js/main.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/backend/pages/dashboard.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/backend/pages/elements.js') }}"></script>
	<script src="{{ asset('assets/backend/js/menu.min.js') }}"></script>


	@yield('scripts')


</body>

</html>