@extends('layout')

@section('content')

    <div class="p-3 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">{{config('app.name')}}</h1>
        <p class="fs-4">Доска бесплатных объявлений <strong>{{config('app.name')}}</strong> позволяет легко и просто добавить свое объявление. Причем совершенно бесплатно! Все объявления разбиты по рубрикам и темам. Есть удобный поиск по всей базе объявлений. Если вы хотите разместить свое объявление бесплатно и в кратчайшие сроки, то смело жмите на кнопку ниже!</p>
        <a href="/cards/create" class="btn btn-info btn-lg">Разместить объявление</a>
      </div>
    </div>
@stop