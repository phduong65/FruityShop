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
                            <a href="">Đăng nhập</a>
                        </span>
                    </div>
                    @endif
                    <form action="{{route('orders.store')}}" method="post" class="frm_checkout row g-4">
                        {{ csrf_field()}}
                        <div class="col-md-12">
                            <label for="inputName" class="form-label" >Họ và Tên</label>
                            <input type="text" class="form-control" id="inputName" name="name" required>
                        </div>
                        <div class="col-md-8">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail" name="email" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputPhone" class="form-label">Điện thoại</label>
                            <input type="number" class="form-control" id="inputPhone" name="phone" required>
                        </div>

                        <div class="col-md-4">
                            <label for="inputCountry" class="form-label">Tỉnh / Thành</label>
                            <select id="inputCountry" class="form-select">
                                <option selected>Choose...</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="inputQuan" class="form-label">Quận / Huyện</label>
                            <select id="inputQuan" class="form-select">
                                <option selected>Choose...</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="inputHuyen" class="form-label">Phường / Xã</label>
                            <select id="inputHuyen" class="form-select">
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Tên Đường, số nhà" name="address" required>
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
                            <button type="submit" class="btn btn-primary">Hoàn tất đơn hàng</button>
                        </div>
                    </form>
                </div>
                <div class="checkout_page_right col-md-5">
                    <div class="title-infor py-3">
                        Thông tin giỏ hàng
                    </div>
                    <div class="infor_product">
                        <div class="product_item">
                            <div class="product_left">
                                <div class="product_left_img">
                                    <img src="{{ URL::asset('images') }}\nho-xanh-sugar-crunch.png" alt=""
                                        srcset="">
                                </div>
                                <div class="product_left_name">
                                    <span class="name">
                                        Đào đỏ Mỹ
                                        <span class="quantity">x1</span>
                                    </span>
                                </div>
                            </div>
                            <div class="product_price">
                                31000
                            </div>
                        </div>
                        <div class="product_item">
                            <div class="product_left">
                                <div class="product_left_img">
                                    <img src="{{ URL::asset('images') }}\nho-xanh-sugar-crunch.png" alt=""
                                        srcset="">
                                </div>
                                <div class="product_left_name">
                                    <span class="name">
                                        Đào đỏ Mỹ
                                        <span class="quantity">x 1</span>
                                    </span>
                                </div>
                            </div>
                            <div class="product_price">
                                31000
                            </div>
                        </div>
                        <div class="product_item">
                            <div class="product_left">
                                <div class="product_left_img">
                                    <img src="{{ URL::asset('images') }}\nho-xanh-sugar-crunch.png" alt=""
                                        srcset="">
                                </div>
                                <div class="product_left_name">
                                    <span class="name">
                                        Đào đỏ Mỹ
                                        <span class="quantity">x 1</span>
                                    </span>
                                </div>
                            </div>
                            <div class="product_price">
                                31000
                            </div>
                        </div>
                        <div class="product_item">
                            <div class="product_left">
                                <div class="product_left_img">
                                    <img src="{{ URL::asset('images') }}\nho-xanh-sugar-crunch.png" alt=""
                                        srcset="">
                                </div>
                                <div class="product_left_name">
                                    <span class="name">
                                        Đào đỏ Mỹ
                                        <span class="quantity">x 1</span>
                                    </span>
                                </div>
                            </div>
                            <div class="product_price">
                                31000
                            </div>
                        </div>
                        <div class="product_item">
                            <div class="product_left">
                                <div class="product_left_img">
                                    <img src="{{ URL::asset('images') }}\nho-xanh-sugar-crunch.png" alt=""
                                        srcset="">
                                </div>
                                <div class="product_left_name">
                                    <span class="name">
                                        Đào đỏ Mỹ
                                        <span class="quantity">x 1</span>
                                    </span>
                                </div>
                            </div>
                            <div class="product_price">
                                31000
                            </div>
                        </div>
                        <div class="product_item">
                            <div class="product_left">
                                <div class="product_left_img">
                                    <img src="{{ URL::asset('images') }}\nho-xanh-sugar-crunch.png" alt=""
                                        srcset="">
                                </div>
                                <div class="product_left_name">
                                    <span class="name">
                                        Đào đỏ Mỹ
                                        <span class="quantity">x 1</span>
                                    </span>
                                </div>
                            </div>
                            <div class="product_price">
                                31000
                            </div>
                        </div>
                        <div class="product_item">
                            <div class="product_left">
                                <div class="product_left_img">
                                    <img src="{{ URL::asset('images') }}\nho-xanh-sugar-crunch.png" alt=""
                                        srcset="">
                                </div>
                                <div class="product_left_name">
                                    <span class="name">
                                        Đào đỏ Mỹ
                                        <span class="quantity">x 1</span>
                                    </span>
                                </div>
                            </div>
                            <div class="product_price">
                                31000
                            </div>
                        </div>
                    </div>
                    <div class="tam_tinh">
                        <div class="tam_tinh_main">
                            <span class="title_tam_tinh">Tạm tính
                            </span>
                            <span class="price">31000đ</span>
                        </div>
                        <div class="phi_van_chuyen">
                            <span class="title_van_chuyen">Phí vận chuyển
                            </span>
                            <span class="price">20,000 đ
                            </span>
                        </div>
                    </div>
                    <div class="tong_cong">
                        <span class="tong_cong_title">Tổng cộng
                        </span>
                        <span class="price">
                         <span>VND</span>   51000 đ 
                        </span>
                    </div>
                </div>
            </div>
    </section>
@endsection

@push('js')
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
    </script>
@endpush
