<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Quản lý sản phẩm
                </a>

                <a class="nav-link {{ request()->is('statistical') ? 'active-menu' : '' }}" href="">
                    <div class="sb-nav-link-icon"><i class="fas fa-bar-chart-line-fill"></i></div>
                    Quản lý tồn kho
                </a>

                <hr class="mb-1" />

                <a class="nav-link {{ request()->is('working-time') ? 'active-menu' : '' }}" href="">
                    <div class="sb-nav-link-icon"><i class="fas fa-calendar-check"></i></div>
                    Quản lý nhập hàng
                </a>

                <a class="nav-link {{ request()->is('user') ? 'active-menu' : '' }}" href="">
                    <div class="sb-nav-link-icon"><i class="fas fa-person-lines-fill"></i></div>
                    Quản lý xuất hàng
                </a>

                <a class="nav-link {{ request()->is('project') ? 'active-menu' : '' }}" href="">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Quản lý đơn hàng
                </a>

                <a class="nav-link {{ request()->is('client') ? 'active-menu' : '' }}" href="{{route('suppliers')}}">
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
                </a>
            </div>
        </div>
    </nav>
</div>
