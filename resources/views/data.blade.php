@foreach ($products as $products)

<div class="col-md-3 mb-5">
    <div class="product">
     <div class="photo">
      <img src="{{ URL::asset('uploads/photobig') }}/{{$products->photo}}" alt="">
     </div>
        <div class="titte-dat">
            <h5 style="color: rgb(0, 183, 255);">{{$products->name}}</h5>
            <br>
            <p style="color: green">{{number_format($products->price, 0, '.', '.')}} <span class="woocommerce-Price-currencySymbol">₫</span></p>
        </div>
    </div>

</div>

@endforeach

