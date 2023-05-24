@extends('backend.layouts.app')

@section('content')

<!-- 1-3-block row start -->
<div class="row">
	<div class="col-lg-4">
		<div class="card">
			<div class="card-block">
				<h5>Edit Research Area</h5>
				<form action="{{ route('admin.research-area.update', $area->id)}}" method="post">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label>Research Area</label>
						<input type="text" name="name" class="form-control" id="name" value="{{ $area->name }}">
						@if($errors->has('name'))
						<small style="color: red">{{ $error->first('name')}}</small>
						@endif
					</div>

					<div class="form-group">
						<label>Slug</label>
						<input type="text" name="slug" class="form-control" id="slug" value="{{ $area->slug }}">
						@if($errors->has('slug'))
						<small style="color: red">{{ $error->first('slug')}}</small>
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