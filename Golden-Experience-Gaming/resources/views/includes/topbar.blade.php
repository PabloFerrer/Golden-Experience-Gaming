<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<nav class="navbar fixed-top navbar-expand-md navbar-light navbar-laravel bar" id="top-menu">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{asset('img/logo.jpeg')}}" id="logo">
        </a>
        <h2 class="navbar-brand" href="{{ url('/') }}" id="title">
            Golden Experience Gaming
        </h2>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                        {{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                        {{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if(Auth::user()->role == 1)
								<a class="dropdown-item" href="{{ route('cart') }}">
								{{ __('Ver carrito') }}</a>

								<a class="dropdown-item" href="{{ route('wishlist') }}">
								{{ __('Ver lista de deseados') }}</a>

								<a class="dropdown-item" href="{{ route('wallet') }}">
								{{ __('Añadir fondos') }}</a>
							@endif
							
							@if(Auth::user()->role == 2)
								<a class="dropdown-item" href="{{ route('royalties') }}">
								{{ __('Retirar fondos') }}</a>								
							@endif

                            
							<a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}</form>
                        </div>
                    </li>

                    <li id="navmoney" class="nav-item">
                    {{ Auth::user()->wallet }}</li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
