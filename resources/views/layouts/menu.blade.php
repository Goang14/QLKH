<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseInfo" aria-expanded="false" aria-controls="collapseInfo">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-info"></i></div>
                    Quản lý thông tin
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseInfo" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->is('sell') ? 'active-menu' : '' }}" href="{{route('sells')}}">
                            <div class="sb-nav-link-icon"><i class="fa-brands fa-sellsy"></i></div>
                            Bán hàng
                        </a>
                        <a class="nav-link {{ request()->is('repair') ? 'active-menu' : '' }}" href="{{route('repairs')}}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-hammer"></i></div>
                            Sửa chữa
                        </a>
                        <a class="nav-link {{ request()->is('pawn') ? 'active-menu' : '' }}" href="{{route('pawns')}}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-book"></i></div>
                            Cầm đồ
                        </a>
                    </nav>
                </div>

                <a class="nav-link {{ request()->is('product') ? 'active-menu' : '' }}" href="{{route('product')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Quản lý sản phẩm
                </a>

                <a class="nav-link {{ request()->is('suppliers') ? 'active-menu' : '' }}" href="{{route('suppliers')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-people-roof"></i></div>
                    Quản lý nhà cung cấp
                </a>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseOrder" aria-expanded="false" aria-controls="collapseOrder">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-wallet"></i></div>
                    Quản lý hóa đơn
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseOrder" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->is('repair/info1') ? 'active-menu' : '' }}" href="">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                            Danh sách hóa đơn
                        </a>
                        <a class="nav-link {{ request()->is('repair/info2') ? 'active-menu' : '' }}" href="">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-flag"></i></div>
                            BC hóa đơn theo ngày
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </nav>
</div>
