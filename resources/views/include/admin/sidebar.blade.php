<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bolder ms-2">
                ระบบจัดการร้านค้า
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="{{ route('dashboard.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">
                    หน้าแรก
                </div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text"></span>
            บริการ/จัดการ
        </li>

        <!-- Cards -->
        <li class="menu-item">
            <a href="{{ route('dashboard.product.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-list-ul"></i>
                <div data-i18n="Basic">
                    สินค้า
                </div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('dashboard.category.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div data-i18n="Basic">ประเภทสินค้า</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('dashboard.size.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-ruler"></i>
                <div data-i18n="Basic">ขนาดของสินค้า</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('dashboard.order.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cart-alt"></i>
                <div data-i18n="Basic">รายการสั่งของ</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('dashboard.user.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n="Basic">ลูกค้า</div>
            </a>
        </li>
        {{-- <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Cart</div>
            </a>
        </li> --}}

    </ul>
</aside>
<!-- / Menu -->
