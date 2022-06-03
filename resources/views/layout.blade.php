<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/css/app.css">
	<title>{{config('app.name')}}</title>
</head>
<body class="d-flex flex-column h-100">

	<nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="Fourth navbar example">
	<div class="container-fluid">
	  <a class="navbar-brand" href="/">{{config('app.name')}}</a>
	  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarsExample04">
	    <ul class="navbar-nav me-auto">
	      <li class="nav-item">
	        <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" aria-current="page" href="/">Главная</a>
	      </li>
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">Рубрики</a>
	        <ul class="dropdown-menu" aria-labelledby="dropdown04">
	        	@foreach ($categories as $category)
	        		<li><a class="dropdown-item" href="/category/{{ $category->id }}">{{ $category->name }}</a></li>
	        	@endforeach	
	        </ul>
	      </li>

	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-bs-toggle="dropdown" aria-expanded="false">Объявления</a>
	        <ul class="dropdown-menu" aria-labelledby="dropdown05">
	          <li><a class="dropdown-item" href="/cards/create">Разместить объявление</a></li>
	          <hr class="mt-2 mb-3"/>

	          @guest
	          @if (Route::has('login'))
	          <li><a class="dropdown-item" href="{{ route('login') }}">Мои объявления</a></li>
	          <li><a class="dropdown-item" href="{{ route('login') }}">Избранные объявления</a></li>	          
	          @endif
	          @else
	          <li><a class="dropdown-item" href="/user/{{  Auth::id() }}/cards">Мои объявления</a></li>
	          <li><a class="dropdown-item" href="/user/{{  Auth::id() }}/cards/?favorites=1">Избранные объявления</a></li>	          
	          @endguest
	        </ul>
	      </li>	      
	    </ul>

		<ul class="navbar-nav">
		<!-- Authentication Links -->
		@guest
		    @if (Route::has('login'))
		        <li class="nav-item">
		            <a class="nav-link" href="{{ route('login') }}">Вход</a>
		        </li>
		    @endif

		    @if (Route::has('register'))
		        <li class="nav-item">
		            <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
		        </li>
		    @endif
		@else
		    <li class="nav-item dropdown">
		        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
		            {{ Auth::user()->name }}
		        </a>

		        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
		            <li><a class="dropdown-item" href="{{ route('logout') }}"
		               onclick="event.preventDefault();
		                             document.getElementById('logout-form').submit();">
		                Выход
		            </a>

		            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
		                @csrf
		            </form>
		        	</li>
		        </ul>
		    </li>
		@endguest
		</ul>		    
	  </div>
	</div>
	</nav>	


	<div class="container my-3" id="app">
		@yield('content')
	</div>

	<footer class="footer mt-auto py-3 bg-white border-top text-center">
	  <div class="container">
	    <span class="text-muted">Доска бесплатных объявлений {{config('app.name')}}</span>
	  </div>
	</footer>	

	<script src="/js/app.js"></script>
	@include('flash')
	@yield('scripts.footer')
	
</body>
</html>