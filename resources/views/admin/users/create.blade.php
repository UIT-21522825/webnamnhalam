@extends('admin.layouts.app')
@section('title', 'Create User')
@section('content')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-0 mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-8 text-dark" href="{{route('dashboard')}}">Hệ thống quản lý</a>
                </li>
                <li class="breadcrumb-item text-sm"><a class="opacity-8 text-dark" href="{{route('users.index')}}">Người dùng</a>
                </li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tạo người dùng</li>
            </ol>
            <h1 class="font-weight-bolder mb-0 title-font title-categories">Tạo người dùng</h1>
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
        <form action="{{route('users.store')}}" method="post"  enctype="multipart/form-data">
            @csrf

            {{-- <div class="row">
                <div class="input-group-static mb-4 col-5">
                    <label>Hình ảnh</label>
                    <input name="image" id="image-input" type="file" accept="image/*" class="form-control"/>
                    @error('image')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-5">
                    <img src="" id="show-image" alt="">
                </div>
            </div> --}}
            <div class="row">
                    <div class=" input-group-static col-5 mb-4 mt-3 ">
                        <label class="font-form">Hình ảnh</label>
                        <input type="file" accept="image/*" name="image" id="image-input" class="form-control">

                        @error('image')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-5">
                        <img src="" class="img-user" id="show-image" alt="">
                    </div>
                </div>
            

            <div class="input-group input-group-static mb-4">
                <label class="font-form">Tên người dùng</label>
                <input name="name" type="text" value="{{old('name')}}" class="form-control"/>
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="input-group input-group-static mb-4">
                <label class="ms-0 font-form">Giới tính</label>
                <select name="gender" class="form-control selected">
                    <option class="selected" value="Nam">Nam</option>
                    <option  class="selected" value="Nữ">Nữ</option>
                </select>
                @error('group')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="input-group input-group-static mb-4">
                <label class="font-form">Địa chỉ</label>
                <textarea name="address" value="{{old('address')}}" class="form-control"></textarea>
                @error('address')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="input-group input-group-static mb-4">
                <label class="font-form">Số điện thoại</label>
                <input name="phone" type="text" value="{{old('phone')}}" class="form-control"/>
                @error('phone')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="input-group input-group-static mb-4">
                <label class="font-form">Email</label>
                <input name="email" type="email" value="{{old('email')}}" class="form-control"/>
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="input-group input-group-static mb-4">
                <label class="font-form">Mật khẩu</label>
                <input name="password" type="password" class="form-control"/>
                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="" class="font-form">Vai trò</label>
                <div class="row">
                    @foreach($roles as $groupName => $role)
                    <div class="col-5">
                        <h4 class="font-form-permission">{{$groupName}}</h4>
                        <div>
                            @foreach($role as $item)
                            <div class="form-check">
                                <input class="form-check-input" name="role_id[]" type="checkbox" value="{{$item->id}}">
                                <label class="custom-control-label" for="customCheck1">{{$item->display_name}}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-submit btn-primary">Lưu</button>
                <button type="reset" class="btn btn-danger">Hủy</button>
            </div>
        </form>
    </div>
</div>

@endsection

@yield('script')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script>
        $(() => {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#show-image').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#image-input").change(function() {
                readURL(this);
            });



        });
    </script>

