@inject('regions', 'App\Http\Utilities\Region')

@extends('layout')

@section('content')

	<div class="row">

		<div class="col-md-4">
			<h4>Адрес: {!! $regions::all()[$card->region] !!}, {!! $card->city !!}, {!! $card->street !!}, {!! $card->zip !!}</h4>

			<h4>Цена: {!! $card->price !!}</h4>

			<div>
				{!! nl2br($card->description) !!}
			</div>				
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