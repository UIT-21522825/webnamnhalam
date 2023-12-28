<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header mb-5">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand mb-0" href="{{route('dashboard')}}" target="_blank">
            <img src="{{asset('admin/assets/img/logo.png')}}" class="navbar-brand-img h-300 w-300" alt="main_logo">
            
            <span class="ms-1 font-weight-bold text-white">Chào, {{ auth()->user()->name }}!</span>
        </a>
    </div>
    <hr class="horizontal light mt-20 mb-2">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white {{request()->routeIs('dashboard') ? 'active bg-gradient-primary' :''}}" href="{{route('dashboard')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Tổng quan</span>
                </a>
            </li>
            @hasrole('admin')
            <li class="nav-item">
                <a class="nav-link text-white {{request()->routeIs('roles.*') ? 'active bg-gradient-primary' :''}}" href="{{route('roles.index')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Vai trò</span>
                </a>
            </li>
            @endhasrole
            @can('show-user')
            <li class="nav-item">
                <a class="nav-link text-white {{request()->routeIs('users.*') ? 'active bg-gradient-primary' :''}}" href="{{route('users.index')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">receipt_long</i>
                    </div>
                    <span class ="nav-link-text ms-1">Người dùng</span>
                </a>
            </li>
            @endcan
            @can('show-category')
            <li class="nav-item">
                <a class="nav-link text-white {{request()->routeIs('categories.*') ? 'active bg-gradient-primary' :''}}" href="{{route('categories.index')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">receipt_long</i>
                    </div>
                    <span class="nav-link-text ms-1">Danh mục</span>
                </a>
            </li>
            @endcan
            @can('show-product')
            <li class="nav-item">
                <a class="nav-link text-white {{request()->routeIs('products.*') ? 'active bg-gradient-primary' :''}}" href="{{route('products.index')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">receipt_long</i>
                    </div>
                    <span class="nav-link-text ms-1">Sản phẩm</span>
                </a>
            </li>
            @endcan

            @can('show-coupon')
                <li class="nav-item">
                    <a class="nav-link text-white {{request()->routeIs('coupons.*') ? 'active bg-gradient-primary' :''}}" href="{{route('coupons.index')}}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">receipt_long</i>
                        </div>
                        <span class="nav-link-text ms-1">Mã khuyến mãi</span>
                    </a>
                </li>
            @endcan

            {{-- @can('list-order') --}}
            <li class="nav-item">
                <a class="nav-link text-white {{request()->routeIs('admin.orders.*') ? 'active bg-gradient-primary' :''}}" href="{{route('admin.orders.index')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">receipt_long</i>
                    </div>
                    <span class="nav-link-text ms-1">Đơn hàng</span>
                </a>
            </li>
            {{-- @endcan --}}
            
           
        </ul>
    </div>
</aside>
