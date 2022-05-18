@extends('layout')

@section('content')

	<div class="row">

		<div class="col-md-3">
			<h4>Адрес: {!! $card->region !!}, {!! $card->city !!}, {!! $card->street !!}, {!! $card->zip !!}</h4>

			<h4>Цена: {!! $card->price !!}</h4>

			<div>
				{!! nl2br($card->description) !!}
			</div>				
		</div>

		<div class="col-md-9">
			@foreach($card->photos as $photo)
				<img src="{{ $photo->path }}" alt="">

			@endforeach
		</div>
	
	</div>

@stop