@extends('components.layout')
@push('style')
    <link
        href="http://fonts.googleapis.com/css?family=Open+Sans:300,700,800|Open+Sans+Condensed:300,700|Prata&subset=vietnamese"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('css') }}/home.css">
@endpush
@section('content')
<section class="product product_recently" style="background-color: #eaeaea">
    <h2 class="" style="text-align: center;font-weight: bold;text-transform: uppercase;font-size: 2rem;">
        sản phẩm đã xem gần đây
    </h2>
    <div class="container">
        <div class="recently_products row">
            @foreach ($viewedProducts as $viewedProduct)
                @php
                    // Tạo URL detail bằng cách kết hợp $encryption và $encodedProductId
                    $encryptionone = '493275427158023849218444922492048902';
                    $encryptiontwo = '94721074921748127486217101204231940921034921849280';
                    $urlDetail = $encryptionone . $encryptiontwo . $viewedProduct->product->id;
                @endphp
                <div class="col-md-3 col-xs-6">
                    <div class="product_item">
                        <form action="{{ route('cart.add') }}" method="POST" class="frm_addcart">
                            @csrf
                            <input type="hidden" name="id" value="{{ $viewedProduct->product->id }}">
                            <div class="product_item_img">
                                <a href="">
                                    <img src="{{ URL::asset('uploads/photobig') }}/{{ $viewedProduct->product->photo }}" alt="">
                                </a>
                                <div class="action_icon">
                                    <div class="ic_like"></div>
                                    <div class="ic_see"></div>
                                </div>
                            </div>
                            <div class="product_item_name">
                                <a href="{{ route('products.show', $urlDetail) }}">
                                    {{ $viewedProduct->product->name }}
                                </a>
                            </div>
                            <div class="product_item_price">
                                <div class="after_dis">
                                    {{ App\Http\Controllers\ProductController::asVND($viewedProduct->product->price * (1 - $viewedProduct->product->discount / 100)) }}
                                </div>
                                <div class="before_dis">
                                    {{ App\Http\Controllers\ProductController::asVND($viewedProduct->product->price) }}
                                </div>
                                <div class="dis">Giảm {{ $viewedProduct->product->discount }}%</div>
                            </div>
                            <button type="submit" class="btn_addquick">
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
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
