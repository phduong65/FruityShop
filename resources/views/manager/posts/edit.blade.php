@extends('layouts.manager')
@section('title', 'Manage Post Update')
@section('manager_post-edit')
    <div class="form-box">
        <h2 class="title">Update Post</h2>
        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="wrap">
                <div class="box_left">
                    <div class="box_left-top">
                        <div class="form_product-name --same">
                            <label for="exampleFormControlInput1" class="form-label">Tiêu đề bài viết</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="Tiêu đề bài viết" name="title" required value="{{ $post->title }}"
                                oninput="validateInput()" />
                            <div class="invalid-feedback" id="error-message-title">Không được nhập quá 255 kí tự
                            </div>
                        </div>
                        <div class="form_product-des --same">
                            <label for="content" class="form-label">Nội dung</label>
                            <textarea class="block" placeholder="Nội dung bài viết" id="content" name="content"><?php echo html_entity_decode($post->content); ?></textarea>
                        </div>
                        <div class="form_product-photo --same">
                            <label for="exampleFormControlInput1" class="form-label">Hình bài viết</label>
                            <input type="file" class="form-control" id="exampleFormControlInput1" name="photo"
                                onchange="handlePrev(this)" />
                        </div>
                    </div>
                    <div class="box_left-preview">
                        <h4 class="title">Hình xem trước</h4>
                        <div class="thumnail">
                            <img src="{{ URL::asset('/uploads/post') }}/{{ $post->photo }}" alt=""
                                class="postimgpre">
                        </div>
                    </div>
                </div>
                <div class="box_right">
                    <div class="form_product-status">
                        <h4 class="title">Công bố</h4>
                        <div class="list_status">
                            <label>
                                <input type="radio" name="post_status" value="publish"
                                    {{ $post->post_status == 'publish' ? 'checked' : '' }} />
                                <span class="text">Công bố</span>
                            </label>
                            <label>
                                <input type="radio" name="post_status" value="expected"
                                    {{ $post->post_status == 'expected' ? 'checked' : '' }} />
                                <span class="text">Bản thảo</span>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary"id="btnproductsave" onclick="onclicksave()">
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
                                        value="{{ $category->id }}"
                                        {{ $post->categories_post->contains($category->id) ? 'checked' : '' }} />
                                    <span class="name_category">{{ $category->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="form_product-outstand">
                        <h4 class="title">Bài viết nổi bật</h4>
                        <label>
                            <input type="checkbox" name="post_outstand" class="form-check-input"
                                {{ $post->post_outstand == 'open' ? 'checked' : '' }} />
                            <span class="name_outstand">Bật tính năng</span>
                        </label>
                        <p class="text">
                            Lưu ý: Bật tính năng này bài viết sẽ được hiển thị ở mục bài viết nổi bật
                        </p>
                    </div>
                    <div class="form_product-cmtstatus">
                        <h4 class="title">Bình luận bài viết</h4>
                        <label>
                            <input type="checkbox" name="comment_status" class="form-check-input"
                                {{ $post->comment_status == 'open' ? 'checked' : '' }} />
                            <span class="name_outstand">Bật tính năng</span>
                        </label>
                        <p class="text">
                            Lưu ý: Bật tính năng này thì người dùng có thể bình luận về bài viết bạn đăng lên
                        </p>
                    </div>
                    {{-- input hidden --}}
                </div>
            </div>
        </form>
    </div>
    <script>
        const onclicksave = () => {
            const btn = document.querySelector("#btnproductsave");
            btn.addEventListener('click', () => {
                btn.disabled = true;
            })
        }

        function validateInput() {
            let count = 0;
            // input
            const inputTitlePost = document.querySelector(
                'input[name="title"]'
            );

            const errorTitlePost = document.getElementById("error-message-title");
            // input value
            const inputTitleValue = inputTitlePost.value;
            // btnsave
            const btnproductsave = document.querySelector("#btnproductsave");
            inputTitleValue.length > 255 ?
                handleBlock(errorTitlePost, inputTitlePost) :
                (handleNone(errorTitlePost, inputTitlePost), count++);
            count == 1 ?
                (btnproductsave.disabled = false) :
                (btnproductsave.disabled = true);
        }
        const handleBlock = (err, inputName) => {
            err.style.display = "block";
            inputName.classList.add("is-invalid");
        };
        const handleNone = (err, inputName) => {
            err.style.display = "none";
            inputName.classList.remove("is-invalid");
        };
    </script>
@endsection
