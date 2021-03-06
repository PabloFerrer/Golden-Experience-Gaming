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
                        {{ __('Login') }}  <i class="fas fa-sign-in-alt"></i></a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                        {{ __('Register') }} <i class="far fa-user-circle"></i></a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <i class="fas fa-user-circle"></i><span class="caret"></span>
                        </a>

						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

							<a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}  <i class="fas fa-sign-out-alt"></i></a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}</form>
                        </div>
                    </li>


					@if(Auth::user()->role==1)
						<li class="nav-item dropdown">
							<a id="navbarDropdownWallet" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

								{{ Auth::user()->wallet }} <i class="fas fa-coins"></i><span class="caret"></span>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownWallet">
								<a class="dropdown-item" href="{{ route('wallet') }}">
								{{ __('Añadir fondos') }}  <i class="fas fa-wallet"></i></a>
							</div>
						</li>


						<li class="nav-item">
							<a class="nav-link" href="{{ route('cart') }}">
							<i class="fas fa-shopping-cart"></i></a>
						</li>
					@endif

					@if(Auth::user()->role==2)
						<li class="nav-item dropdown">
							<a id="navbarDropdownWallet" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

								{{ Auth::user()->wallet }} <i class="fas fa-coins"></i><span class="caret"></span>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownWallet">
								<a class="dropdown-item" href="{{ route('royalties') }}">
								{{ __('Retirar fondos') }}  <i class="fas fa-cash-register"></i></a>
							</div>
						</li>
					@endif

                @endguest
            </ul>
        </div>
    </div>
</nav>
