@extends('components.layout')
@section('content')
    <link rel="stylesheet" href="{{ URL::asset('css') }}/kien_manager.css">
    <h1 style="text-align: center">Sản phẩm đã thích</h1>
    <div style="display: flex;justify-content: center;height: 300px;" class="table-tong">
        <table style="overflow-y: auto" id="table_user-manage">
            <thead>
                <tr>
                    <td style="width:100px" class="mw50 hm30">Photo</td>
                    <td style="width:600px">Name</td>
                    <td style="width:100px">Price</td>
                    <td style="width:100px">Remove</td>
                </tr>
            </thead>
            <tbody id="wishlist-container">
                @forelse ($wishlists as $wishlist)
                    @php
                        // Tạo URL detail bằng cách kết hợp $encryption và $encodedProductId
                        $encryptionone = '493275427158023849218444922492048902';
                        $encryptiontwo = '94721074921748127486217101204231940921034921849280';
                        $urlDetail = $encryptionone . $encryptiontwo . $wishlist->product->id;
                    @endphp
                    <tr id="listUser{{ $wishlist->id }}">
                        <td class="mw50 hm30">
                            <div class="user-image-td">
                                <img src="{{ URL::asset('uploads/photobig') }}/{{ $wishlist->product->photo }}"
                                    alt="">
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('products.show', $urlDetail) }}"> {{ $wishlist->product->name }}</a>
                        </td>
                        <td>{{ $wishlist->product->price }}</td>
                        <td style="text-align: center" class="item">
                            <button class="btn btn-danger" onclick="confirmDelete({{ $wishlist->id }})">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" style="text-align: center;">Chưa có sản phẩm</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
    <div style="display: flex;justify-content: center">{{ $wishlists->links() }}</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // {{-- -------------Ajax xóa item =------------- --}}
        function confirmDelete(id) {
            Swal.fire({
                title: 'Bạn có chắc muốn xóa không ?',
                text: 'Hành động này không thể hoàn tác!',
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "/wishlists/" + id,
                        type: "DELETE",
                        data: {
                            ids: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            $('#listUser' + id).remove();
                            // Hiển thị thông báo xóa thành công
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Delete successfully',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        },
                    });
                }
            });
        }
    </script>
@endsection
