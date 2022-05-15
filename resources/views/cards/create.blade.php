@extends('layout')

@section('content')

	<h1>Ваше новое объявление</h1>

	<div class="row">
	@include('cards.form')
	</div>

@stop