@extends('admin.layouts.app')

@section('title', 'Show Product')

@section('content')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-0 mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-8 text-dark" href="{{route('dashboard')}}">Hệ thống quản lý</a>
                </li>
                <li class="breadcrumb-item text-sm"><a class="opacity-8 text-dark" href="{{route('products.index')}}">Sản phẩm</a>
                </li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Chi tiết sản phẩm</li>
            </ol>
            <h1 class="font-weight-bolder mb-0 title-font title-categories">Chi tiết sản phẩm</h1>
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
                <div class="row">
                    <div class="input-group-static col-5 mb-4 mt-3">
                        <label class="font-form">Hình ảnh</label>
                    </div>
                    <div class="col-5">
                         <img class="img-user" src="{{$product->images ? asset('upload/' . $product->images->first()->url) : 'upload/defaultproduct.png'}}" id="show-image" alt="">
                    </div>
                </div>

                <div class="">
                    <p class="font-form">Tên sản phẩm</p> 
                    <p>{{$product->name}}</p>
                </div>

                <div class="">
                    <p class="font-form">Giá</p>
                    <p>{{$product->price}}</p>
                </div>

                <div class="">
                    <p class="font-form">Giá giảm %</p>
                    <p>{{$product->sale}}</p>
                </div>

                <div class="form-group">
                    <p class="font-form">Mô tả</p>
                    <div class="row w-100 h-100">
                        {!! $product->description !!}
                    </div>
                </div>


                <div class="">
                    <p class="font-form">Kích cỡ</p>
                    @if($product->details->count() > 0)
                        @foreach($product->details as $detail)
                            <p>Kích cỡ: {{$detail->size}} - quantity:{{$detail->quantity}}</p>
                        @endforeach
                    @else
                    <p class="font-form">Sản phẩm chưa cài đặt kích cỡ</p>
                    @endif
                </div>

                <div class="">
                    <p class="font-form">Danh mục</p>
                    @foreach($product->categories as $item)
                        <p>{{$item->name}}</p>
                    @endforeach
                </div>

        </div>
    </div>
@endsection

