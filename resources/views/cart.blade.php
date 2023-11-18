@extends('components.layout')
@push('style')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ URL::asset('css') }}/home.css">
    <link rel="stylesheet" href="{{ URL::asset('css') }}/cart.css">
@endpush
@section('pageTitle', 'Trang chủ')
@section('content')
    @if ($success = Session::get('success'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{{ $success }}',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
    <div class="content">
        <div class="cart-container">
            <img src="{{ URL::asset('images') }}/pile-fresh-fruits.jpg" alt="">
        </div>
        <div class="row">
            <div class="cart-sp col-md-12" id="cartContainer" style="padding-top: 5px">
                <div class="cart-item row" style="text-align: center">
                    <div class="item-image col-md-2" style="text-align: center">
                        {{ __('Tên') }}
                    </div>
                    <div class="item-name col-md-3" style="border-right: 1px solid #cccccc;">
                    </div>
                    <div class="item-details col-md-2"style="border-right: 1px solid #cccccc;">
                        {{ __('Giá:') }}
                    </div>
                    <div class="item-quantity col-md-2"style="border-right: 1px solid #cccccc;">
                        {{ __('Số Lượng:') }}
                    </div>
                    <div class="item-total col-md-2" style="border-right: 1px solid #cccccc;">
                        {{ __('Thành Tiền:') }}
                    </div>
                    <div class="item-close col-md-1">
                    </div>
                </div>
                @if (isset($cartItems) && count($cartItems) > 0)
                    @foreach ($cartItems as $cartItem)
                        <div class="cart-item row" id="cartItem_{{ $cartItem->id }}" style="text-align: center">
                            <div class="item-image col-md-2">
                                <img src="{{ URL::asset('uploads/photobig') }}/{{ $cartItem->product_image }}" alt=""
                                    height="100px" width="100px">
                            </div>
                            <div class="item-name col-md-3" style="border-right: 1px solid #cccccc;">
                                <h3>{{ $cartItem->product_name }}</h3>
                                {{-- <h3>{{ $cartItem->product_id }}</h3> --}}
                            </div>
                            <div class="item-details col-md-2" style="border-right: 1px solid #cccccc;">
                                <p>{{ App\Http\Controllers\ProductController::asVND($cartItem->product_price) }}</p>
                            </div>
                            <div class="item-quantity col-md-2"style="border-right: 1px solid #cccccc;">
                                <p> {{ $cartItem->quantity }}</p>
                                <!-- Thêm các điều chỉnh số lượng ở đây nếu cần -->
                            </div>
                            <div class="item-total col-md-2" style="border-right: 1px solid #cccccc">
                                <p>{{ App\Http\Controllers\ProductController::asVND($cartItem->product_price * $cartItem->quantity) }}
                                </p>
                            </div>
                            <div class="item-close col-md-1">
                                <i class="fa-solid fa-trash close" data-product-id="{{ $cartItem->product_id }}"></i>
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
                    <h1 class="col-md-6">{{ __('Tổng:') }} </h1>
                    <span class="col-md-6" id="totalValue">
                        @php
                            $totalValue = 0;
                            foreach ($cartItems as $cartItem) {
                                $totalValue += $cartItem->product_price * $cartItem->quantity;
                            }
                            echo App\Http\Controllers\ProductController::asVND($totalValue);
                        @endphp
                    </span>
                </div>
                <div class="pay">
                    <a href="{{ route('orders.index') }}">{{ __('Thanh Toán') }}</a>
                </div>
            </div>
            <div class="col-md-12 cart-sps" style="padding-top: 10px">
                <a href="">{{ __('Mua Thêm') }}</a>
            </div>
        </div>
    </div>
@endsection
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.all.min.js"></script> --}}
@push('js')
    <script src="{{ URL::asset('js') }}/search_home.js"></script>
@endpush
