@inject('regions', 'App\Http\Utilities\Region')

<form method="POST" enctype="multipart/form-data" action="/cards" class="d-grid gap-2 col-md-6 dropzone">

	@if (count($errors) > 0)

	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)

				<li>{{ $error }}</li>

			@endforeach
		</ul>
	</div>

	@endif

	{{ csrf_field() }}
	
	<div class="form-group">
		<label for="region">Регион:</label>
		<select name="region" id="region" class="form-control" required>
			
			@foreach ($regions::all() as $id => $region)
			<option value="{{ $id }}">{{ $region }}</option>
			@endforeach

		</select>
	</div>

	<div class="form-group">
		<label for="city">Город:</label>
		<input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}" required>
	</div>

	<div class="form-group">
		<label for="street">Улица:</label>
		<input type="text" name="street" id="street" class="form-control" value="{{ old('street') }}" required>
	</div>		

	<div class="form-group">
		<label for="zip">Индекс:</label>
		<input type="text" name="zip" id="zip" class="form-control" value="{{ old('zip') }}" required>
	</div>			

	<div class="form-group">
		<label for="price">Цена продажи:</label>
		<input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}" required>
	</div>

	<div class="form-group">
		<label for="photo">Фото:</label>
		<input type="file" 
	    class="filepond"
	    name="photo" 
	    accept="image/png, image/jpeg, image/jpg, image/bmp"
	    multiple 
	    data-allow-reorder="true"
	    data-max-file-size="3MB"
	    data-max-files="3">
	</div>	

	<div class="form-group">
		<label for="description">Описание:</label>
		<textarea type="text" name="description" id="description" class="form-control" rows="10" required>{{ old('description') }}</textarea>
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-info">
			Разместить объявление
		</button>
	</div>										

</form>	

@section('scripts.footer')
 <script>
 	const input = document.querySelector('input[type="file"]');
	const pond = FilePond.create(input, {
	  	server: {
	  		url: '/photos',
	  		headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
	  	},
	  	acceptedFileTypes: ['image/jpeg', 'image/jpg', 'image/png', 'image/bmp'],
	  	maxFileSize: '3MB'
	  })
	;


 </script>
@stop