@extends('layout')

@section('content')

	<h4>Адрес: {!! $card->region !!}, {!! $card->city !!}, {!! $card->street !!}, {!! $card->zip !!}</h4>

	<h4>Цена: {!! $card->price !!}</h4>

	<div>
		{!! nl2br($card->description) !!}
	</div>

@stop