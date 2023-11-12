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
                                <img src="{{ $cartItem['product_image'] }}" alt="">
                                {{-- <img src="{{ URL::asset('upload/photobig') }}/cam-cara-uc-khfruit.jpg" alt=""
                                    style="    height: 100px;
                                width: 100px;}"> --}}
                            </div>
                            <div class="item-name col-md-3">
                                <h3>{{ $cartItem['product_name'] }}</h3>
                            </div>
                            <div class="item-details col-md-2">
                                <p>{{ __('Giá:') }} {{ $cartItem['product_price'] }} đ</p>
                            </div>
                            <div class="item-quantity col-md-2">
                                <p>{{ __('Số Lượng:') }} {{ $cartItem['quantity'] }}</p>
                            </div>
                            <div class="item-total col-md-1">
                                <p>{{ __('Thành Tiền:') }} {{ $cartItem['quantity'] }}</p>
                            </div>
                            <div class="item-close col-md-1">
                                <i class="fa-solid fa-xmark" data-product-id="${cartItem.product_id}"></i>
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
