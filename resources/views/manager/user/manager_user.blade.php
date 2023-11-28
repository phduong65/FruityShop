@extends('layouts.manager')
@section('manager_user')
    {{-- Content --}}
    <div class="manager_content">
        <div class="manager_content-product">
            <div class="textbox">
                <h2>Manager User</h2>
                <a href="{{ route('users.create') }}" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i>
                </a>
            </div>
            <div class="table-tong">
                <table id="table_user-manage">
                    <thead>
                        <tr>
                            <td class="mw50 hm30">Id</td>
                            <td class="mw50 hm30">Avatar</td>
                            <td class="hm30">Name</td>
                            <td class="hm30">Email</td>
                            <td class="hm30">Introduce</td>
                            <td class="mw120">Birth</td>
                            <td class="hm30">Phone</td>
                            <td class="hm30">Address</td>
                            <td class="mw50">Status</td>
                            <td class="mw120">Disabled</td>
                            <td class="">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr id="listUser{{ $user->id }}">
                                <td class="mw50 hm30">{{ $user->id }}</td>
                                <td class="mw50 hm30">
                                    <div class="user-image-td">
                                        <img src="{{ URL::asset('img') }}/{{ $user->userProfile->avatar }}" alt="">
                                        @if ($user->userProfile->status)
                                            <div class="status-dot active"></div>
                                        @endif
                                    </div>
                                </td>
                                <td class="mw50 hm30">{{ $user->name }}</td>
                                <td class="hm30">{{ $user->email }}</td>
                                <td class="mw400 hm30">{{ $user->userProfile->introduce }}</td>
                                <td class="mw120 hm30">{{ $user->userProfile->birth }}</td>
                                <td class="hm30">{{ $user->userProfile->phone }}</td>
                                <td class="hm30">{{ $user->userProfile->address }}</td>
                                <td class="mw50 hm30">{{ $user->userProfile->status ? 'Online' : 'Offline' }}
                                    {{ $user->offlineDuration }}
                                </td>
                                <td>
                                    @if ($user->userProfile->is_disabled)
                                    <a href="{{ route('users.unDisable', $user) }}" class="btn btn-secondary">Mở khóa</a>
                                    @else
                                        <a href="{{ route('users.disable', $user) }}" class="btn btn-danger">Vô hiệu
                                            hóa</a>
                                    @endif
                                </td>
                                <td class="item">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <button class="btn btn-danger" onclick="confirmDelete({{ $user->id }})">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
@section('kien-js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- ------------------ Thông báo thành công ! ------------------------------ --}}
    @if ($success = Session::get('success'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{{ $success }}',
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    @endif



    {{-- -----------------------Thông báo thêm và set mật khẩu (Không tự động tắt) ---- --}}
    @if ($success = Session::get('successAdd'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{{ $success }}',
            })
        </script>
    @endif

    {{-- -----------------------Thông báo lỗi ---- --}}
    @if ($success = Session::get('error'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: '{{ $success }}',
            })
        </script>
    @endif


    {{-- -------------Ajax xóa item =------------- --}}
    <script>
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
                        url: "/users/" + id,
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
