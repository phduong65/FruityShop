{{-- {{ $categories }} --}}
@extends('layouts.manager')
@section('title', 'Manage Post Create')
@section('manager_post-create')
    <div class="form-box">
        <h2 class="title">Create Post New</h2>
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="wrap">
                <div class="box_left">
                    <div class="box_left-top">
                        <div class="form_product-name --same">
                            <label for="exampleFormControlInput1" class="form-label">Tiêu đề bài viết</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="Tiêu đề bài viết" name="title" required />
                        </div>
                        <div class="form_product-des --same">
                            <label for="content" class="form-label">Nội dung</label>
                            <textarea class="block" placeholder="Nội dung bài viết" id="content" name="content"></textarea>
                        </div>
                        <div class="form_product-photo --same">
                            <label for="exampleFormControlInput1" class="form-label">Hình bài viết</label>
                            <input type="file" class="form-control" id="exampleFormControlInput1" name="photo" />
                        </div>
                    </div>
                </div>
                <div class="box_right">
                    <div class="form_product-status">
                        <h4 class="title">Công bố</h4>
                        <div class="list_status">
                            <label>
                                <input type="radio" name="post_status" value="publish" checked />
                                <span class="text">Công bố</span>
                            </label>
                            <label>
                                <input type="radio" name="post_status" value="expected" />
                                <span class="text">Bản thảo</span>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-bookmark"></i>
                            <span>Lưu Thay Đổi</span>
                        </button>
                    </div>
                    <div class="form_product-category">
                        <h4 class="title">Danh mục bài viết</h4>
                        <div class="list_category">
                            @foreach ($categories as $category)
                                <label>
                                    <input type="checkbox" name="categories[]" class="form-check-input"
                                        value="{{ $category->id }}" />
                                    <span class="name_category">{{ $category->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="form_product-outstand">
                        <h4 class="title">Bài viết nổi bật</h4>
                        <label>
                            <input type="checkbox" name="post_outstand" class="form-check-input" value="open" />
                            <span class="name_outstand">Bật tính năng</span>
                        </label>
                        <p class="text">
                            Lưu ý: Bật tính năng này bài viết sẽ được hiển thị ở mục bài viết nổi bật
                        </p>
                    </div>
                    <div class="form_product-cmtstatus">
                        <h4 class="title">Bình luận bài viết</h4>
                        <label>
                            <input type="checkbox" name="comment_status" class="form-check-input" value="open" />
                            <span class="name_outstand">Bật tính năng</span>
                        </label>
                        <p class="text">
                            Lưu ý: Bật tính năng này thì người dùng có thể bình luận về bài viết bạn đăng lên
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
