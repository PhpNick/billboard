@extends('layout')

@section('content')

    <div class="p-3 mb-4 bg-white border rounded-3">
      <div class="container-fluid py-3">
        <h1 class="display-5 fw-bold">{{config('app.name')}}</h1>
        <p class="fs-4">Доска бесплатных объявлений <strong>{{config('app.name')}}</strong> позволяет легко и просто добавить свое объявление. Причем совершенно бесплатно! Все объявления разбиты по рубрикам. Есть удобный поиск по всей базе объявлений. Если вы хотите разместить свое объявление бесплатно и в кратчайшие сроки, то смело жмите на кнопку ниже!</p>
        <a href="/cards/create" class="btn btn-info btn-lg">Разместить объявление</a>
      </div>
    </div>

    <div class="row">

        <div class="col-md-3 col-sm-6">
          <div class="card my-2">
            <img src="https://images.adsttc.com/media/images/5e68/48ed/b357/658e/fb00/0441/large_jpg/AM1506.jpg?1583892706" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">100 000 руб.</h5>
              <p class="card-text">Заголовок объявления</p>
              <a href="#" class="btn btn-info">Просмотр</a>
            </div>
          </div>          
        </div>

        <div class="col-md-3 col-sm-6">
          <div class="card my-2">
            <img src="https://images.adsttc.com/media/images/5e68/48ed/b357/658e/fb00/0441/large_jpg/AM1506.jpg?1583892706" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">100 000 руб.</h5>
              <p class="card-text">Заголовок объявления</p>
              <a href="#" class="btn btn-info">Просмотр</a>
            </div>
          </div>          
        </div>

        <div class="col-md-3 col-sm-6">
          <div class="card my-2">
            <img src="https://images.adsttc.com/media/images/5e68/48ed/b357/658e/fb00/0441/large_jpg/AM1506.jpg?1583892706" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">100 000 руб.</h5>
              <p class="card-text">Заголовок объявления</p>
              <a href="#" class="btn btn-info">Просмотр</a>
            </div>
          </div>          
        </div>                

    </div>    
@stop