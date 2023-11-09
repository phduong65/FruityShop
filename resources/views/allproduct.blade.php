@extends('components.layout')
@push('style')
    <link rel="stylesheet" href="{{ URL::asset('css') }}/dat.css">
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
        <div>
            <ul class="sapxep">
                <li id="title-sapxep">Sắp xếp theo</li>
                <li><a href="{{ route('products.index') }}">Mới nhất</a></li>
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
@endsection
@push('js')
    <script src="{{ URL::asset('js') }}/dat.js"></script>
@endpush
