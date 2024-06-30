@extends('backend.layouts.app')

@section('content')
<!-- 4-blocks row start -->
<div class="row dashboard-header">
	<div class="col-lg-3 col-md-6">
		<div class="card dashboard-product">
			<span>Disciplines</span>
			<h2 class="dashboard-total-products">{{ App\Models\Department::count() }}</h2>
			
			<div class="side-box">
				<i class="ti-signal text-warning-color"></i>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="card dashboard-product">
			<span>Research Areas</span>
			<h2 class="dashboard-total-products">{{ App\Models\Area::count() }}</h2>
			<div class="side-box ">
				<i class="ti-gift text-primary-color"></i>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="card dashboard-product">
			<span>Topics</span>
			<h2 class="dashboard-total-products">{{ App\Models\Topic::count() }}</h2>
			<div class="side-box">
				<i class="ti-direction-alt text-success-color"></i>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="card dashboard-product">
			<span>Users</span>
			<h2 class="dashboard-total-products">{{ App\Models\User::where('is_admin', 0)->count() }}</h2>
			<div class="side-box">
				<i class="ti-user text-danger-color"></i>
			</div>
		</div>
	</div>
</div>
<!-- 4-blocks row end -->

<!-- 1-3-block row start -->

<!-- 1-3-block row end -->
@endsection
