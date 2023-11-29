<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
{{-- ---------------------------Thông báo không thêm vào wishlist được--------------- --}}
@if ($success = Session::get('error'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: '{{ $success }}',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@endif
@foreach ($products as $products)
    @php
        // Tạo URL detail bằng cách kết hợp $encryption và $encodedProductId
        $encryptionone = '493275427158023849218444922492048902';
        $encryptiontwo = '94721074921748127486217101204231940921034921849280';
        $urlDetail = $encryptionone . $encryptiontwo . $products->id;
    @endphp
    <div class="col-md-3 mb-5">
        <div class="productdat">
            <div class="photo">
                <img src="{{ URL::asset('uploads/photobig') }}/{{ $products->photo }}" alt="">
            </div>
            <div class="titte-dat">
                <a href="{{ route('products.show', $urlDetail) }}"
                    style="color: rgb(0, 183, 255);">{{ $products->name }}</a>
                <br>
                <p style="color: green">{{ number_format($products->price, 0, '.', '.') }} <span
                        class="woocommerce-Price-currencySymbol">₫</span></p>
                <a href="{{ route('wishlist', $products->id) }}" class="addToWishlist" style="border: none"
                    data-product-id="{{ $products->id }}">
                    ❤️
                    
                </a>
                
            </div>
        </div>
    </div>
@endforeach
