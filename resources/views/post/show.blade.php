@extends('components.layout')

@section('pageTitle', 'Bài Viết')
@include('post/linkcss')
@section('content')
    <main class="main">
        <section class="detailnew">
            <div class="container">
                <div class="detailnew_content">
                    <div class="detailnew_content-left">
                        <div class="detail-wrap">
                            <h2 class="name">
                                {{ $post->title }}
                            </h2>
                            <div class="date">
                                <div class="left">
                                    <span> {{ $post->created_at }}</span>
                                    <span> | </span>
                                    @foreach ($post->categories_post as $cate)
                                        <span class="cate">{{ $cate->name }}</span>
                                        <span> | </span>
                                    @endforeach
                                </div>
                                <div class="right">
                                    <i class="fa-solid fa-eye"></i>
                                    <span>{{ $post->view }} lượt xem</span>
                                </div>
                            </div>
                            <div class="content-textarea">
                                <?php echo html_entity_decode($post->content); ?>
                            </div>
                        </div>
                        <div class="comment">
                            <h2 class="title">Đánh giá bài viết</h2>
                            <p class="text">
                                <i class="fa-solid fa-pen-to-square"></i>
                                @if (Auth::user())
                                    <span> Viết đánh giá của bạn ở dưới</span>
                                @else
                                    <span> Chỉ những người dùng đăng nhập mới được đánh giá</span>
                                @endif
                            </p>
                            @if ($post->comment_status == 'close')
                                <p>Bài viết đã tắt tính năng bình luận</p>
                            @elseif(Auth::user())
                                <div class="form-group">
                                    <div class="user_comment">
                                        <div class="avatar">
                                            <img src="https://images.unsplash.com/photo-1699727152109-b5b9592641ca?q=80&w=2889&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                                alt="" />
                                        </div>
                                        <div class="infor">
                                            <p class="name">{{ $infor->name }}</p>
                                            <p class="day">
                                                <i class="fa-solid fa-clock"></i>
                                                <span>{{ date('Y-m-d g:i a') }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <form action="{{ route('commentpost.store') }}" method="post" class="comment-form">
                                        @csrf
                                        <div class="form-floating">
                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                            <input type="hidden" name="user_id" value="{{ $infor->id }}">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" required name="content"
                                                rows="7" style="height: inherit"></textarea>
                                            <label for="floatingTextarea2">Comments</label>
                                        </div>
                                        <button class="btn btn-success custom">Đánh giá</button>
                                    </form>
                                </div>
                            @endif
                            <div class="list_comment">
                                @if ($post->comment_count > 0)
                                    @foreach ($post->comments as $comment)
                                        <div class="item">
                                            <div class="wrap">
                                                <div class="avatar">
                                                    <img src="https://images.unsplash.com/photo-1699727152109-b5b9592641ca?q=80&w=2889&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                                        alt="" />
                                                </div>
                                                <div class="infor">
                                                    <p class="name">{{ $comment->user->name }}</p>
                                                    <p class="day">
                                                        <i class="fa-solid fa-clock"></i>
                                                        <span>{{ $comment->created_at }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <p class="content">
                                                {{ $comment->content }}
                                            </p>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="no-comment">Bài viết chưa có đánh giá nào</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="detailnew_content-right">
                        <div class="see-a-lot cpn-new-mini">
                            <h2 class="title">Tin Đọc Nhiều Nhất</h2>
                            <div class="list">
                                @foreach ($mostViewedPosts as $item)
                                    <div class="item">
                                        <div class="thumnail">
                                            <img src="{{ url::asset('uploads/post') }}/{{ $item->photo }}"
                                                alt="" />
                                        </div>
                                        <div class="content">
                                            <a href="{{ route('posts.show', $item->id) }}"
                                                class="name">{{ $item->title }}</a>
                                            <p class="day">
                                                <i class="fa-solid fa-clock"></i><span>{{ $item->created_at }}</span>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="news-new cpn-new-mini no-photo">
                            <h2 class="title">Tin Tức Mới Nhất</h2>
                            <div class="list">
                                @foreach ($postnew as $item)
                                    <div class="item">
                                        <div class="content">
                                            <a href="{{ route('posts.show', $item->id) }}"
                                                class="name">{{ $item->title }}</a>
                                            <p class="day">
                                                <i class="fa-solid fa-clock"></i><span>{{ $item->created_at }}</span>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="same-category cpn-new-mini">
                            <h2 class="title">Tin Cùng Chuyên Mục</h2>
                            <div class="list">
                                @foreach ($relatedPosts as $item)
                                    <div class="item">
                                        <div class="thumnail">
                                            <img src="{{ url::asset('uploads/post') }}/{{ $item->photo }}"
                                                alt="" />
                                        </div>
                                        <div class="content">
                                            <a href="{{ route('posts.show', $item->id) }}"
                                                class="name">{{ $item->title }}</a>
                                            <p class="day">
                                                <i class="fa-solid fa-clock"></i><span>{{ $item->created_at }}</span>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
