@extends('components.layout')
@push('style')
    <link rel="stylesheet" href="{{ URL::asset('css') }}/tri.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link
        href="http://fonts.googleapis.com/css?family=Open+Sans:300,700,800|Open+Sans+Condensed:300,700|Prata&subset=vietnamese"
        rel="stylesheet" type="text/css" />
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
@endpush
@section('content')
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
                        <form action="{{ route('cart.add.detail') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
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
                                    <i class="fa-solid fa-minus"></i>
                                </span>
                                <input type="number" min="1" max="100" value="1" name="quality"
                                    id="quality" />
                                <span class="plus">
                                    <i class="fa-solid fa-plus"></i>
                                </span>
                                {{-- {{ '-' . $product->discount . '%' }}; --}}
                            </p>
                        </div>
                    </div>
                    <button type="submit" class="btn-add">
                        Thêm vào giỏ hàng
                    </button>
                </form>
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
                        <p class="tab">Đánh giá({{ $product->comment_count }})</p>
                    </div>
                    <div class="description_content-wrap">
                        <div class="box active">
                            <?php echo html_entity_decode($product->description); ?>
                        </div>
                        <div class="box comment">
                            <h2 class="title">Đánh giá bài viết</h2>
                            @if (Auth::user())
                                <p class="text">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <span> Viết đánh giá của bạn ở dưới</span>
                                </p>
                            @else
                                <p class="text">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <span> Chỉ những người dùng đăng nhập mới được đánh giá</span>
                                </p>
                            @endif
                            <div class="form-group">
                                @if (Auth::user())
                                    <div class="user_comment">
                                        <div class="avatar">
                                            <img src="https://images.unsplash.com/photo-1699727152109-b5b9592641ca?q=80&w=2889&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                                alt="" />
                                        </div>
                                        <div class="infor">
                                            <p class="name">{{ $infor->name }}</p>
                                            <p class="day">
                                                <i class="fa-solid fa-clock"></i>
                                                @php
                                                    $date = date('Y-m-d g:i a');

                                                @endphp
                                                <span>{{ $date }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <form action="{{ route('comments.store') }}" method="post" class="comment-form">
                                        @csrf
                                        <div class="form-floating">
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="user_id" value="{{ $infor->id }}">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" rows="7"
                                                style="height: inherit" name="content" required></textarea>
                                            <label for="floatingTextarea2">Comments</label>
                                        </div>
                                        <button class="btn btn-success custom">Đánh giá</button>
                                    </form>
                                @endif
                            </div>
                            <div class="list_comment">
                                @if ($product->comment_count > 0)
                                    @foreach ($product->comments as $comment)
                                        <div class="item">
                                            <div class="wrap">
                                                <div class="avatar">
                                                    <img src="https://images.unsplash.com/photo-1699727152109-b5b9592641ca?q=80&w=2889&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                                        alt="" />
                                                </div>
                                                <div class="infor">
                                                    <p class="name">{{ $comment->user->name }}</p>
                                                    <p class="day">
                                                        <i class="fa-solid fa-clock"></i>
                                                        <span>{{ $comment->created_at }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <p class="content">
                                                {{ $comment->content }}
                                            </p>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="no-comment">Bài viết chưa có đánh giá nào</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="productsame">
            <div class="container">
                <div class="productsame_content">
                    <h2 class="productsame_content-heading">Sản Phẩm Tương Tự</h2>
                    <div class="productsame_content-box"data-flickity='{ "cellAlign": "left", "contain": true,"freeScroll": true,
                    "wrapAround": true,"prevNextButtons": false,"pageDots": false, "autoPlay": 1500}'>
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
    </main>
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
        const handleTab = () => {
            const listTab = document.querySelectorAll(".description_content-tabs .tab"),
                listContent = document.querySelectorAll(
                    ".description_content-wrap .box"
                );
            listTab.forEach((e, i) => {
                e.addEventListener("click", () => {
                    listTab.forEach((ev) => {
                        ev.classList.remove("active");
                    });
                    e.classList.add("active");
                    listContent.forEach((ev) => {
                        ev.classList.remove("active");
                    });
                    listContent[i].classList.add("active");
                });
            });
        };
        handleTab();
    </script>
@endsection
