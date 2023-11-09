@foreach ($products as $products)

<div class="col-md-3 mb-5">
    <div class="product">
     <div class="photo">
      <img src="{{ URL::asset('uploads/photobig') }}/{{$products->photo}}" alt="">
     </div>
        <div class="titte-dat">
            <h5 style="color: rgb(0, 187, 255);">{{$products->name}}</h5>
            <br>
            <p style="color: rgb(0, 255, 76);">{{$products->price}} VND</p>
        </div>
    </div>

</div>

@endforeach

