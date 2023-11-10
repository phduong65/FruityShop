@extends('layouts.manager')
@section('title', 'Manage Product')
@section('manager_product')
    @if ($success = Session::get('success'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{{ $success }}',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
    <div class="manager_content">
        <div class="manager_content-product">
            <div class="textbox">
                <h2>Manager Product</h2>
                <a href="{{ route('products.create') }}" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i>
                </a>
            </div>
            <table id="table_product-manage">
                <thead>
                    <tr>
                        <td class="mw50">Id</td>
                        <td class="mw120">Photo</td>
                        <td>Name</td>
                        <td>Description</td>
                        <td class="mw120">Price</td>
                        <td class="mw50">Discount</td>
                        <td class="mw120">Quantity</td>
                        <td class="mw120">Status</td>
                        <td class="mw120">Outstand</td>
                        <td>Action</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $item)
                        @php
                            // Tạo URL detail bằng cách kết hợp $encryption và $encodedProductId
                            $encryptionone = '493275427158023849218444922492048902';
                            $encryptiontwo = '94721074921748127486217101204231940921034921849280';
                            $urlDetail = $encryptionone . $encryptiontwo . $item->id;
                        @endphp
                        <tr>
                            <td class="mw50">{{ $item->id }}</td>
                            <td class="mw120"><img src="{{ asset('uploads/photobig/' . $item->photo) }}" alt=""
                                    width="100px" style="object-fit: cover;max-height:100px;"></td>
                            <td><a href="{{ route('products.show', $urlDetail) }}">
                                    {{ $item->name }} </a>
                            </td>
                            <td class="mw400"><?php echo html_entity_decode($item->description); ?></td>
                            <td class="mw120">{{ number_format($item->price) }}đ</td>
                            <td class="mw50">{{ $item->discount }}%</td>
                            <td class="mw120">{{ number_format($item->quantity) }}kg</td>
                            <td class="mw120 status">
                                <p class="{{ $item->status }}"><span class="circle"></span><span>{{ $item->status }}</span>
                                </p>
                            </td>
                            <td class="mw120 outstand">
                                <p class="{{ $item->outstand }}"><span
                                        class="circle"></span><span>{{ $item->outstand }}</span></p>
                            </td>
                            <td class="item">
                                <a href="{{ route('products.edit', $item->id) }}" class="btn btn-warning">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('products.destroy', $item->id) }}" method="POST"
                                    onsubmit="return questionDelete(event)" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
