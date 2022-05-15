@inject('regions', 'App\Http\Utilities\Region')

<form method="POST" enctype="multipart/form-data" action="/cards" class="d-grid gap-2">
	
	<div class="form-group">
		<label for="region">Регион:</label>
		<select name="region" id="region" class="form-control">
			
			@foreach ($regions::all() as $id => $region)
			<option value="{{ $id }}">{{ $region }}</option>
			@endforeach

		</select>
	</div>

	<div class="form-group">
		<label for="city">Город:</label>
		<input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}">
	</div>

	<div class="form-group">
		<label for="street">Улица:</label>
		<input type="text" name="street" id="street" class="form-control" value="{{ old('street') }}">
	</div>		

	<div class="form-group">
		<label for="zip">Индекс:</label>
		<input type="text" name="zip" id="zip" class="form-control" value="{{ old('zip') }}">
	</div>			

	<div class="form-group">
		<label for="price">Цена продажи:</label>
		<input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}">
	</div>

	<div class="form-group">
		<label for="description">Описание:</label>
		<textarea type="text" name="description" id="description" class="form-control" rows="10">
			{{ old('description') }}
		</textarea>
	</div>

	<div class="form-group">
		<label for="photos">Фото:</label>
		<input type="file" name="photos" id="photos" class="form-control" value="{{ old('photos') }}">
	</div>			

	<div class="form-group">
		<button type="submit" class="btn btn-primary">
			Разместить объявление
		</button>
	</div>										

</form>	