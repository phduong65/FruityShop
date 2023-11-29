@extends('components.layout')
@push('style')
    <link rel="stylesheet" href="{{ URL::asset('css') }}/checkout.css">
@endpush
@section('content')
    <section class="checkout_page">
        <div class="breadcrumb_bg">
            <div class="breadcrumb-box-img">
                <img src="{{ URL::asset('images') }}/z4860420479445_5258af88f3a046fbc61e7730df28ebd1.jpg" alt="">
            </div>
            <div class="title-full_checkout">
                <div class="container">
                    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
                    <p class="title-page_checkout">Thanh toán đơn hàng</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row checkout_row">
                <div class="checkout_page_left col-md-7">
                    <div class="title_checkout">
                        <p>Thông tin thanh toán</p>
                    </div>
                    @if (Auth::check())
                    @else
                        <div class="check_login">
                            Bạn đã có tài khoản ? <span class="highlight">
                                <a href="{{ 'login' }}">Đăng nhập</a>
                            </span>
                        </div>
                    @endif
                    <form action="{{ route('orders.store') }}" method="GET" class="frm_checkout row g-4">
                        @csrf
                        <div class="col-md-12">
                            <label for="inputName" class="form-label">Họ và Tên</label>
                            <input type="text" class="form-control" id="inputName" name="name"
                                pattern="^[a-zA-ZÀ-Ỹà-ỹẠ-Ỵạ-ỵĂ-Ắă-ắÂ-Ấâ-ấĐđÈ-Ỹè-ỹẸ-Ỵẹ-ỵÊ-Ếê-ếÌ-Ỷì-ỷỊ-Ỵị-ỵÒ-Ỹò-ỹỌ-Ỵọ-ỵÔ-Ốô-ốƠ-Ớơ-ớÙ-Ỷù-ỷỤ-Ỵụ-ỵƯ-ỨưỨỪ-ỰứựỦủỨ-Ỵứ-ỵ ]+$"
                                required>
                        </div>
                        <div class="col-md-8">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail" name="email" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputPhone" class="form-label">Điện thoại</label>
                            <input type="tel" class="form-control" id="inputPhone" name="phone" pattern="[0-9]{10}"
                                required>
                        </div>

                        <div class="col-md-4">
                            <label for="inputCountry" class="form-label">Tỉnh / Thành</label>
                            <select id="inputCountry" class="form-select" name="inputCountry">
                                <option selected>Choose...</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="inputQuan" class="form-label">Quận / Huyện</label>
                            <select id="inputQuan" class="form-select" name="inputQuan">
                                <option selected>Choose...</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="inputHuyen" class="form-label">Phường / Xã</label>
                            <select id="inputHuyen" class="form-select" name="inputHuyen">
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Tên Đường, số nhà"
                                name="address" required>
                        </div>
                        <div class="col-12">
                            <label for="floatingTextarea2" class="form-label">Ghi chú</label>
                            <textarea class="form-control" placeholder="" name="note" required id="floatingTextarea2" style="height: 100px"></textarea>
                        </div>
                        <div class="col-12">
                            <div class="radiobtn d-flex align-items-start flex-column">
                                <div class="payment py-3">
                                    <input type="radio" name="pay" id="pay_1" class="ip_check">
                                    <label for="pay_1">
                                        <span>Giao Hàng tận nơi</span>
                                    </label>
                                </div>
                                <div class="payment py-3">
                                    <input type="radio" name="pay" id="pay_2" class="ip_check">
                                    <label for="pay_2">
                                        <span>Thanh toán khi giao hàng (COD)</span>
                                    </label>
                                </div>
                                <div class="payment py-3">
                                    <input type="radio" name="pay" id="pay_3" class="ip_check">
                                    <label for="pay_3">
                                        <span>Chuyển khoản qua ngân hàng</span>
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <div class="back_to_shopping">
                                <a href="">
                                    <span>Quay lại Trang Chủ</span>
                                </a>
                            </div>
                            <button type="submit" class="btn btn-primary" id="btnordersave"
                                onclick="validateForm()">Hoàn tất đơn hàng</button>
                        </div>
                    </form>
                </div>
                <div class="checkout_page_right col-md-5">
                    <div class="title-infor py-3">
                        Thông tin giỏ hàng
                    </div>
                    <div class="infor_product">
                        @foreach ($cartItems as $item)
                            <div class="product_item">
                                <div class="product_left">
                                    <div class="product_left_img">
                                        <img src="{{ URL::asset('uploads/photobig') }}/{{ $item->product_image }} "
                                            alt="" srcset="">
                                    </div>
                                    <div class="product_left_name">
                                        <span class="name">
                                            {{ $item->name }}
                                            <span class="quantity">X {{ $item->quantity }}</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="product_price">
                                    {{ App\Http\Controllers\ProductController::asVND($item->product_price * $item->quantity) }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="tam_tinh">
                        <div class="tam_tinh_main">
                            <span class="title_tam_tinh">Tạm tính
                            </span>
                            <span class="price">{{ App\Http\Controllers\ProductController::asVND($total) }}</span>
                        </div>
                        @if (session()->get('discount_percentage'))
                        <div class="phi_van_chuyen">
                            <span class="title_van_chuyen">Giảm
                            </span>
                                
                            <span class="price">{{ App\Http\Controllers\ProductController::asVND((($total*session()->get('discount_percentage'))/100)) }}
                            </span>
                        </div>
                        @endif
                        @if ($success = Session::get('message'))
                            <div class="alert alert-success" role="alert">
                                {{ $success }}
                            </div>
                        @endif
                        <form action="{{ route('orders.applyVoucher') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="voucher_code" class="form-label">Mã Giảm Giá:</label>
                                <input type="text" class="form-control" id="voucher_code" name="voucher_code">
                            </div>
                            <button type="submit" class="btn btn-primary">Áp dụng</button>
                        </form>
                    </div>
                    <div class="tong_cong">
                        <span class="tong_cong_title">Tổng cộng
                        </span>
                        <span class="price">
                            @if (optional(session()->get('min_order_value') >= $total))
                            <span>VND</span> {{ App\Http\Controllers\ProductController::asVND($total-(($total*session()->get('discount_percentage'))/100)) }}
                            @else
                                
                            <span>VND</span> {{ App\Http\Controllers\ProductController::asVND($total) }}
                            @endif

                        </span>
                    </div>
                    <div class="voucher_has row">
                        <h2>Khuyến mãi dành cho bạn
                        </h2>
                        @foreach ($vouchers as $item)  
                        <div class="voucher_item col-md-12">
                            <div class="voucher_inner">
                                <div class="voucher_inner_left">
                                    <div class="vc_img">
                                        <div class="vc_box">
                                            <img src="{{ URL::asset('/images/fast-delivery.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="voucher_inner_right">
                                    <div class="vc_top">
                                        <h3>Miễn phí vận chuyển đơn hàng từ {{$item->min_order_value}}</h3>
                                        <p>Đơn hàng từ {{$item->min_order_value}}</p>
                                    </div>
                                    <div class="vc_bottom">
                                        <div class="vc_detail">
                                            <p>Mã:<strong>Giảm {{$item->discount_percentage}}</strong></p>
                                            <p>HSD:<strong>{{$item->expires_at}}</strong></p>
                                        </div>
                                        <div class="vc_btn">
                                            <button class="copyButton" data-voucher-value="{{$item->code}}">Sao chép mã</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
    </section>
@endsection

@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $html_name_country = '';
            $.ajax({
                url: "https://provinces.open-api.vn/api/?depth=3",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    data.forEach(element => {
                        $html_name_country +=
                            `<option class="html_name_country">${element.name}</option>`;
                    });
                    $('#inputCountry').append($html_name_country);
                    $('#inputCountry').change(function() {
                        let element = document.querySelector('#inputQuan');
                        while (element.firstChild) {
                            element.removeChild(element.firstChild);
                        }
                        $html_name_quan = '';
                        data.forEach(element => {
                            if ($('#inputCountry option:selected').val() == element
                                .name) {
                                element.districts.forEach(quan => {
                                    $html_name_quan +=
                                        `<option class="html_name_quan">${quan.name}</option>`;
                                });
                            }
                        });
                        $('#inputQuan').append($html_name_quan);
                    });
                    $('#inputQuan').change(function() {
                        let wards = document.querySelector('#inputHuyen');
                        console.log(wards);
                        while (wards.firstChild) {
                            wards.removeChild(wards.firstChild);
                        }
                        $html_name_huyen = '';

                        data.forEach(element => {
                            var districts = element.districts;
                            districts.forEach(dis_item => {
                                if ($('#inputQuan option:selected').val() ==
                                    dis_item.name) {
                                    dis_item.wards.forEach(wards_item => {
                                        $html_name_huyen +=
                                            `<option class="html_name_huyen">${wards_item.name}</option>`;
                                    });
                                }
                            });
                        });
                        $('#inputHuyen').append($html_name_huyen);
                    });
                },
                error: function(error) {
                    console.error(error);
                },
            });
        });

        function onclicksavOrder() {
            let btn = document.querySelector("#btnordersave");
            console.log(btn);
            btn.addEventListener('click', function() {
                btn.disable = true;
            })
        }
    </script>
    <script type="text/javascript">
     $(document).ready(function() {
        var lastValue="";
            // Sự kiện click của button
            $(".copyButton").click(function() {
                // Lấy giá trị của input và lưu vào biến
                 lastValue = $(this).data("voucher-value");
                 $(this).prop("disabled", true);
                 $(this).text('Đã sao chép');
            });

            // Sự kiện paste của input
            $("#voucher_code").on('paste', function() {
                // Lấy giá trị đã lưu từ thuộc tính data của button
                // Dán giá trị vào input
                $(this).val(lastValue);
            });
        });
    </script>
@endpush
