@extends('components.layout')
@push('style')
    <link rel="stylesheet" href="{{ URL::asset('css') }}/checkout.css">
@endpush
@section('content')
<section class="manager_orders">
    <main class="orders_table" style="width: 100%;">
        <h2 class="title_page text-center">
            Quản lý đơn hàng {{$id_orders}}
        </h2>

        <table class="table  table-hover" style="width: 100%;">
            <thead >
                <tr>
                    <th scope="col" class="table-success fw-bold text-center">Tên Sản phẩm</th>
                    <th scope="col" class="table-success fw-bold text-center">Hình ảnh</th>
                    <th scope="col" class="table-success fw-bold text-center">Số lượng</th>
                    <th scope="col" class="table-success fw-bold text-center">Giá</th>
                    <th scope="col" class="table-success fw-bold text-center">Thành tiền</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($orders as $item)
                    <tr>
                        <td class="text-center">{{ $item->product->name}}</td>
                        <td class="text-center"><img src="{{ URL::asset('uploads/photobig') }}/{{ $item->product->photo}}" alt="" class="img-fluid" style="width: 60px; object-fit: contain;mix-blend-mode: multiply"></td>
                        <td class="text-center">{{ $item->quantity}}</td>
                        <td class="text-center">{{ $item->product->price}}</td>
                        <td class="text-center">{{ $item->product->price * $item->quantity}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</section>
@endsection
