@extends('backend.layouts.app')

@section('content')
<!-- 4-blocks row start -->
<div class="row dashboard-header">
	<div class="col-lg-3 col-md-6">
		<div class="card dashboard-product">
			<span>Products</span>
			<h2 class="dashboard-total-products">4500</h2>
			<span class="label label-warning">Sales</span>Arriving Today
			<div class="side-box">
				<i class="ti-signal text-warning-color"></i>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="card dashboard-product">
			<span>Products</span>
			<h2 class="dashboard-total-products">37,500</h2>
			<span class="label label-primary">Views</span>View Today
			<div class="side-box ">
				<i class="ti-gift text-primary-color"></i>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="card dashboard-product">
			<span>Products</span>
			<h2 class="dashboard-total-products">$<span>30,780</span></h2>
			<span class="label label-success">Sales</span>Reviews
			<div class="side-box">
				<i class="ti-direction-alt text-success-color"></i>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="card dashboard-product">
			<span>Products</span>
			<h2 class="dashboard-total-products">$<span>30,780</span></h2>
			<span class="label label-danger">Sales</span>Reviews
			<div class="side-box">
				<i class="ti-rocket text-danger-color"></i>
			</div>
		</div>
	</div>
</div>
<!-- 4-blocks row end -->

<!-- 1-3-block row start -->
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="user-block-2">
				<img class="img-fluid" src="assets/images/widget/user-1.png" alt="user-header">
				<h5>Josephin Villa</h5>
				<h6>Software Engineer</h6>
			</div>
			<div class="card-block">
				<div class="user-block-2-activities">
					<div class="user-block-2-active">
						<i class="icofont icofont-clock-time"></i> Recent Activities
						<label class="label label-primary">480</label>
					</div>
				</div>
				<div class="user-block-2-activities">
					<div class="user-block-2-active">
						<i class="icofont icofont-users"></i> Current Employees
						<label class="label label-primary">390</label>
					</div>
				</div>

				<div class="user-block-2-activities">
					<div class="user-block-2-active">
						<i class="icofont icofont-ui-user"></i> Following
						<label class="label label-primary">485</label>
					</div>

				</div>
				<div class="user-block-2-activities">
					<div class="user-block-2-active">
						<i class="icofont icofont-picture"></i> Pictures
						<label class="label label-primary">506</label>
					</div>
				</div>
				<div class="text-center">
					<button type="button" class="btn btn-warning waves-effect waves-light text-uppercase m-r-30">
						Follows
					</button>
					<button type="button" class="btn btn-primary waves-effect waves-light text-uppercase">
						Message
					</button>
				</div>
			</div>
		</div>
	</div>
	
	
</div>
<!-- 1-3-block row end -->
@endsection
