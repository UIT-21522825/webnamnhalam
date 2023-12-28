@extends('admin.layouts.app')
@section('title', 'Edit Roles'.$role->name)
@section('content')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-0 mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-8 text-dark" href="{{route('dashboard')}}">Hệ thống quản lý</a>
                </li>
                <li class="breadcrumb-item text-sm"><a class="opacity-8 text-dark" href="{{route('roles.index')}}">Vai trò</a>
                </li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Sửa vai trò</li>
            </ol>
            <h1 class="font-weight-bolder mb-0 title-font title-categories">Sửa vai trò</h1>
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
        <form action="{{route('roles.update', $role->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="input-group input-group-static mb-4 mt-3">
                <label class="font-form">Tên</label>
                <input name="name" type="text" value="{{old('name') ?? $role->name}}" class="form-control"/>
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="input-group input-group-static mb-4">
                <label class="font-form">Tên hiển thị</label>
                <input name="display_name" type="text" value="{{old('display_name') ?? $role->display_name}}" class="form-control"/>
                @error('display_name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="input-group input-group-static mb-4">
                <label class="ms-0 font-form">Nhóm</label>
                <select name="group" class="form-control" value="{{$role->group}}">
                    <option value="system">Hệ thống</option>
                    <option value="user">Người dùng</option>
                </select>
                @error('group')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="" class="font-form">Cấp quyền</label>
                {{-- <div class="row">
                    @foreach($permissions as $groupName => $permission)
                    <div class="col-5">
                        <h4>{{$groupName}}</h4>
                        <div>
                            @foreach($permission as $item)
                            <div class="form-check">
                                <input class="form-check-input" name="permission_id[]" type="checkbox" value="{{$item->id}}"
                                {{$role->permissions->contains('name', $item->name) ? 'checked' :'' }}
                                >
                                <label class="custom-control-label" for="customCheck1">{{$item->display_name}}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div> --}}
                <div class="row">
                    @foreach($permissions as $groupName => $permission)
                        <div class="col-4">
                            <h4 class="font-form-permission">{{$groupName}}</h4>
                            <div>
                                @foreach($permission as $item)
                                    <div class="form-check">
                                        <input class="form-check-input" name="permission_id[]" type="checkbox" value="{{$item->id}}"
                                            {{$role->permissions->contains('name', $item->name) ? 'checked' : '' }}
                                        >
                                        <label class="custom-control-label" for="customCheck1">{{$item->display_name}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-submit btn-primary">Cập nhật</button>
            </div>
            
        </form>
    </div>
</div>
@endsection