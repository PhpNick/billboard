@inject('regions', 'App\Http\Utilities\Region')

@extends('layout')

@section('content')

	<div class="row">

		<div class="col-md-12">
			<h2>{{ $card->title }}</h2>
		</div>

		<div class="col-md-4">

			<h4><i class="fas fa-map-marker-alt text-success"></i> {{ $regions::all()[$card->region] }}, {{ $card->city }}, {{ $card->street }}, {{ $card->zip }}</h4>

			<h3><strong>{{ $card->price }} <i class="fas fa-ruble-sign"></i></strong></h3>

			<div>
				{!! nl2br($card->description) !!}
			</div>
			@guest
				<a href="{{ route('login') }}" class="btn btn-info mt-2"><i class="fas fa-heart text-danger"></i> Добавить в избранное</a>
	        @else
	        	<favorite-button-component card="{{ $card->id }}"></favorite-button-component>
	        @endguest			
			<hr>
			<small>Рубрика: {{ $card->category->name }}</small>			
		</div>

		<div class="col-md-8" id="photo-gallery">
			@foreach($card->photos->chunk(4) as $set)

				<div class="row">
					@foreach($set as $photo)
						<div class="col-md-3 col-sm-6 my-2">
							<a href="/{{ $photo->path }}" data-pswp-width="{{ $photo->width }}" data-pswp-height="{{ $photo->height }}" data-cropped="true" target="_blank">
								<img src="/{{ $photo->thumbnail_path }}" alt="" class="rounded">
							</a>
						</div>
					@endforeach					
				</div>
			@endforeach
		</div>
	
	</div>

@stop