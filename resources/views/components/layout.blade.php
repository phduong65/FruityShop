<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('pageTitle')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,500&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css') }}/layout.css">
    <link rel="stylesheet" href="{{ URL::asset('css') }}/_reset.css">
    <link rel="stylesheet" href="{{ URL::asset('css') }}/cart.css">
    <link rel="stylesheet" href="{{ URL::asset('css') }}/home.css">

    @stack('style')
</head>

<body>
    <div class="search_bar">
        <div class="search_bar_top">
            Tìm Kiếm
        </div>
        <div class="search_hidden">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg"
                viewBox="0 0 16 16">
                <path
                    d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
            </svg>
        </div>
        @csrf
        <form action="" method="GET" class="frm_search">
            <input type="text" placeholder="Tìm kiếm tên sản phẩm..." class="search-input" name="keyword">
            <button type="submit" class="ic_search">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-search" viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
            </button>
        </form>
        <div class="result">
            <div class="result_search row">
                
            </div>
        </div>
    </div>
    <header class="header_page">
        <div class="header_page_top">
            <div class="container">
                <div class="navbar_link row">
                    <div class="logo_page col-md-3">
                        <a href="{{route('home')}}">
                            <div class="img_logo">
                                <img src="{{ URL::asset('images') }}/FRUITY.png" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="cate_list col-md-7">
                        <a href="" class="cate_item">Trang chủ</a>
                        <a href="" class="cate_item">Giới thiệu</a>
                        <a href="{{ route('products.index') }}" class="cate_item">Sản phẩm</a>
                        <a href="{{ route('cart') }}" class="cate_item">Giỏ hàng</a>
                        <a href="{{route('post')}}" class="cate_item">Bài Viết</a>
                        <a href="" class="cate_item">Liên hệ</a>
                    </div>
                    <div class="icon_link col-md-2">
                        <div class="search_ic">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.72 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </div>
                        <div class="user_ic">
                            <a href="{{ route('login') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd"
                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                            </a>
                        </div>
                        <div class="like_ic">
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                    <path
                                        d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                </svg>
                            </a>
                        </div>
                        <div class="cart-wrapper">
                            <div class="cart_ic">
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                                        <path
                                            d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="cart-overlay"></div>
                            <div class="cart-content">
                                <div class="row cart">
                                    <div class="cart-gh col-md-10">
                                        <h1>{{ __('Giỏ Hàng') }} </h1>
                                    </div>
                                    <div class="col-md-2 cart-icon" id="closeCartBtn">
                                        <i class="fa-solid fa-xmark"></i>
                                    </div>
                                </div>
                                <!-- Trong cart.blade.php -->
                                <div class="row">
                                    <div class="cart-sp col-md-12" id="cartContainer" style="padding-top: 5px">
                                        <div class="cart-items">
                                            @if (isset($cartItems) && count($cartItems) > 0)
                                                @foreach ($cartItems as $cartItem)
                                                    <div class="cart-item row" id="${cartItem.product_id}">
                                                        <div class="item-image col-md-3">
                                                            <img src="{{ URL::asset('upload/photobig/') }}/{{ $cartItem->image }}"
                                                                alt="" height="100px" width="100px">
                                                        </div>
                                                        <div class="item-name col-md-3">
                                                            <h3>{{ $cartItem['name'] }}</h3>
                                                        </div>
                                                        <div class="item-details col-md-3">
                                                            <p>{{ $cartItem['price'] }} đ</p>
                                                        </div>
                                                        <div class="item-quantity col-md-2">
                                                            <p>{{ $cartItem['quantity'] }}</p>
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
                                    </div>
                                    <div class="col-md-12 cart-sps">
                                        <div class="total row">
                                            {{-- <h1 class="col-md-6">{{ __('Tổng:') }}</h1>
                                            <span class="col-md-6" id="totalValue">
                                                @php
                                                    $totalValue = 0;
                                                    foreach ($cartItems as $cartItem) {
                                                        $totalValue += $cartItem->price * $cartItem->quantity;
                                                    }
                                                    echo $totalValue;
                                                @endphp
                                                đ</span> --}}
                                        </div>
                                        <div class="pay">
                                            <a href="" style="color: white;">{{ __('Thanh Toán') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @yield('content')
    <footer class="footer_layout">
        <div class="container">
            <div class="footer_layout_item row">
                <div class="col_item logo col-md-3 col-xs-6">
                    <div class="logo_item">
                        <a href=""><img src="{{ URL::asset('images') }}/FRUITY.png" alt=""
                                width="100%"></a>
                        <p>Địa chỉ: Số 1, Đại Cồ Việt, Hai Bà Trưng, Hà Nội</p>
                        <p>Email: CBshop@fashionstore.com</p>
                        <p>Điện thoại: +84 123 456 789</p>
                        <ul class="list_social">
                            <a href="" class="social_link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                                </svg>
                            </a>
                            <a href="" class="social_link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                                    <path
                                        d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                                </svg>
                            </a>
                            <a href="" class="social_link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                </svg>
                            </a>
                            <a href="" class="social_link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                    <path
                                        d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z" />
                                </svg>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="col_item col-md-3 col-xs-6">
                    <ul class="title_item">
                        <h2>Help & Information
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-caret-down" viewBox="0 0 16 16">
                                    <path
                                        d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z" />
                                </svg>
                            </span>
                        </h2>
                        <span class="line"></span>
                        <a href="">
                            <li class="item_link">Về chúng tôi</li>
                        </a>
                        <a href="">
                            <li class="item_link">Điều khoản và điều kiện</li>
                        </a>
                        <a href="">
                            <li class="item_link">Chính sách bảo mật</li>
                        </a>
                        <a href="">
                            <li class="item_link">Sản phẩm hoàn trả</li>
                        </a>

                    </ul>
                </div>
                <div class="col_item col-md-3 col-xs-6">
                    <ul class="title_item">
                        <h2>Help & Information
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-caret-down" viewBox="0 0 16 16">
                                    <path
                                        d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z" />
                                </svg>
                            </span>
                        </h2>
                        <span class="line"></span>
                        <a href="">
                            <li class="item_link">Về chúng tôi</li>
                        </a>
                        <a href="">
                            <li class="item_link">Điều khoản và điều kiện</li>
                        </a>
                        <a href="">
                            <li class="item_link">Chính sách bảo mật</li>
                        </a>
                        <a href="">
                            <li class="item_link">Sản phẩm hoàn trả</li>
                        </a>

                    </ul>
                </div>
                <div class="col_item col-md-3 col-xs-6">
                    <ul class="title_item">
                        <h2>Help & Information
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-caret-down" viewBox="0 0 16 16">
                                    <path
                                        d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z" />
                                </svg>
                            </span>
                        </h2>
                        <span class="line"></span>
                        <a href="">
                            <li class="item_link">Về chúng tôi</li>
                        </a>
                        <a href="">
                            <li class="item_link">Điều khoản và điều kiện</li>
                        </a>
                        <a href="">
                            <li class="item_link">Chính sách bảo mật</li>
                        </a>
                        <a href="">
                            <li class="item_link">Sản phẩm hoàn trả</li>
                        </a>

                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>
@stack('js')
<script>
    function displayChangeSearch() {
    $(".search_bar").hide();
    $(".search_ic").click(function () {
        $(".search_bar").show();
    });
    $(".search_hidden").click(function () {
        $(".search_bar").hide();
    });
    $(document).keyup(function (e) {
        if (e.keyCode == 27) {
            $(".search_bar").hide();
        }
    });
}
displayChangeSearch();
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('keyup', '.search-input', function() {
            var value = $(this).val();
            console.log(value);
            $.ajax({
                url: "{{ route('search') }}",
                type: 'GET',
                data: {
                    'keyword': value
                },
                // dataType: 'json',
                success: function(data) {
                    var products = data.list_search;
                    var output = '';
                    if (products.length > 0) {
                        for (let i = 0; i < products.length; i++) {
                            output += `<div class="col-md-6">
                        <div class="search_item">
                            <div class="img_item">
                                <img src="{{ URL::asset('uploads/photobig') }}/` + products[i]['photo'] + `"alt="">
                            </div>
                            <div class="title_item">
                                <div class="name">
                                    <a href="">` + products[i]['name'] + `</a>
                                </div>
                                <div class="price">
                                    <div class="after_price">$25.00 USD </div>
                                    <div class="before_price">$30.00 USD</div>
                                </div>
                            </div>
                        </div>
                    </div>`;
                        }
                    } else {
                        output = "<p>Khong tim thay ket qua</p>"
                    }
                    console.log(output);
                    $(".result_search").html(output);
                }

            });
        });
    });
</script>

<script src="{{ URL::asset('js') }}/search_home.js"></script>
<script src="{{ URL::asset('js') }}/cart.js"></script>
<script></script>
</html>
