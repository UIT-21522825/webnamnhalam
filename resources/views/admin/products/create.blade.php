@extends('admin.layouts.app')

@section('title', 'Create Product')

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
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tạo sản phẩm</li>
            </ol>
            <h1 class="font-weight-bolder mb-0 title-font title-categories">Tạo sản phẩm</h1>
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
            <form action="{{ route('products.store') }}" method="post" id="createForm" enctype="multipart/form-data">
                @csrf
                
                <div class="row flex">
                    <div class="input-group-static col-5 mb-4 mt-3 ">
                        <label class="font-form">Hình ảnh</label>
                        <input type="file" accept="image/*" name="image" id="image-input" class="form-control">

                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-5">
                        <img src="" class="img-user" id="show-image" alt="">
                    </div>
                </div>

                <div class="input-group input-group-static mb-4">
                    <label class="font-form">Tên sản phẩm</label>
                    <input type="text" value="{{ old('name') }}" name="name" class="form-control">

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group input-group-static mb-4">
                    <label class="font-form">Giá</label>
                    <input type="number" step="0.1" value="{{ old('price') }}" name="price" class="form-control">
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group input-group-static mb-4">
                    <label class="font-form">Giảm giá %</label>
                    <input type="number" value="0" value="{{ old('sale') }}" name="sale" class="form-control">
                    @error('sale')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-form">Mô tả</label>
                    <div class="row-des w-100 h-100">
                        <textarea name="description" id="description" class="form-control" cols="4" rows="5"
                            style="width: 100%">{{ old('description') }} </textarea>
                    </div>
                    @error('description')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>


                <div class="form-group">
                    <label class="font-form">Thêm kích cỡ</label>
                    <input type="hidden" id="inputSize" name='sizes'>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddSizeModal">
                        Thêm
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="AddSizeModal" tabindex="-1" aria-labelledby="AddSizeModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-form" id="AddSizeModalLabel">Thêm kích cỡ</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Đóng</button>
                            </div>
                            <div class="modal-body" id="AddSizeModalBody">

                            </div>
                            <div class="mt-3">
                                <button type="button" class="btn btn-primary btn-add-size">Thêm</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="input-group input-group-static mb-4">
                    <label class="ms-0 font-form">Danh mục</label>
                    <select name="category_id[]" class="form-control" multiple>
                        @foreach($categories as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                

                {{-- <div class="input-group input-group-static mb-4">
                    <label name="group" class="ms-0">Danh mục</label>
                    <select name="category_ids[]" class="form-control" multiple>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>

                    @error('category_ids')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div> --}}
                <div class="text-center">

                    <button type="submit" class="btn btn-submit btn-primary">Lưu</button>
                    <button type="reset" class="btn btn-danger">Hủy</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('style')
<style>
    .w-40 {
        width: 40%;
    }

    .w-20 {
        width: 20%;
    }

    .row-des {
        justify-content: center;
        align-items: center
    }

    .ck.ck-editor {
        width: 100%;
        height: 100%;
    }
</style>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"
    integrity="sha512-WFN04846sdKMIP5LKNphMaWzU7YpMyCU245etK3g/2ARYbPK9Ub18eG+ljU96qKRCWh+quCY7yefSmlkQw1ANQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('plugin/ckeditor5-build-classic/ckeditor.js') }}"></script>
<script>
    let sizes = [{
        id: Date.now(),
        size: '1kg',
        quantity: 1
    }];
</script>

<script src="{{ asset('admin/assets/js/product/product.js') }}"></script>

@endsection
