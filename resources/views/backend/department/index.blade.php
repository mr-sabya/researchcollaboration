@extends('backend.layouts.app')

@section('content')

<!-- 1-3-block row start -->
<div class="row">
	<div class="col-lg-4">
		<div class="card">
			<div class="card-block">
				<h5>Add Department</h5>
				<form action="{{ route('admin.department.store')}}" method="post">
					@csrf
					<div class="form-group">
						<label>Department</label>
						<input type="text" name="name" class="form-control" id="name">
						@if($errors->has('name'))
						<small style="color: red">{{ $error->first('name')}}</small>
						@endif
					</div>
					<button type="submit" class="btn btn-primary">Save</button>
				</form>
			</div>
		</div>
	</div>

	<div class="col-lg-8">
		<div class="card">
			<div class="card-block">
				<h5>Department List</h5>
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Name</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($departments as $department)
							<tr>
								<th scope="row">{{ $loop->index+1 }}</th>
								<td>{{ $department->name }}</td>
								<td>
									<form>
										<a href="{{ route('admin.department.edit', $department->id)}}" class="btn btn-primary btn-sm">Edit</a>
										<button class="btn btn-danger btn-sm">Delete</button>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
	
</div>
<!-- 1-3-block row end -->
@endsection
