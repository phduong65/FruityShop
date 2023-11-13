@extends('components.layout')
@push('style')
    <link rel="stylesheet" href="{{ URL::asset('css') }}/home.css">
    <link rel="stylesheet" href="{{ URL::asset('css') }}/cart.css">
@endpush
@section('pageTitle', 'Trang chủ')
@section('content')
    <div class="content">
        <div class="cart-container">
            <img src="{{ URL::asset('images') }}/pile-fresh-fruits.jpg" alt="">
        </div>
        <div class="row">
            <div class="cart-sp col-md-12" id="cartContainer" style="padding-top: 5px">
                @if (isset($cartItems) && count($cartItems) > 0)
                    @foreach ($cartItems as $cartItem)
                        <div class="cart-item row" id="${cartItem.product_id}">
                            <div class="item-image col-md-3">
                                <img src="{{ URL::asset('upload/photobig/') }}/{{ $cartItem['product_image'] }} " alt="" height="100px" width="100px">
                            </div>
                            <div class="item-name col-md-3">
                                <h3>{{ $cartItem['product_name'] }}</h3>
                                <h3>{{ $cartItem['product_id'] }}</h3>
                            </div>
                            <div class="item-details col-md-2">
                                <p>{{ __('Giá:') }} {{ $cartItem['product_price'] }} đ</p>
                            </div>
                            <div class="item-quantity col-md-2">
                                <p>{{ __('Số Lượng:') }} {{ $cartItem['quantity'] }}</p>
                                <div class="js-qty">
                                    <button type="button" class="qty_minus js-qty__adjust js-qty__adjust--minus icon-fallback-text" data-id="" data-qty="0">
                                      <span class="fa fa-minus"></span>
                                    </button>
                                    <input type="text" class="js-qty__num" value="1" min="1" data-id="" aria-label="quantity" pattern="[0-9]*" name="updates[]" id="updates_40033899872406">
                                    <button type="button" class="qty_plus js-qty__adjust js-qty__adjust--plus icon-fallback-text" data-id="" data-qty="11">
                                      <span class="fa fa-plus"></span>
                                    </button>
                                  </div>
                            </div>
                            <div class="item-total col-md-1" id="totalAmount">
                                {{ __('Thành Tiền:') }} {{$cartItem['product_price']}} * {{$cartItem['quantity']}}
                            </div>
                            <div class="item-close col-md-1">
                                <i class="fa-solid fa-xmark close" data-product-id="${cartItem.product_id}"></i>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="cart-nosp">
                        <h4>{{ __('Bạn chưa có sản phẩm nào trong giỏ hàng') }}</h4>
                        <br>
                        <button>Mua Thêm</button>
                    </div>
                @endif
            </div>
            <div class="col-md-12 cart-sps" style="padding-top: 10px">
                <div class="total row">
                    <h1 class="col-md-6">{{ __('Tổng:') }}</h1>
                    <h2 id="total" class="col-md-6"></h2>
                </div>
                <div class="pay">
                    <a href="">{{ __('Thanh Toán') }}</a>
                </div>
            </div>
            <div class="col-md-12 cart-sps" style="padding-top: 10px">
                <a href="">{{ __('Mua Thêm') }}</a>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ URL::asset('js') }}/search_home.js"></script>
@endpush
