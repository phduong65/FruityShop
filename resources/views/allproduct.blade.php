@extends('components.layout')
@push('style')
    <link rel="stylesheet" href="{{ URL::asset('css') }}/dat.css">
    <link rel="stylesheet" href="{{ URL::asset('css') }}/tri.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
@endpush
@section('content')
    <div class="wrapper-before">
        <div class="box-bg-top box-bg-center page_detail">
            <div class="parallax box-bg-title"
                style="
          background: url(https://traicaykh.vn/uploads/source/anh-web-ngoc/cac-loai-trai-cay-nhap-khau.jpg);
          background-size: cover;
        ">
                <div class="container title">
                    <h1 class="header animated fadeInDown">Tất cả sản phẩm</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div style="display:flex;align-items: center;">
            <p id="title-sapxep">Sắp xếp theo</p>
            <ul class="sapxep">
                <li><a href="{{ route('allproducts.index') }}">Mới nhất</a></li>
                <li><a href="{{ route('products.sort', ['order' => 'outsand']) }}" data-filter="noibat">Nổi bật</a></li>
                <li value="new" id="sort-by-price-button"><a href="{{ route('products.sort', ['order' => 'desc']) }}">Giá
                        cao</a></li>
                <li value="old"><a href="{{ route('products.sort', ['order' => 'asc']) }}">Giá thấp</a></li>
            </ul>
        </div>
        <br>
        <div id="data-wrapper">
            <div class="row">
                @include('data')

            </div>
        </div>
    </div>


    <div class="row text-center" style="padding:20px;">
        <button class="btn btn-success load-more-data">Load More</button>
    </div>

    <div class="auto-load text-center" style="display: none;">
        <div class="d-flex justify-content-center">
            <div class="spinner-border" role="status">
                <span></span>
            </div>
        </div>
    </div>
    @foreach ($categoriesWithProducts as $category)
        <section class="productsame">
            <div class="container">
                <div class="productsame_content">
                    <h2 class="productsame_content-heading">Sản Phẩm {{ $category->name }}</h2>
                    <div class="productsame_content-box"data-flickity='{ "cellAlign": "left", "contain": true,"freeScroll": true,
                                "wrapAround": true,"prevNextButtons": false,"pageDots": false, "autoPlay": 1500}'>
                        @forelse ($category->products as $product)
                            @php
                                // Tạo URL detail bằng cách kết hợp $encryption và $encodedProductId
                                $encryptionone = '493275427158023849218444922492048902';
                                $encryptiontwo = '94721074921748127486217101204231940921034921849280';
                                $urlDetail = $encryptionone . $encryptiontwo . $product->id;
                            @endphp
                            <div class="item">
                                <div class="thumnail">
                                    <img src="{{ asset('uploads/photobig/') }}/{{ $product->photo }}" alt=""
                                        class="photo" />
                                </div>
                                <div class="content">
                                    <a href="{{ route('products.show', $urlDetail) }}"
                                        class="name">{{ $product->name }}</a>
                                    <p class="price">{{ number_format($product->price) }}đ</p>
                                </div>
                            </div>
                        @empty
                            <li>No products available</li>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
    @endforeach
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
@endsection
@push('js')

    <script src="{{ URL::asset('js') }}/dat.js"></script>
    <script src="{{ URL::asset('js') }}/tri.js"></script>
@endpush
