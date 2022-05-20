@inject('regions', 'App\Http\Utilities\Region')

<form method="POST" enctype="multipart/form-data" action="/cards" class="dropzone">

	@if (count($errors) > 0)

	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)

				<li>{{ $error }}</li>

			@endforeach
		</ul>
	</div>

	@endif

	<div class="row">

		<div class="col-md-6 d-grid gap-2">
			{{ csrf_field() }}

			<div class="form-group">
				<label for="category_id">Рубрика:</label>
				<select name="category_id" id="category_id" class="form-control" required>
					
					@foreach ($categories as $category)
					<option value="{{ $category->id }}" {{ old("category_id") == $category->id ? "selected" : "" }}>{{ $category->name }}</option>
					@endforeach

				</select>
			</div>			

			<div class="form-group">
				<label for="title">Заголовок:</label>
				<input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
			</div>			
			
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
				<label for="description">Описание:</label>
				<textarea type="text" name="description" id="description" class="form-control" rows="5" required>{{ old('description') }}</textarea>
			</div>				
		</div>

		<div class="col-md-6 d-grid gap-2">
			<div class="form-group">
				<label for="photo">Фото:</label>
				<input type="file" 
			    class="filepond"
			    name="photo" 
			    accept="image/png, image/jpeg, image/jpg, image/bmp"
			    multiple 
			    data-allow-reorder="true"
			    data-max-file-size="3MB"
			    data-max-files="10">
			</div>				
		</div>

		<div class="col-md-12 d-grid gap-2 my-2">
			<div class="form-group">
				<button type="submit" class="btn btn-info">
					Разместить объявление
				</button>
			</div>			
		</div>

	</div>	

</form>	

@section('scripts.footer')
 <script>
 	const input = document.querySelector('input[type="file"]');
	FilePond.create(input, {
	  	server: {
	  		url: '/photos',
	  		headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
	  	},
	  	acceptedFileTypes: ['image/jpeg', 'image/jpg', 'image/png', 'image/bmp'],
	  	maxFileSize: '3MB',
	  })
	;

	const pond = document.querySelector('.filepond--root');

	// listen for events
	pond.addEventListener('FilePond:addfile', (e) => {
	    let fieldset = document.querySelector('.filepond--data');
	    let photos = fieldset.children;
	    Array.prototype.forEach.call(photos, function(photo, index, photos) {
		  photo.setAttribute("name", "photo[]");
		})
	});


 </script>
@stop