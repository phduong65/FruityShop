@extends('layouts.manager')
@section('title', 'Manager Category Product')
@section('manager_category_product')

    <div class="manager_content">
        <div class="manager_content-product">
            <div class="textbox">
                <h2>Manager Category Post</h2>
            </div>
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
            <form action="{{ url('/createPost') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên category post</label>
                    <input type="text" name="name" class="form-control" pattern="[a-zA-Z\p{L}\d ]{4,20}"
                        title="Vui lòng nhập khoảng 4 đến 20 ký tự, không nhập ký tự đặc biệt!">

                </div>
                <input type="submit" class="btn btn-primary my-3" name="submit" value="Add">

                <br>
            </form>

            <br>
            <table id="table_product-manage">
                <thead>
                    <tr>
                        <td>Id</td>

                        <td>Name</td>
                        <td>Action</td>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($categryPost as $item)
                        <tr>
                            <td>{{ $item->id }}</td>

                            <td>{{ $item->name }}</td>

                            <td>
                                <a class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $item->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </a>


                                <form action="{{ route('categoryPost.delete', $item->id) }}" method="POST"
                                    onsubmit="return questionDelete1(event)" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <!-- Button trigger modal -->
                        @include('manager.category_post.editcategorypost')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
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
