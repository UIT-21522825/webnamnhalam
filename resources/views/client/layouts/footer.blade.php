<div class="container-fluid bg-secondary-1 text-dark mt-5 pt-0">
    <div class="row px-xl-5">
        <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
            <img src="{{asset('admin/assets/img/logo.png')}}" class="w-50 h-70 ml-5" alt="main_logo">
            <a href="" class="text-decoration-none">
                {{-- <h5 class="m-0 display-5 font-weight-semi-bold ml-4">
                    <img src="{{asset('admin/assets/img/logo.png')}}" class="w-50 h-50" alt="main_logo">
                    Nấm nhà làm</h5> --}}
            </a>

            <p class="mb-2"><i class="fa fa-map-marker-alt icon-primary mr-3 ml-5"></i>Ho Chi Minh</p>
            <p class="mb-2"><i class="fa fa-envelope icon-primary mr-3 ml-5"></i>namnhalam@gmail.com</p>
            <p class="mb-0"><i class="fa fa-phone-alt icon-primary mr-3 ml-5"></i>+123456789</p>
        </div>
        <div class="col-lg-8 col-md-12 pt-4">
            <div class="row">
                <div class="col-md-4 mb-5 ">
                    <h5 class="font-weight-bold text-dark mb-3">Danh mục</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-dark mb-2" href="{{ route('client.home') }}"><i
                                class="fa fa-angle-right mr-2"></i>Trang chủ</a>

                        <a class="text-dark mb-2" href="{{route('client.carts.index')}}"><i
                                class="fa fa-angle-right mr-2"></i>Giỏ hàng</a>
                        <a class="text-dark mb-2" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Giới thiệu</a>
                        <a class="text-dark mb-2" href="{{ route('client.home') }}"><i
                                class="fa fa-angle-right mr-2"></i>Tuyển dụng</a>
                    </div>
                </div>
                <div class="col-md-4 mb-5 ">
                    <h5 class="font-weight-bold text-dark mb-3">Dịch vụ</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-dark mb-2" href="{{ route('client.home') }}"><i
                                class="fa fa-angle-right mr-2"></i>Giới thiệu</a>
                        <a class="text-dark mb-2" href="{{ route('client.home') }}"><i
                                class="fa fa-angle-right mr-2"></i>Liên hệ</a>
                        <a class="text-dark mb-2" href="{{route('client.carts.index')}}"><i
                                class="fa fa-angle-right mr-2"></i>FAQ’s</a>
                    </div>
                </div>
                <div class="col-md-4 mb-5 ">
                    <h5 class="font-weight-bold text-dark mb-3">Chính sách & Quy định</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-dark mb-2" href="{{ route('client.home') }}"><i
                                class="fa fa-angle-right mr-2"></i>Chính sách thanh toán</a>

                        <a class="text-dark mb-2" href="{{route('client.carts.index')}}"><i
                                class="fa fa-angle-right mr-2"></i>Chính sách đổi trả</a>
                        <a class="text-dark mb-2" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Giới thiệu</a>
                        <a class="text-dark mb-2" href="{{ route('client.home') }}"><i
                                class="fa fa-angle-right mr-2"></i>Nội quy cửa hàng</a>
                    </div>
                </div>

                {{-- <div class="col-md-4 mb-5">
                    <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                    <form action="">
                        <div class="form-group">
                            <input type="text" class="form-control border-0 py-4" placeholder="Your Name"
                                required="required" />
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                                required="required" />
                        </div>
                        <div>
                            <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe
                                Now</button>
                        </div>
                    </form>
                </div> --}}
            </div>
        </div>
        
        
    </div>
    <div class="row border-top border-light mx-xl-5 py-4">
        <div class="col-md-6 px-xl-0">
            <p class="mb-md-0 text-center text-md-left text-dark">
                &copy; <a class="text-dark font-weight-semi-bold" href="#">Nấm nhà làm</a>. Đã đăng ký bản quyền.
            </p>
        </div>
        <div class="col-md-6 px-xl-0 text-center text-md-right">
            <img class="img-fluid" src="{{ asset('client/img/payments.png') }}" alt="">
        </div>
    </div>
</div>
