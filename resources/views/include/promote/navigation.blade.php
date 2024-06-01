@if (Route::has('login'))
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('promote.index') }}"><span
                    class="flaticon-pizza-1 mr-1"></span>GIANT<br><small>Pizza</small></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="{{ route('promote.index') }}" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{ route('promote.menu') }}" class="nav-link">Menu</a></li>
                    @auth
                    <li class="nav-item"><a href="{{ url('/cart') }}" class="nav-link">
                            Cart
                        </a></li>
                    @else
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">
                            Cart
                        </a></li>
                    @endauth
                    @auth
                        <a href="{{ url('/dashboard') }}">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}">
                            Log in /
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">
                            / Register
                            </a>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
@endif
<!-- END nav -->
