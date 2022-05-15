<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/css/app.css">
	<title>{{config('app.name')}}</title>
</head>
<body>

	<nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="Fourth navbar example">
	<div class="container-fluid">
	  <a class="navbar-brand" href="/">{{config('app.name')}}</a>
	  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarsExample04">
	    <ul class="navbar-nav me-auto mb-2 mb-md-0">
	      <li class="nav-item">
	        <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" aria-current="page" href="/">Главная</a>
	      </li>
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">Рубрики</a>
	        <ul class="dropdown-menu" aria-labelledby="dropdown04">
	          <li><a class="dropdown-item" href="#">Одежда</a></li>
	          <li><a class="dropdown-item" href="#">Электроника</a></li>
	          <li><a class="dropdown-item" href="#">Недвижимость</a></li>
	          <li><a class="dropdown-item" href="#">Животные</a></li>
	        </ul>
	      </li>

	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-bs-toggle="dropdown" aria-expanded="false">Объявления</a>
	        <ul class="dropdown-menu" aria-labelledby="dropdown05">
	          <li><a class="dropdown-item" href="/cards/create">Разместить объявление</a></li>
	          <hr class="mt-2 mb-3"/>
	          <li><a class="dropdown-item" href="#">Все объявления</a></li>
	          <li><a class="dropdown-item" href="#">Мои объявления</a></li>
	          <li><a class="dropdown-item" href="#">Популярные объявления</a></li>
	        </ul>
	      </li>	      
	        </ul>
	      </li>
	    </ul>
	    <form role="search">
	      <input class="form-control" type="search" placeholder="Поиск по объявлениям" aria-label="Search">
	    </form>
	  </div>
	</div>
	</nav>	


	<div class="container my-3">
		@yield('content')
	</div>

	<script src="/js/app.js"></script>
</body>
</html>