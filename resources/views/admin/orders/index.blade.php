@extends('admin.layouts.app')
  @section('title', 'orders')
  @section('content')
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-0">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-8 text-dark" href="{{route('dashboard')}}">Hệ thống quản lý</a>
                </li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Đơn hàng</li>
            </ol>
            <h1 class="font-weight-bolder mb-0 title-font title-categories">Đơn hàng</h1>
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

          {{-- <h1>
              Orders
          </h1> --}}
          <div class="container-fluid pt-2">
              <div class="col card">
                  <div>
                      <table class="table table-hover">
                          <tr>
                              <th>#</th>
                              <th>Trạng thái</th>
                              <th>Tổng tiền</th>
                              <th>Phí vận chuyển</th>
                              <th>Khách hàng</th>
                              <th>Số điện thoại</th>
                              <th>Địa chỉ</th>
                              <th>Ghi chú</th>
                              <th>Thanh toán</th>
                          </tr>

                          @foreach ($orders as $item)
                              <tr>
                                  <td>{{ $item->id }}</td>
                                  <td>

                                      <div class="input-group input-group-static mb-4">
                                          <select name="status" class="form-control select-status"
                                              data-action="{{ route('admin.orders.update_status', $item->id) }}">
                                              @foreach (config('order.status') as $status)
                                                  <option value="{{ $status }}"
                                                      {{ $status == $item->status ? 'selected' : '' }}>{{ $status }}
                                                  </option>
                                              @endforeach
                                          </select>

                                  </td>
                                  <td>{{ $item->total }} VNĐ</td>

                                  <td>{{ $item->ship }} VNĐ</td>
                                  <td>{{ $item->customer_name }}</td>
                                  <td>{{ $item->customer_phone }}</td>

                                  <td>{{ $item->customer_address }}</td>
                                  <td>{{ $item->note }}</td>
                                  <td>{{ $item->payment }}</td>

                              </tr>
                          @endforeach
                      </table>
                      {{ $orders->links() }}
                  </div>
              </div>

          </div>
      </div>
  @endsection
  @section('script')
      <script src="{{ asset('admin/assets/order/order.js') }}"></script>
  @endsection
