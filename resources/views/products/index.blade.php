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
    <section class="banner_1">
        <div class="container">
            <div class="banner_1_content">
                <h4 class="content_top">
                    {{$setting->title1 ?? 'Dẫn đầu về chất lượng sản phẩm'}} 
                </h4>
                <h1 class="content_mid">
                    {{$setting->title2 ?? 'FRESH FRUIT'}} 
                </h1>
                <h4 class="content_bottom">
                    {{$setting->title3 ?? 'Trái cây là lựa chọn tốt cho mỗi người'}} 
                </h4>
                <div class="btn_link">
                    <a href="">Mua ngay</a>
                    <a href="">Xem thêm</a>
                </div>
            </div>
            <div class="overlay"></div>

        </div>
    </section>
    <section class="service">
        <div class="container">
            <div class="service_list row">
                <div class="service_item col-md-3 col-xs-6">
                    <div class="ic_service">
                        <img src="{{ URL::asset('images') }}/support.png" alt="" srcset="">
                    </div>
                    <div class="title_service">24/7 FRIENDLY SUPPORT</div>
                    <div class="sub_service">
                        Our support team always ready for you<br> to 7 days a week
                    </div>
                </div>
                <div class="service_item col-md-3 col-xs-6">
                    <div class="ic_service">
                        <img src="{{ URL::asset('images') }}/support.png" alt="" srcset="">
                    </div>
                    <div class="title_service">24/7 FRIENDLY SUPPORT</div>
                    <div class="sub_service">
                        Our support team always ready for you<br> to 7 days a week
                    </div>
                </div>
                <div class="service_item col-md-3 col-xs-6">
                    <div class="ic_service">
                        <img src="{{ URL::asset('images') }}/support.png" alt="" srcset="">
                    </div>
                    <div class="title_service">24/7 FRIENDLY SUPPORT</div>
                    <div class="sub_service">
                        Our support team always ready for you<br> to 7 days a week
                    </div>
                </div>
                <div class="service_item col-md-3 col-xs-6">
                    <div class="ic_service">
                        <img src="{{ URL::asset('images') }}/support.png" alt="" srcset="">
                    </div>
                    <div class="title_service">24/7 FRIENDLY SUPPORT</div>
                    <div class="sub_service">
                        Our support team always ready for you<br> to 7 days a week
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product product_best_seller">
        <div class="container">
            <div class="text_content">
                <h2 class="title_heading">
                    Best Seller
                </h2>
                <span class="sub_heading">
                    Best Seller Product In Shop !
                </span>
            </div>
            <div class="row">
                @foreach ($products as $item)
                    @php
                        // Tạo URL detail bằng cách kết hợp $encryption và $encodedProductId
                        $encryptionone = '493275427158023849218444922492048902';
                        $encryptiontwo = '94721074921748127486217101204231940921034921849280';
                        $urlDetail = $encryptionone . $encryptiontwo . $item->id;
                    @endphp
                    <div class="col-md-3 col-xs-6">
                        <div class="product_item">
                            <form action="{{ route('cart.add') }}" method="POST" class="frm_addcart">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <div class="my-3 badge bg-danger view align-content-end">
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                  </svg>  --}}
                                  <span>Đã xem {{ $item->view }}</span>
                                </div>
                                <div class="product_item_img">
                                    <a href="">
                                        <img src="{{ URL::asset('uploads/photobig') }}/{{ $item->photo }}" alt="">
                                    </a>
                                    <div class="action_icon">
                                        <div class="ic_like"></div>
                                        <div class="ic_see"></div>
                                    </div>
                                </div>
                                <div class="product_item_name">
                                    <a href="{{ route('products.show', $urlDetail) }}">
                                        {{ $item->name }}
                                    </a>
                                    
                                </div>
                                <div class="product_item_price">
                                    <div class="after_dis">
                                        {{ App\Http\Controllers\ProductController::asVND($item->price * (1 - $item->discount / 100)) }}
                                    </div>
                                    <div class="before_dis">
                                        {{ App\Http\Controllers\ProductController::asVND($item->price) }}
                                    </div>
                                    <div class="dis">Giảm {{ $item->discount }}%</div>
                                </div>
                               
                                <button type="submit" class="btn_addquick">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-basket2" viewBox="0 0 16 16">
                                        <path
                                            d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0v-2z" />
                                        <path
                                            d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6H2.163z" />
                                    </svg>
                                    <span>Chọn mua</span>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <div class="banner_2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 content">
                    <div class="text_content">
                        <div class="title_heading">
                            Health & Nutrition
                        </div>
                        <div class="sub_heading">
                            {{$setting->description ??  'Thực hiện các thói quen lành mạnh khác: ngoài việc áp dụng chế độ ăn uống cân bằng, bạn có thể
                            kết hợp với tập thể dục thường xuyên, hạn chế rượu bia và thuốc lá để cải thiện tình trạng một
                            cách hiệu quả. khỏe và giữ cho cơ thể dẻo dai, dẻo dai. Sống một lối sống cân bằng và tuân theo
                            chế độ dinh dưỡng phù hợp không phải là điều dễ dàng. Tuy nhiên, mỗi người nên bắt đầu rèn luyện
                            thói quen bảo vệ cơ thể bằng cách duy trì chế độ ăn uống khoa học, chú ý ăn đa dạng các loại
                            thực phẩm; Bảo quản và chế biến thực phẩm đúng cách để không bị thất thoát chất dinh dưỡng' }}  
                        </div>
                        <div class="btn_shop_now">
                            <a href="">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 images_content">
                    <img src="{{ URL::asset('images') }}/banner_2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <section class="product product_filter">
        <div class="container">
            <div class="text_content">
                <h2 class="title_heading">
                    Best Seller
                </h2>
                <div class="selection_change">
                    <div class="selection_item">
                        <button class="condition-button" data-condition="latest">Sản phẩm mới nhất</button>
                    </div>
                    <div class="selection_item">
                        <button class="condition-button" data-condition="price_high">Giá tăng dần</button>
                    </div>
                    <div class="selection_item">
                        <button class="condition-button" data-condition="price_low">Giá giảm dần</button>
                    </div>
                </div>
            </div>
            <div class="row list_products_fill">
                <div class="col-md-3 col-xs-6">
                    <div class="product_item">
                        <form action="{{ route('cart.add', ['productId' => $item->id]) }}" method="POST">
                            @csrf
                            <div class="product_item_img">
                                <a href="">
                                    <img src="{{ URL::asset('images') }}/nho-xanh-sugar-crunch.png" alt="">
                                </a>
                                <div class="action_icon">
                                    <div class="ic_like"></div>
                                    <div class="ic_see"></div>
                                </div>
                            </div>
                            <div class="product_item_name">
                                <a href="">
                                    Nho xanh
                                </a>
                            </div>
                            <div class="product_item_price">
                                <div class="after_dis">85,000đ</div>
                                <div class="before_dis">60,000đ</div>
                                <div class="dis">Giảm 17%</div>
                            </div>
                            <div>
                                <button type="submit btn_addquick">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-basket2" viewBox="0 0 16 16">
                                        <path
                                            d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0v-2z" />
                                        <path
                                            d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6H2.163z" />
                                    </svg>
                                    <span>Thêm vào giỏ hàng</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="banner_3">
        <div class="content">
            <div class="title_heading">Dinh dưỡng và sức khỏe</div>
            <div class="sub_heading">Số lượng có hạn.Nhanh tay đặt hàng để không bỏ lỡ.</div>
        </div>
        <div class="overlay">

        </div>
    </div>
    <section class="news">
        <div class="news_heading">
            <h1>Bài Viết</h1>
        </div>
        <div class="container">
            <div class="list_news row">
                @foreach ($allPost as $item)
                    <div class="news_item col-md-3">
                        <div class="news_img" style="width:100%;">
                            <a href="">
                                <img src="{{ URL::asset('uploads/post') }}/{{ $item->photo }}" alt=""
                                    srcset="" style="width:100%;">
                                <div class="date_news">
                                    <div class="date_day">{{ $item->created_at->format('d') }}</div>
                                    <span></span>
                                    <div class="date_month">{{ $item->created_at->format('M') }}</div>
                                </div>
                            </a>
                        </div>
                        <div class="news_content" style="width:100%;">
                            <div class="tag_news">NEWS</div>
                            <div class="title_news_heading">
                                <a href="">
                                    <h2>{{ $item->title }}</h2>
                                </a>
                            </div>
                            <span></span>
                            <div class="sub_news_heading "style="width:100%;">
                                <?php
                                echo html_entity_decode($item->content);
                                ?>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script src="{{ URL::asset('js') }}/search_home.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.condition-button', function() {
                $('.selection_item').removeClass('action');
                var condition = $(this).data('condition');
                $(this).parent().addClass('action');
                console.log(condition);
                loadProducts(condition);
            });

            function loadProducts(condition) {
                $.ajax({
                    url: "{{ route('fillter') }}",
                    type: "GET",
                    data: {
                        'condition': condition
                    },
                    success: function(data) {
                        var products_fill = data.products_fill;
                        var output = '';
                        var encryptiontwo = '94721074921748127486217101204231940921034921849280';
                        var encryptionone = '493275427158023849218444922492048902';
                        if (products_fill.length > 0) {
                            for (let i = 0; i < products_fill.length; i++) {
                                var urlDetail = encryptionone + encryptiontwo + products_fill[i]['id'];
                                output += `
                        <div class="col-md-3 col-xs-6">
                    <div class="product_item">
                        <form action="{{ route('cart.add') }}" method="POST" class="frm_addcart">
                            @csrf
                        <input type="hidden" name="id" value="` + products_fill[i]['id'] + `">
                        <div class="product_item_img">
                            <a href="">
                                <img src="{{ URL::asset('uploads/photobig') }}/` + products_fill[i]['photo'] + `" alt="">
                            </a>
                            <div class="action_icon">
                                <div class="ic_like"></div>
                                <div class="ic_see"></div>
                            </div>
                        </div>
                        <div class="product_item_name">
                            <a href="{{ url('/products') }}/`+urlDetail+`">
                                ` + products_fill[i]['name'] + `
                            </a>    
                        </div>
                        <div class="product_item_price">
                            <div class="after_dis">` + products_fill[i]['dis_price'] + `</div>
                            <div class="before_dis">` + products_fill[i]['fm_price'] + `</div>
                            <div class="dis">Giảm ` + products_fill[i]['discount'] + `%</div>
                        </div>
                        <button type="submit" class="btn_addquick" data-product-id="` + products_fill[i]['id'] + ` ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-basket2" viewBox="0 0 16 16">
                                <path
                                    d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0v-2z" />
                                <path
                                    d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6H2.163z" />
                            </svg>
                            <span>Chọn mua</span>
                        </button>
                        </form>
                    </div>
                </div>`;

                            }
                        }
                        $(".list_products_fill").html(output);
                    }
                });
            }
        });
    </script>
@endpush
