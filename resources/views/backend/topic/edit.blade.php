@extends('backend.layouts.app')

@section('content')

<!-- 1-3-block row start -->
<div class="row">
	<div class="col-lg-4">
		<div class="card">
			<div class="card-block">
				<h5>Edit Topic</h5>
				<form action="{{ route('admin.topic.update', $topic->id)}}" method="post" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label>Topic</label>
						<input type="text" name="name" class="form-control" id="name" value="{{ $topic->name }}">
						@if($errors->has('name'))
						<small style="color: red">{{ $errors->first('name')}}</small>
						@endif
					</div>

					<div class="form-group">
						<label>Slug</label>
						<input type="text" name="slug" class="form-control" id="slug" value="{{ $topic->slug }}">
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
						<small><a target="_blank" href="/upload/images/{{ $topic->image }}">/upload/images/{{ $topic->image }}</a></small>
					</div>
					<button type="submit" class="btn btn-primary">Save</button>
				</form>
			</div>
		</div>
	</div>

	
</div>
<!-- 1-3-block row end -->
@endsection


@section('scripts')
<script>
	$("#name").keyup(function() {
		var Text = $(this).val();
		Text = Text.toLowerCase();
		Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
		$("#slug").val(Text);        
	});
</script>
@endsection