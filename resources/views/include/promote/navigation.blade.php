@if (Route::has('login'))
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}"><span
                    class="flaticon-pizza-1 mr-1"></span>GIANT<br><small>Pizza</small></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> เมนู
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">หน้าแรก</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('menu.index') }}" class="nav-link">รายการสินค้า</a>
                    </li>
                    @auth
                    <li class="nav-item"><a href="" class="nav-link">
                            ตระกร้าสินค้า
                        </a></li>
                    @else
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">
                        ตระกร้าสินค้า
                        </a></li>
                    @endauth
                    @auth
                        @if(Auth::user()->isAdmin == 1)
                            <a href="{{ url('/dashboard') }}">
                                สำหรับผู้ดูแลระบบ
                            </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}">
                            เข้าสู่ระบบ /
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">
                            / สมัครสมาชิก
                            </a>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
@endif
<!-- END nav -->
