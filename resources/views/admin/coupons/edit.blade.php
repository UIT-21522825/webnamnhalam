@extends('admin.layouts.app')
@section('title', 'Edit Coupon'. $coupon->name)
@section('content')

<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-0 mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-8 text-dark" href="{{route('dashboard')}}">Hệ thống quản lý</a>
                </li>
                <li class="breadcrumb-item text-sm"><a class="opacity-8 text-dark" href="{{route('coupons.index')}}">Mã khuyến mãi</a>
                </li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Sửa mã khuyến mãi</li>
            </ol>
            <h1 class="font-weight-bolder mb-0 title-font title-categories">Sửa mã khuyến mãi</h1>
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
<div class="card">
    <div>
                <form action="{{route('coupons.update', $coupon->id)}}" method="post">
            @csrf
            @method('put')
            <div class="input-group input-group-static mb-4">
                <label class="font-form">Tên</label>
                <input name="name" type="text" value="{{old('name') ?? $coupon->name}}" class="form-control" style="text-transform: uppercase"/>
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <div class="input-group input-group-static mb-4">
                <label class="font-form">Giá trị</label>
                <input name="value" type="number" value="{{old('value') ?? $coupon->value}}" class="form-control"/>
                @error('value')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="input-group input-group-static mb-4">
                <label class="ms-0 font-form">Phân loại</label>
                <select name="type" class="form-control" >
                    <option >---Chọn loại---</option>
                    <option value="money" {{ (old('type') ?? $coupon->type) == 'money' ? 'selected' : '' }}>Tiền</option>
                </select>
            </div>
            @error('type')
                <span class="text-danger">{{$message}}</span>
            @enderror


            <div class="input-group input-group-static mb-4">
                <label class="font-form" >Ngày hết hạn</label>
                <input name="expery_date" type="date" value="{{old('expery_date') ?? $coupon->expery_date}}" class="form-control"/>
                @error('expery_date')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            

           <div class="text-center">
            <button type="submit" class="btn btn-submit btn-primary">Cập nhật</button>
           </div>
        </form>
    </div>
</div>
@endsection