@extends('components.layout')
@push('style')
    <link rel="stylesheet" href="{{ URL::asset('css') }}/home.css">
@endpush
@section('pageTitle', 'Trang chủ')
@section('content')
    <section class="banner_1">
        <div class="container">
            <div class="banner_1_content">
                <h4 class="content_top">
                    Dẫn đầu về chất lượng sản phẩm
                </h4>
                <h1 class="content_mid">
                    fresh fruit
                </h1>
                <h4 class="content_bottom">
                    Trái cây là lựa chọn tốt cho mỗi người
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
                <div class="col-md-3 col-xs-6">
                    <div class="product_item">
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
                        <div class="btn_addquick">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-basket2" viewBox="0 0 16 16">
                                <path
                                    d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0v-2z" />
                                <path
                                    d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6H2.163z" />
                            </svg>
                            <span>Thêm vào giỏ hàng</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="product_item">
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
                        <div class="btn_addquick">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-basket2" viewBox="0 0 16 16">
                                <path
                                    d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0v-2z" />
                                <path
                                    d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6H2.163z" />
                            </svg>
                            <span>Thêm vào giỏ hàng</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="product_item">
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
                        <div class="btn_addquick">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-basket2" viewBox="0 0 16 16">
                                <path
                                    d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0v-2z" />
                                <path
                                    d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6H2.163z" />
                            </svg>
                            <span>Thêm vào giỏ hàng</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="product_item">
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
                        <div class="btn_addquick">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-basket2" viewBox="0 0 16 16">
                                <path
                                    d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0v-2z" />
                                <path
                                    d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6H2.163z" />
                            </svg>
                            <span>Thêm vào giỏ hàng</span>
                        </div>
                    </div>
                </div>
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
                            Implement other healthy habits: in addition to applying a balanced diet, you can combine them
                            with
                            regular exercise, limit alcohol and tobacco to effectively improve your condition. health and
                            keep
                            the body flexible and supple. Living a balanced lifestyle and following the right nutrition is
                            not
                            easy. However, each person should start practicing the habit of protecting the body by
                            maintaining a
                            scientific diet, paying attention to eating a variety of foods; Store and process food properly
                            so
                            as not to lose nutrients.
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
                    <div class="selection_item action">
                        <a href="">
                            New Viral
                        </a>
                    </div>
                    <div class="selection_item">
                        <a href="">
                            New Viral
                        </a>
                    </div>
                    <div class="selection_item">
                        <a href="">
                            New Viral
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="product_item">
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
                        <div class="btn_addquick">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-basket2" viewBox="0 0 16 16">
                                <path
                                    d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0v-2z" />
                                <path
                                    d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6H2.163z" />
                            </svg>
                            <span>Thêm vào giỏ hàng</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="product_item">
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
                        <div class="btn_addquick">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-basket2" viewBox="0 0 16 16">
                                <path
                                    d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0v-2z" />
                                <path
                                    d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6H2.163z" />
                            </svg>
                            <span>Thêm vào giỏ hàng</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="product_item">
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
                        <div class="btn_addquick">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-basket2" viewBox="0 0 16 16">
                                <path
                                    d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0v-2z" />
                                <path
                                    d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6H2.163z" />
                            </svg>
                            <span>Thêm vào giỏ hàng</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="product_item">
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
                        <div class="btn_addquick">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-basket2" viewBox="0 0 16 16">
                                <path
                                    d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0v-2z" />
                                <path
                                    d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6H2.163z" />
                            </svg>
                            <span>Thêm vào giỏ hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="banner_3">
        <div class="content">
            <div class="title_heading">Nutrition And Health</div>
            <div class="sub_heading">Stock is limited. Order now to avoid
                disappointment.</div>
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
                <div class="news_item col-md-4">
                    <div class="news_img">
                        <a href="">
                            <img src="{{URL::asset('images')}}/news_1.jpg" alt="" srcset="">
                            <div class="date_news">
                                <div class="date_day">11</div>
                                <span></span>
                                <div class="date_month">June</div>
                            </div>
                        </a>
                    </div>
                    <div class="news_content">
                        <div class="tag_news">NEWS</div>
                        <div class="title_news_heading">
                            <a href="">
                                <h2>Fruit gives us energy</h2>
                            </a>
                        </div>
                        <span></span>
                        <div class="sub_news_heading">
                            <p class="sub_text">
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
                                ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla
                                consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget,
                                arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu
                                pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean
                                vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac,
                                enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.
                                Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam
                                ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.
                                Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet
                                adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id,
                                lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis
                                faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed
                                fringilla mauris sit amet nibh.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="news_item col-md-4">
                    <div class="news_img">
                        <img src="{{URL::asset('images')}}/news_1.jpg" alt="" srcset="">
                        <div class="date_news">
                            <div class="date_day">11</div>
                            <span></span>
                            <div class="date_month">June</div>
                        </div>
                    </div>
                    <div class="news_content">
                        <div class="tag_news">NEWS</div>
                        <div class="title_news_heading">
                            <h2>Fruit gives us energy</h2>
                        </div>
                        <span></span>
                        <div class="sub_news_heading">
                            <p class="sub_text">
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
                                ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla
                                consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget,
                                arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu
                                pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean
                                vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac,
                                enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.
                                Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam
                                ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.
                                Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet
                                adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id,
                                lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis
                                faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed
                                fringilla mauris sit amet nibh.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="news_item col-md-4">
                    <div class="news_img">
                        <img src="{{URL::asset('images')}}/news_1.jpg" alt="" srcset="">
                        <div class="date_news">
                            <div class="date_day">11</div>
                            <span></span>
                            <div class="date_month">June</div>
                        </div>
                    </div>
                    <div class="news_content">
                        <div class="tag_news">NEWS</div>
                        <div class="title_news_heading">
                            <h2>Fruit gives us energy</h2>
                        </div>
                        <span></span>
                        <div class="sub_news_heading">
                            <p class="sub_text">
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
                                ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla
                                consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget,
                                arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu
                                pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean
                                vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac,
                                enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.
                                Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam
                                ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.
                                Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet
                                adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id,
                                lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis
                                faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed
                                fringilla mauris sit amet nibh.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script src="{{ URL::asset('js') }}/search_home.js"></script>
@endpush