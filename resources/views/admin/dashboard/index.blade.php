@extends('admin.layouts.app')

@section('content')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl mb-5" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-0 mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-8 text-dark" href="{{route('dashboard')}}">Hệ thống quản lý</a>
                </li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tổng quan</li>
            </ol>
            <h1 class="font-weight-bolder mb-0 title-font title-categories">Tổng quan</h1>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 " id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group input-group-outline">

                </div>
            </div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <a class="dropdown-item text-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Đăng xuất') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item px-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0">
                        <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer text-dark"></i>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 ">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-user shadow-user text-center border-radius-xl mt-n4 position-absolute">
                    <i class="fas fa-user opacity-10"></i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Người dùng</p>
                    <h4 class="mb-0 text-capitalize">{{ $userCount }}</h4>
                </div>
            </div>
            {{-- <hr class="dark horizontal my-0"> --}}

        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                    <i class="fas fa-cube opacity-10"></i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Sản phẩm</p>
                    <h4 class="mb-0 text-capitalize">>{{ $productCount }}</h4>
                </div>
            </div>
            {{-- <hr class="dark horizontal my-0"> --}}

        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-cat shadow-cat text-center border-radius-xl mt-n4 position-absolute">
                    <i class="fas fa-folder opacity-10"></i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Danh mục</p>
                    <h4 class="mb-0 text-capitalize">{{ $categoryCount }}</h4>
                </div>
            </div>
            {{-- <hr class="dark horizontal my-0"> --}}

        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-order shadow-order text-center border-radius-xl mt-n4 position-absolute">
                    <i class="fas fa-shopping-cart opacity-10"></i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Đơn hàng</p>
                    <h4 class="mb-0 text-capitalize">{{ $orderCount }}</h4>
                </div>
            </div>
            {{-- <hr class="dark horizontal my-0"> --}}

        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mt-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-role shadow-role text-center border-radius-xl mt-n4 position-absolute">
                    <i class="fas fa-users opacity-10"></i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Vai trò</p>
                    <h4 class="mb-0 text-capitalize">{{ $roleCount }}</h4>
                </div>
            </div>
            {{-- <hr class="dark horizontal my-0"> --}}

        </div>
    </div>

    <div class="col-xl-3 col-sm-6 mt-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-coupon shadow-coupon text-center border-radius-xl mt-n4 position-absolute">
                    <i class="fas fa-tags opacity-10"></i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Mã khuyến mãi</p>
                    <h4 class="mb-0 text-capitalize">{{ $couponCount }}</h4>
                </div>
            </div>
            {{-- <hr class="dark horizontal my-0"> --}}

        </div>
    </div>
@endsection
