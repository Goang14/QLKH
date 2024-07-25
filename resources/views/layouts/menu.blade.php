<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link {{ request()->is('repair') ? 'active-menu' : '' }}" href="{{route('repairs')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-bar-chart-line-fill"></i></div>
                    Quản lý thông tin
                </a>

                <a class="nav-link {{ request()->is('product') ? 'active-menu' : '' }}" href="{{route('product')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Quản lý sản phẩm
                </a>

                <a class="nav-link {{ request()->is('suppliers') ? 'active-menu' : '' }}" href="{{route('suppliers')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-people-roof"></i></div>
                    Quản lý nhà cung cấp
                </a>

                {{-- <a class="nav-link {{ request()->is('customer') ? 'active-menu' : '' }}" href="{{route('customer')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-people-roof"></i></div>
                    Quản lý khách hàng
                </a> --}}

                <hr class="mb-1" />

                {{--<a class="nav-link {{ request()->is('user') ? 'active-menu' : '' }}" href="">
                    <div class="sb-nav-link-icon"><i class="fas fa-person-lines-fill"></i></div>
                    Quản lý xuất hàng
                </a>

                <a class="nav-link {{ request()->is('project') ? 'active-menu' : '' }}" href="">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Quản lý đơn hàng
                </a>

                <a class="nav-link {{ request()->is('suppliers') ? 'active-menu' : '' }}" href="{{route('suppliers')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-people-roof"></i></div>
                    Quản lý nhà cung cấp
                </a>

                <a class="nav-link {{ request()->is('project') ? 'active-menu' : '' }}" href="">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-chart-simple"></i></div>
                    Báo cáo và Thống kê
                </a>

                <a class="nav-link {{ request()->is('client') ? 'active-menu' : '' }}" href="">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-people-roof"></i></div>
                    Quản lý khách hàng
                </a> --}}
            </div>
        </div>
    </nav>
</div>
