@extends('components.layout')
@section('content')
    <link rel="stylesheet" href="{{ URL::asset('css') }}/kien_manager.css">
    <h1 style="text-align: center">Sản phẩm đã xem gần đây</h1>
    <div style="display: flex;justify-content: center;height: 300px" class="table-tong">
        <table id="table_user-manage">
            @if ($recentlyViewedProducts)
                <thead>
                    <tr>
                        <td style="width: 100px" class="mw50 hm30">Photo</td>
                        <td style="width: 600px" >Name</td>
                        <td style="width: 100px">Price</td>
                    </tr>
                </thead>
                <tbody>


                    @foreach ($recentlyViewedProducts as $product)
                        @php
                            // Tạo URL detail bằng cách kết hợp $encryption và $encodedProductId
                            $encryptionone = '493275427158023849218444922492048902';
                            $encryptiontwo = '94721074921748127486217101204231940921034921849280';
                            $urlDetail = $encryptionone . $encryptiontwo . $product->id;
                        @endphp
                        <tr id="listUser">
                            <td class="mw50 hm30">
                                <div class="user-image-td">
                                    <img src="{{ URL::asset('uploads/photobig') }}/{{ $product->photo }}" alt="">
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('products.show', $urlDetail) }}"> {{ $product->name }}</a>
                            </td>
                            <td >{{ $product->price }}</td>
                        </tr>
                    @endforeach

                </tbody>
            @else
                <p>Chưa có sản phẩm nào được xem gần đây.</p>
            @endif
        </table>
    </div>
@endsection
