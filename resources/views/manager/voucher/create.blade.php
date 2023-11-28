@extends('layouts.manager')
@push('style')
    <link rel="stylesheet" href="{{ URL::asset('css') }}/voucher.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
@endpush
@section('manager_voucher')
<section class="manager_voucher px-5">
    <div class="create_voucher">
        <form class="row g-3 frm_create" action="{{ route('vouchers.store') }}" method="POST">
            {{ csrf_field() }}
                <h2>Thêm mã giảm giá</h2>
                <div class="col-md-8">  
                    <label for="code" class="form-label">Mã giảm giá</label>
                    <input type="text" class="form-control" id="code" name="code" pattern="^[a-zA-Z0-9_-]+$" required>
                    <label for="" class="badge bg-danger text-wrap my-2">NHẬP CHỮ IN HOA</label>
                </div>
                <div class="col-md-4">
                    <label for="discount_percentage" class="form-label">Discount</label>
                    <input type="number" class="form-control" id="discount_percentage" min="1" max="99" pattern="\d+" name="discount_percentage" required>
                </div>
                <div class="col-md-8">
                    <label for="is_active" class="form-label">Trạng thái</label>
                    <select class="form-select" id="is_active" name="is_active"  aria-label="Default select example">
                        <option value="0">Disabled</option>
                        <option value="1">Enabled</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="expires_at" class="form-label">Ngày hết hạn</label>
                    <input type="date" id="expires_at" name="expires_at" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label for="usage_limit" class="form-label">Số lần sử dụng:</label>
                    <input type="number" id="usage_limit" name="usage_limit" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label for="min_order_value	" class="form-label">Giá trị đơn hàng:</label>
                    <input type="number" id="min_order_value" name="min_order_value" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label for="quantity" class="form-label">Số lượng:</label>
                    <input type="number" id="quantity" name="quantity" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Thêm Voucher</button>
            </form>
        </div>
    </section>
@endsection
