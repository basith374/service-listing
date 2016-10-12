@extends('layout')

@section('content')

<div class="row">
	<div class="col-md-8">
		<form method="POST" action="{{ url('/add-listing') }}" id="add-form" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="field">
			</div>
			<div class="form-group">
				<label>Description</label>
				<textarea name="description" class="field" rows="5"></textarea>
				<div><i>Markdown is supported</i></div>
			</div>
			<div class="form-group">
				<label>Address</label>
				<input type="text" name="street_address" class="field">
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Category</label>
						<select class="field" name="category_id" id="category">
							<option value>Select Category</option>
							@foreach($categories as $key => $value)
							<option value="{{ $key }}">{{ $value }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Locality</label>
						<input type="text" class="field" name="address_locality">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Telephone</label>
						<input type="text" name="telephone" class="field">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>State</label>
						<select class="field" id="state">
							<option value>Select a state</option>
							@foreach($states as $key => $value)
							<option value="{{ $key }}">{{ $value }}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>District</label>
						<select class="field" id="district" name="district_id">
							<option value>Select a district</option>
							<option value="@{{ district.id }}" v-for="district in districts">@{{ district.name }}</option>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>PIN</label>
						<input type="text" name="postcode" class="field">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label>Image</label>
				<input type="file" name="image" class="field">
			</div>
			<div class="form-group">
				<label>Keywords</label>
				<input type="text" name="keywords" class="field">
			</div>
			<div class="form-group">
				<button type="submit" class="button">Submit</button>
			</div>
		</form>
	</div>
	<div class="col-md-4">
		<img src="holder.js/360x500">
	</div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('/js/vendor/vue.min.js') }}"></script>
<script>
	var vm = new Vue({
		el: 'body',
		data: function() {
			return {
				districts: []
			};
		}
	});
	$("#category").select2();
	$('#state').select2();
	$('#district').select2();
	$('#state').change(function() {
		if(this.value) {
			$.ajax({
				url: '/state/' + this.value + '/districts',
				dataType: 'json',
				success: function(data) {
					vm.districts = data.districts;
				},
				error: function(data) {
					console.log(data.responseText);
				}
			})
		}
	});
</script>
@endsection