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
                    <li class="nav-item"><a href="{{ route('cart.index') }}" class="nav-link">
                            ตะกร้าสินค้า
                        </a></li>
                    <li class="nav-item"><a href="{{ route('order.index') }}" class="nav-link">
                            คำสั่งซื้อ
                        </a></li>
                    @else
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">
                        ตะกร้าสินค้า
                        </a></li>
                    @endauth
                    @auth
                        @if(Auth::user()->isAdmin == 1)
                        <li class="nav-item">
                            <a href="{{ route('dashboard.index') }}" class="button2 rounded mx-1">
                                <span>สำหรับผู้ดูแลระบบ</span>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="button2 mx-1" style="background-color: rgba(255, 0, 0, 0.644);">
                                <span>ออกจากระบบ</span>
                            </a>
                        </li>
                    @else
                    <li class="nav-item"><a href="{{ route('login') }}" class="button2  rounded">
                            <span>เข้าสู่ระบบ</span>
                        </a></li>

                        @if (Route::has('register'))
                        <li class="nav-item"><a href="{{ route('register') }}" class=" button2 mx-1  rounded" style="background-color: rgba(255,255,255,0.1);">
                                <span>สมัครสมาชิก</span>
                            </a></li>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
@endif
<!-- END nav -->
