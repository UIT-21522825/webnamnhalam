@extends('admin.layouts.app')
@section('title', 'Coupons')
@section('content')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-0">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-8 text-dark" href="{{route('dashboard')}}">Hệ thống quản lý</a>
                </li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Khuyến mãi</li>
            </ol>
            <h1 class="font-weight-bolder mb-0 title-font title-categories">Khuyến mãi</h1>
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
                <li class="nav-item px-3-1 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0">
                        <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer text-dark"></i>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
    <div class="card">

        @if (session('message'))
            <h1 class="text-primary">{{ session('message') }}</h1>
        @endif


        {{-- <h1>
            Coupon list
        </h1> --}}
        <div>
            <a href="{{ route('coupons.create') }}" class="btn btn-primary mt-3">Tạo mới</a>

        </div>
        <div>
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Phân loại</th>
                    <th>Giá trị</th>
                    <th>Ngày hết hạn</th>
                    <th>Thao tác</th>
                </tr>

                @foreach ($coupons as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>

                        <td>{{ $item->type }}</td>
                        <td>{{ $item->value }}</td>
                        <td>{{ $item->expery_date }}</td>

                        <td>
                            @can('update-coupon')
                                <a href="{{ route('coupons.edit', $item->id) }}" class="btn btn-warning">Sửa</a>
                            @endcan
                            @can('delete-coupon')
                                <form action="{{ route('coupons.destroy', $item->id) }}" id="form-delete{{ $item->id }}"
                                    method="post">
                                    @csrf
                                    @method('delete')

                                </form>

                                <button class="btn btn-delete btn-danger" data-id={{ $item->id }}>Xóa</button>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $coupons->links() }}
        </div>

    </div>

@endsection

@section('script')

    <script></script>
@endsection
