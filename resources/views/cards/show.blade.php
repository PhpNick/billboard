@inject('regions', 'App\Http\Utilities\Region')

@extends('layout')

@section('content')

	<div class="row">

		<div class="col-md-12">
			<h2>{{ $card->title }}</h2>
		</div>

		<div class="col-md-4">

			<h4><i class="fas fa-map-marker-alt"></i> {{ $regions::all()[$card->region] }}, {{ $card->city }}, {{ $card->street }}, {{ $card->zip }}</h4>

			<h3><strong><i class="fas fa-ruble-sign"></i> {{ $card->price }}</strong></h3>

			<div>
				{!! nl2br($card->description) !!}
			</div>
			<a href="#" class="btn btn-info"><i class="fas fa-heart"></i> Добавить в избранное</a>	
			<hr>
			<small>Рубрика: {{ $card->category->name }}</small>			
		</div>

		<div class="col-md-8">
			@foreach($card->photos->chunk(4) as $set)

				<div class="row">
					@foreach($set as $photo)
						<div class="col-md-3 col-sm-6 my-2">
							<img src="/{{ $photo->thumbnail_path }}" alt="" class="rounded">
						</div>
					@endforeach					
				</div>
			@endforeach
		</div>
	
	</div>

@stop