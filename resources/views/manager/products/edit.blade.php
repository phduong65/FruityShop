@extends('layouts.manager')
@section('title', 'Manage Product Edit')
@section('manager_product-edit')
    <div class="form-box">
        <h2 class="title">Update Product</h2>
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="wrap">
                <div class="box_left">
                    <div class="box_left-top">
                        <div class="form_product-name --same">
                            <label for="exampleFormControlInput1" class="form-label">Tên Sản Phẩm</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="Tên Sản Phẩm" name="nameproduct" required value="{{ $product->name }}" />
                        </div>
                        <div class="form_product-des --same">
                            <label for="content" class="form-label">Mô Tả</label>
                            <textarea class="block" placeholder="Mô tả sản phẩm" id="content" name="description"><?php echo html_entity_decode($product->description); ?></textarea>
                        </div>
                        <div class="form_product-price --same">
                            <div class="priceroot">
                                <label for="exampleFormControlInput1" class="form-label">Giá bán</label>
                                <input type="number" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Giá sản phẩm" name="price" min="0" required
                                    value="{{ $product->price }}" />
                            </div>
                            <div class="pricesale">
                                <label for="exampleFormControlInput1" class="form-label">Giá giảm</label>
                                <input type="number" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Nhập phần trăm giảm" min="0" name="discount"
                                    value="{{ $product->discount }}" />
                                <p class="desc">
                                    Lưu ý: Nhập phần trăm giảm. Ví dụ 30% = 30
                                </p>
                            </div>
                        </div>
                        <div class="form_product-quantity --same">
                            <label for="exampleFormControlInput1" class="form-label">Số lượng</label>
                            <input type="number" class="form-control" id="exampleFormControlInput1"
                                placeholder="Số lượng sản phẩm" min="0" required name="quantity"
                                value="{{ $product->quantity }}" />
                            <p class="desc">
                                Lưu ý: Số lượng được tính bằng kg (kilogram)
                            </p>
                        </div>
                        <div class="form_product-photo --same">
                            <label for="exampleFormControlInput1" class="form-label">Hình sản phẩm</label>
                            <input type="file" class="form-control" id="exampleFormControlInput1" name="photobig"
                                onchange="handleUpdateImage(this)" />
                        </div>
                        <div class="form_product-thumnail --same">
                            <label for="exampleFormControlInput1" class="form-label">Hình nhỏ của sản phẩm</label>
                            <input type="file" class="form-control" id="exampleFormControlInput1" name="photomini[]"
                                multiple onchange="handleUpdateImageChild(this)" />
                            <p class="desc">
                                Lưu ý: Mục này dùng để tải hình nhỏ của sản phẩm để hiển thị
                                trong chi tiết sản phẩm, có thể chọn nhiều hình
                            </p>
                        </div>
                    </div>
                </div>
                <div class="box_right">
                    <div class="form_product-status">
                        <h4 class="title">Công bố</h4>
                        <div class="list_status">
                            <label>
                                <input type="radio" name="status" value="publish"
                                    {{ $product->status == 'publish' ? 'checked' : '' }} />
                                <span class="text">Công bố</span>
                            </label>
                            <label>
                                <input type="radio" name="status" value="expected"
                                    {{ $product->status == 'expected' ? 'checked' : '' }} />
                                <span class="text">Bản thảo</span>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-bookmark"></i>
                            <span>Lưu Thay Đổi</span>
                        </button>
                    </div>
                    <div class="form_product-category">
                        <h4 class="title">Danh Mục Sản Phẩm</h4>
                        <div class="list_category">
                            @foreach ($categories as $category)
                                <label>
                                    <input type="checkbox" name="categories[]" class="form-check-input"
                                        value="{{ $category->id }}"
                                        {{ $product->categories->contains($category->id) ? 'checked' : '' }} />
                                    <span class="name_category">{{ $category->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="form_product-outstand">
                        <h4 class="title">Sản phẩm nổi bật</h4>
                        <label>
                            <input type="checkbox" name="outstand" class="form-check-input"
                                {{ $product->outstand == 'open' ? 'checked' : '' }} />
                            <span class="name_outstand">Bật tính năng</span>
                        </label>
                        <p class="text">
                            Lưu ý: Bật tính năng này sản phẩm sẽ được hiển thị ở mục sản
                            phẩm nổi bật
                        </p>
                    </div>
                    <div class="form_product-image">
                        <h4 class="title">Hình sản phẩm</h4>
                        <div class="thumnail">
                            <img src="{{ URL::asset('uploads/photobig') }}/{{ $product->photo }}" alt=""
                                class="photobigsrc">
                        </div>
                    </div>
                    <div class="form_product-childimage">
                        <div class="wrap_image">
                            @foreach (json_decode($product->thumnail, true) as $img)
                                <div class="thumnail">
                                    <img src="{{ URL::asset('uploads/photomini') }}/{{ $img }}" alt=""
                                        class="photominisrc">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
