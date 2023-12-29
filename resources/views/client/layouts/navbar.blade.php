<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
                data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0">Danh mục</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0"
                id="navbar-vertical">
                <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">

                    @foreach ($categories as $item)
                        @if ($item->childrens->count() > 0)
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link" data-toggle="dropdown">{{ $item->name }} <i
                                        class="fa fa-angle-down float-right mt-1"></i></a>
                                <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">

                                    @foreach ($item->childrens as $childCategory)
                                        <a href="{{ route('client.products.index', ['category_id' => $childCategory->id]) }}"
                                            class="dropdown-item">{{ $childCategory->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <a href="{{ route('client.products.index', ['category_id' => $item->id]) }}"
                                class="dropdown-item">{{ $item->name }}</a>
                        @endif
                    @endforeach

                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                {{-- <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span
                            class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a> --}}
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{ route('client.home') }}" class="nav-item nav-link active">Trang chủ</a>


                        {{-- <a href="{{ route('client.orders.index') }}" class="nav-link">Order</a> --}}

                    </div>
                    <div class="navbar-nav ml-auto py-0">
                        @if (auth()->check())
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Đăng xuất') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="nav-item nav-link">Đăng nhập</a>
                            <a href="{{ route('register') }}" class="nav-item nav-link">Đăng ký</a>
                        @endif



                    </div>
                </div>
            </nav>
            <div id="header-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" style="height: 410px;">
                        <img class="img-fluid" src="{{ asset('client/img/banner1.png') }}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            {{-- <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First
                                    Order</h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">Fashionable Dress</h3>
                                <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="carousel-item" style="height: 410px;">
                        <img class="img-fluid" src="{{ asset('client/img/banner2.png') }}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            {{-- <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First
                                    Order</h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                                <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-prev-icon mb-n2"></span>
                    </div>
                </a>
                <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-next-icon mb-n2"></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
