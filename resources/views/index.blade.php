@extends('layout')

@section('content')

    <div class="p-3 mb-4 bg-white border rounded-3">
      <div class="container-fluid py-3">
        <h1 class="display-5 fw-bold">{{config('app.name')}}</h1>
        <p class="fs-4">Доска бесплатных объявлений <strong>{{config('app.name')}}</strong> позволяет легко и просто добавить свое объявление. Причем совершенно бесплатно! Все объявления разбиты по рубрикам. Если вы хотите разместить свое объявление бесплатно и в кратчайшие сроки, то смело жмите на кнопку ниже!</p>
        <a href="/cards/create" class="btn btn-info btn-lg">Разместить объявление</a>
      </div>
    </div>

    @if ($category->exists)
      <h1>Объявления из рубрики: {{ $category->name }}</h1>
    @elseif ($user->exists)
      @if (request()->favorites)
        <h1>Избранные объявления пользователя: {{ $user->name }}</h1>
      @else
        <h1>Объявления пользователя: {{ $user->name }}</h1>
      @endif
    @else
      <h1>Все объявления</h1>
    @endif

    @foreach($cards->chunk(4) as $set)
    <div class="row">
        @foreach($set as $card)
        <div class="col-md-3 col-sm-6">
          <div class="card my-2">
            <img src="{{ $card->firstPhotoPath() }}" class="card-img-top" alt="">
            <div class="card-body">
              <h5 class="card-title">{{ $card->price }} <i class="fas fa-ruble-sign"></i></h5>
              <p class="card-text">{{ $card->title }}</p>

              <a href="/category/{{ $card->category->id }}/card/{{ $card->id }}" class="btn btn-info">Просмотр</a>
            </div>
          </div>          
        </div>              
        @endforeach
    </div> 
    @endforeach   
@stop