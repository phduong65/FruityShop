@extends('components.layout')
@push('style')
    <link rel="stylesheet" href="{{ URL::asset('css') }}/home.css">
    <link rel="stylesheet" href="{{ URL::asset('css') }}/cart.css">
@endpush
@section('pageTitle', 'Trang chủ')
@section('content')
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
                    <div class="col-md-3 col-xs-6">
                        <div class="product_item">
                            <!-- Biểu mẫu để thêm vào giỏ hàng -->
                            <form action="{{ route('cart.add', ['productId' => $item->id]) }}" method="POST">
                                @csrf
                                <div class="product_item_img">
                                    <img src="{{ URL::asset('upload/photobig') }}/{{$item->photo}}" alt="">
                                    <div class="action_icon">
                                        <div class="ic_like"></div>
                                        <div class="ic_see"></div>
                                    </div>
                                </div>
                                <div class="product_item_name">
                                    <span>
                                        {{$item->name}}
                                    </span>
                                </div>
                                <div class="product_item_price">
                                    <div class="after_dis">{{App\Http\Controllers\ProductController::asVND($item->price * (1 - $item->discount / 100))}}</div>
                                    <div class="before_dis">{{App\Http\Controllers\ProductController::asVND($item->price)}}</div>
                                    <div class="dis">Giảm {{$item->discount}}%</div>
                                </div>
                                <!-- Nút "Thêm vào giỏ hàng" -->
                                <div class="btn_addquick">
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-basket2" viewBox="0 0 16 16">
                                            <path d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0v-2z" />
                                            <path
                                                d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6H2.163z" />
                                        </svg>
                                        Thêm vào giỏ hàng
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>                     
        </div>
    </section>
@endsection
@push('js')
    <script src="{{ URL::asset('js') }}/search_home.js"></script>
@endpush