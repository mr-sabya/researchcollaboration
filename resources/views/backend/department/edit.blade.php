@extends('backend.layouts.app')

@section('content')

<!-- 1-3-block row start -->
<div class="row">
	<div class="col-lg-4">
		<div class="card">
			<div class="card-block">
				<h5>Edit Department</h5>
				<form action="{{ route('admin.department.update', $department->id)}}" method="post">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label>Department</label>
						<input type="text" name="name" class="form-control" id="name" value="{{ $department->name }}">
						@if($errors->has('name'))
						<small style="color: red">{{ $error->first('name')}}</small>
						@endif
					</div>
					<button type="submit" class="btn btn-primary">Save</button>
				</form>
			</div>
		</div>
	</div>
	
	
</div>
<!-- 1-3-block row end -->
@endsection
