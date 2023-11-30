@extends('layouts.manager')
@push('style')
    <link rel="stylesheet" href="{{ URL::asset('css') }}/checkout.css">
@endpush
@section('manager_orders')
    @if (session()->has('message'))
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
                Quản lý đơn hàng
            </h2>

            <table>
                <thead class="heading">
                    <tr>
                        <td>Mã đơn hàng</td>
                        <td>Tên người đặt</td>
                        <td>Số Điện thoại</td>
                        <td>Email</td>
                        <td>Địa chỉ</td>
                        <td>Thời gian đặt hàng</td>
                        <td>Ghi chú</td>
                        <td>Trạng thái đơn hàng</td>
                        <td>Action</td>
                        <td>View</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($orders as $item)
                        <tr>
                            <td>{{ $item->id_orders }}</td>
                            <td>{{ $item->name_user }}</td>
                            <td>{{ $item->phone_user }}</td>
                            <td>{{ $item->email_user }}</td>
                            <td>{{ $item->address_user }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->note_user }}</td>
                            
                            @if ($item->status == 'Đã hủy đơn' || $item->status == 'Xác nhận đơn hàng')
                                <td>{{ $item->status }}</td>
                                <td>
                                    <form action="{{ route('orders.delete', $item->id) }}" method="POST" onsubmit="return questionDelete1(event)" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id_orders" value="{{ $item->id }}">
                                        <button type="submit" class="btn btn-danger"
                                            >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path
                                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            @else
                                <td>
                                    <form action="{{ url('orders/update') }}" method="POST">
                                        @csrf
                                        {{-- @method('PUT') --}}
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <label for="status"></label>
                                        <select id="status" name="selected-status">
                                            <option value="Đang xử lý">Đang xử lý</option>
                                            <option value="Xác nhận đơn hàng">Xác nhận đơn hàng</option>
                                            <option value="Đã hủy đơn">Đã hủy đơn</option>
                                        </select>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success">Cập nhật</button>
                                </td>
                                </form>
                            @endif
                            <td>
                                <form action="{{route('orders.view')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_orders" id="id_orders" value="{{$item->id_orders}}">
                                <button type="submit" class="btn btn-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-card-checklist" viewBox="0 0 16 16">
                                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                                        <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0M7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0"/>
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
