@extends('components.layout')
@section('pageTitle', 'Danh Mục Bài Viết')
@include('post/linkcss')
@section('content')
    @php
        // tạo url detail
        $encryptionone = '123123jnjnbj1v3g12c3g123vgmnsadsf98f9sd8f09sd8f09sd8f0s';
        $encryptiontwo = '3i192u3j13bnj12b3b398191830183ksdmadmkfnajsnfas98f980a8';
    @endphp
    <section class="bannerdetail" style="">
        <div class="container">
            <h2 class="bannerdetail_name">
                <p id="titlecategorypost"> </p>
            </h2>
        </div>
    </section>
    <div class="container">
        <div class="categorypostlist">
        </div>
        <div id="btnloadmore">Xem Thêm</div>
    </div>
    <script src="{{ URL::asset('js') }}/tri2.js"></script>
@endsection
