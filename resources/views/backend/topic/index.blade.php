@extends('backend.layouts.app')

@section('content')

<!-- 1-3-block row start -->
<div class="row">
	<div class="col-lg-4">
		<div class="card">
			<div class="card-block">
				<h5>Add Topic</h5>
				<form action="{{ route('admin.topic.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label>Topic</label>
						<input type="text" name="name" class="form-control" id="name">
						@if($errors->has('name'))
						<small style="color: red">{{ $errors->first('name')}}</small>
						@endif
					</div>

					<div class="form-group">
						<label>Slug</label>
						<input type="text" name="slug" class="form-control" id="slug">
						@if($errors->has('slug'))
						<small style="color: red">{{ $errors->first('slug')}}</small>
						@endif
					</div>

					<div class="form-group">
						<label>Image</label>
						<input type="file" name="image" class="form-control" id="image">
						@if($errors->has('image'))
						<small style="color: red">{{ $errors->first('image')}}</small>
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

				


				<h5>Research Area List</h5>
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Image</th>
								<th scope="col">Name</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($topics as $topic)
							<tr>
								<th scope="row">{{ $loop->index+1 }}</th>
								<th>
									<img src="{{ url('upload/images', $topic->image) }}" style="width: 80px">
								</th>
								<td>{{ $topic->name }}</td>
								<td>
									<form>
										<a href="{{ route('admin.topic.edit', $topic->id)}}" class="btn btn-primary btn-sm">Edit</a>
										<button type="button" data-url="{{ route('admin.topic.destroy', $topic->id) }}" class="delete btn btn-danger btn-sm">Delete</button>
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
@endsection


@section('scripts')
<script>
	$("#name").keyup(function() {
		var Text = $(this).val();
		Text = Text.toLowerCase();
		Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
		$("#slug").val(Text);
	});

	$(document).on('click', '.delete', function() {
		$('#delete_modal').modal('show');
		var url = $(this).attr('data-url');
		$('#delete_form').attr('action', url);
	});
</script>
@endsection