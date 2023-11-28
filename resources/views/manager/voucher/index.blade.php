@extends('layouts.manager')
@push('style')
    <link rel="stylesheet" href="{{ URL::asset('css') }}/checkout.css">
@endpush
@section('manager_voucher')
@if (session()->has('message'))
@dd(session()->has('message'));
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{{ session()->get('message') }}',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: '  {{ session('error') }}',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
    <section class="manager_orders">
        <div class="search">
            <label>
                <input type="text" placeholder="Search here">
                <ion-icon name="search-outline" role="img" class="md hydrated" aria-label="search outline"></ion-icon>
            </label>
        </div>
        <main class="orders_table">
            <h2 class="title_page">
                Quản lý mã giảm giá
                <a href="{{ route('vouchers.create') }}" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i>
                </a>
            </h2>

            <table>
                <thead class="heading">
                    <tr>
                        <td>STT</td>
                        <td>Mã giảm giá</td>
                        <td>Discount</td>
                        <td>Trạng thái</td>
                        <td>Thời gian hết hạn</td>
                        <td>Số lần sử dụng</td>
                        <td>Giá trị đơn hàng</td>
                        <td>Số Lượng</td>
                        <td>Action</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($vouchers as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->discount_percentage }}</td>
                            <td>{{ $item->is_active }}</td>
                            <td>{{ $item->expires_at }}</td>
                            <td>{{ $item->usage_limit }}</td>
                            <td>{{ $item->min_order_value }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>
                                <form action="{{route('vouchers.destroy',$item->id)}}" method="POST" onsubmit="return questionDelete1(event)" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path
                                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                            </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
    </section>
@endsection

@section('duong-js')
<script type="text/javascript">
console.log('DUONG DEP TRAI');
    const questionDelete1 = (event) => {
        event.preventDefault(); // Prevent the default form submission behavior
        Swal.fire({
            title: "Bạn có chắc muốn xóa không",
            text: "Are you sure you want to delete this item",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                // You can submit the form manually
                event.target.submit();
            }
        });
    };
</script>
@endsection
