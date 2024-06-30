@extends('backend.layouts.app')

@section('content')

<!-- 1-3-block row start -->
<div class="row">
	

	<div class="col-lg-12">
		<div class="card">
			<div class="card-block">

				


				<h5>User List</h5>
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Image</th>
								<th scope="col">Name</th>
								<th scope="col">Email</th>
								<th scope="col">Phone</th>
								<th scope="col">Department</th>
								<th scope="col">Chat Rooms</th>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $user)
							<tr>
								<th scope="row">{{ $loop->index+1 }}</th>
								<th>
									<img src="{{ url('upload/images', $user->image) }}" style="width: 80px">
								</th>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->phone }}</td>
								<td>{{ $user->department['name'] }}</td>
								<td>
									{{ $user->rooms->count() }}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>

					{{ $users->links() }}
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