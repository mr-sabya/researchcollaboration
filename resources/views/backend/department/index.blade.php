@extends('backend.layouts.app')

@section('content')

<!-- 1-3-block row start -->
<div class="row">
	<div class="col-lg-4">
		<div class="card">
			<div class="card-block">
				<h5>Add Discipline</h5>
				<form action="{{ route('admin.department.store')}}" method="post">
					@csrf
					<div class="form-group">
						<label>Discipline</label>
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
				<h5>Discipline List</h5>
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
										<button type="button" data-url="{{ route('admin.department.destroy', $department->id) }}" class="delete btn btn-danger btn-sm">Delete</button>
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

<div class="modal fade" id="delete_modal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Confimation</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="" id="delete_form" method="post">
				@csrf
				@method('DELETE')
				<div class="modal-body">
					<h2 class="text-center">Do you want to delete this data?</h2>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Delete</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- 1-3-block row end -->
@endsection


@section('scripts')
<script>
	

	$(document).on('click', '.delete', function() {
		$('#delete_modal').modal('show');
		var url = $(this).attr('data-url');
		$('#delete_form').attr('action', url);
	});
</script>
@endsection