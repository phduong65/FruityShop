<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{{ $product->name }}</title>
    <meta name="title" content="" />
    <meta name="description" content="" />

    <!-- meta facebook -->
    <meta property="og:locale" content="vi" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:image" content="" />
    <link rel="stylesheet" href="{{ URL::asset('css') }}/tri.css">
    <link
        href="http://fonts.googleapis.com/css?family=Open+Sans:300,700,800|Open+Sans+Condensed:300,700|Prata&subset=vietnamese"
        rel="stylesheet" type="text/css" />
</head>

<!-- Mỗi body của mỗi page nên có class ví dụ homepage, aboutpage, contactpage... -->

<body class="homepage">
    <!-- MAIN -->

    <main class="main">
        <section class="bannerdetail">
            <div class="container">
                <h2 class="bannerdetail_name">
                    <marquee> {{ $product->name }}</marquee>
                </h2>
            </div>
        </section>
        <section class="productdetail">
            <div class="container">
                <div class="productdetail_content">
                    <div class="productdetail_content-image">
                        <div class="thumnailbig">
                            <img src="{{ asset('uploads/photobig/') }}/{{ $product->photo }}" alt=""
                                class="photo" />
                        </div>
                        <div class="thumnailmini">
                            @foreach (json_decode($product->thumnail, true) as $item)
                                <div class="pic">
                                    <img src="{{ asset('uploads/photomini/') }}/{{ $item }}" alt=""
                                        class="photo" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="productdetail_content-textbox">
                        <h3 class="name">{{ $product->name }}</h3>
                        <p class="status">Tình Trạng: {{ $product->quantity > 0 ? 'Còn Hàng' : 'Hết Hàng' }}</p>
                        @php
                            $discount = ($product->price * $product->discount) / 100;
                            $price = number_format($product->price);
                            $pricediscount = number_format($product->price - $discount);
                        @endphp
                        <p class="price">{{ $product->discount == 0 ? $price : $pricediscount }}đ

                            <span style="text-decoration:line-through;color:#999">
                                @php
                                    if ($product->discount > 0) {
                                        echo $price . 'đ';
                                    }
                                @endphp
                            </span>
                            {{-- {{ '-' . $product->discount . '%' }}; --}}
                        </p>
                        <p class="shortdesc">
                            Mô tả đang được cập nhật
                        </p>
                        <p class="notes">
                            <span>Lưu ý:</span> Số lượng của sản phẩm được tính bằng
                            kg(kilogram)
                        </p>
                        <div class="quality">
                            <span class="text">Số lượng:</span>
                            <div class="wrap">
                                <span class="mul">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M432 256c0 17.7-14.3 32-32 32L48 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l352 0c17.7 0 32 14.3 32 32z" />
                                    </svg>
                                </span>
                                <input type="number" min="1" max="100" value="1" name="quality"
                                    id="quality" />
                                <span class="plus">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <a href="http://localhost:3000/detail.html" target="_blank" rel="noopener noreferrer"
                            class="btn-add">Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="description">
            <div class="container">
                <div class="description_content">
                    <div class="description_content-banner">
                        <div class="wrap">
                            <h2 class="name">FRUITY SHOP</h2>
                            <p class="text">Thực phẩm an toàn 100%</p>
                        </div>
                    </div>
                    <div class="description_content-tabs">
                        <p class="tab active">Mô tả</p>
                        <p class="tab">Đánh giá(2)</p>
                    </div>
                    <div class="description_content-wrap">
                        <div class="box active">
                            <?php echo html_entity_decode($product->description); ?>
                        </div>
                        <div class="box">
                            <input type="text" placeholder="Nhập comment" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="productsame">
            <div class="container">
                <div class="productsame_content">
                    <h2 class="productsame_content-heading">Sản Phẩm Tương Tự</h2>
                    <div class="productsame_content-box">
                        @foreach ($relatedPosts as $item)
                            @php
                                // Tạo URL detail bằng cách kết hợp $encryption và $encodedProductId
                                $encryptionone = '493275427158023849218444922492048902';
                                $encryptiontwo = '94721074921748127486217101204231940921034921849280';
                                $urlDetail = $encryptionone . $encryptiontwo . $item->id;
                            @endphp
                            <div class="item">
                                <div class="thumnail">
                                    <img src="{{ asset('uploads/photobig/') }}/{{ $item->photo }}" alt=""
                                        class="photo" />
                                </div>
                                <div class="content">
                                    <a href="{{ route('products.show', $urlDetail) }}"
                                        class="name">{{ $item->name }}</a>
                                    <p class="price">{{ number_format($item->price) }}đ</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <script src="{{ URL::asset('js') }}/tri.js"></script>
        <script>
            const handleChangeQuality = () => {
                const multi = document.querySelector(".mul"),
                    plus = document.querySelector(".plus"),
                    quality = document.querySelector("#quality");
                multi.addEventListener("click", () => {
                    if (quality.value > 1) quality.value -= 1;
                });
                plus.addEventListener("click", () => {
                    if (quality.value < 100) {
                        quality.value = parseInt(quality.value) + 1;
                    }
                });
            };
            handleChangeQuality();
        </script>
    </main>
</body>

</html>
