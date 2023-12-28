@extends('client.layouts.app')
@section('title', 'Cart')
@section('content')
    <div class="container-fluid pt-5">
        <form class="row px-xl-5" method="POST" 
        action="{{ route('client.checkout.proccess') }}"
        >
            @csrf
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Thông tin đơn hàng</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Tên</label>
                            <input class="form-control" value="{{ old('customer_name') }}" name="customer_name"
                                type="text" placeholder="Nguyễn Văn A">
                            @error('customer_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror ()

                        </div>

                        <div class="col-md-6 form-group">
                            <label>Email</label>
                            <input class="form-control" name="customer_email" value="{{ old('customer_email') }}"
                                type="text" placeholder="example@email.com">
                            @error('customer_email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror ()
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Điện thoại</label>
                            <input class="form-control" name="customer_phone" value="{{ old('customer_phone') }}"
                                type="text" placeholder="+123 456 789">
                            @error('customer_phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror ()
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Địa chỉ</label>
                            <input class="form-control" name="customer_address" value="{{ old('customer_address') }}"
                                type="text" placeholder="123 HCM">
                            @error('customer_address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror ()
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Ghi chú</label>
                            <input class="form-control" value="{{ old('note') }}" name="note" type="text"
                                placeholder="">
                            @error('note')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror ()
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Hóa đơn</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">sản phẩm</h5>
                        @foreach ($cart->products as $item)
                            <div class="d-flex justify-content-between">
                                <p> {{ $item->product_quantity }} x {{ $item->product->name }}</p>
                                <p
                                    style="
                                                                                                                                                                                                                                                                                                                                                                {{ $item->product->sale ? 'text-decoration: line-through' : '' }};
                                                                                                                                                                                                                                                                                                                                                                                                                      ">
                                    {{ $item->product_quantity * $item->product->price }} VNĐ
                                </p>

                                @if ($item->product->sale)
                                    <p
                                        style="
                                                                                                                                                                                                                                                                                                                                                                                                                            ">
                                        {{ $item->product_quantity * $item->product->sale_price }} VNĐ
                                    </p>
                                @endif

                            </div>
                        @endforeach
                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Tổng tiền sản phẩm</h6>
                            <h6 class="font-weight-medium total-price" data-price="{{ $cart->total_price }}">
                                {{ $cart->total_price }} VNĐ</h6>

                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Phí vận chuyển</h6>
                            <h6 class="font-weight-medium shipping" data-price="20000">20000 VNĐ</h6>
                            <input type="hidden" value="20000" name="ship">

                        </div>
                        @if (session('discount_amount_price'))
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Giám giảm Coupon </h6>
                                <h6 class="font-weight-medium coupon-div"
                                    data-price="{{ session('discount_amount_price') }}">
                                    {{ session('discount_amount_price') }} VNĐ</h6>
                            </div>
                        @endif

                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Tổng tiền</h5>
                            <h5 class="font-weight-bold total-price-all"></h5>
                            <input type="hidden" id="total" value="" name="total">
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Thanh tóan</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" checked value="monney" name="payment">
                                <label class="custom-control-label">Tiền mặt</label>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Xác nhận</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $(function() {


            getTotalValue()

            function getTotalValue() {
                let total = $('.total-price').data('price')
                let couponPrice = $('.coupon-div')?.data('price') ?? 0;
                let shiping = $('.shipping').data('price')
                $('.total-price-all').text(`${total + shiping - couponPrice} VNĐ`)
                $('#total').val(total + shiping - couponPrice)
            }

            // $(document).on('click', '.btn-remove-product', function(e){
            //     let url = $(this).data('action')
            //     confirmDetete()
            //         .then(function(){
            //             $.post(url, res => {
            //                 let cart = res.cart;
            //                 let cartProductId = res.product_cart_id;
            //                 $('#productCountCart').text(cart.product_count)
            //                 $('.total-price').text(`$${cart.total_price}`).data('price', cart.product_count)
            //                 $(`#row-${cartProductId}`).remove();
            //                 getTotalValue();
            //             })
            //         })
            //         .catch(function(){

            //         })
            // })

        });
    </script>

@endsection
