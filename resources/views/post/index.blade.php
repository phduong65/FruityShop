@extends('components.layout')

@section('pageTitle', 'Bài Viết')
@include('post/linkcss')
@section('content')
<main class="main">
    <section class="news">
        <div class="container">
            <div class="news_content">
                <div class="news_content-left">
                    <div class="news_big">
                        <div class="thumnail">
                            <img src="{{ url::asset('uploads/post') }}/{{ $postoutstandone->photo }}"
                                alt="" />
                        </div>
                        <div class="content">
                            <a href="{{ route('posts.show', $postoutstandone->id) }}"
                                class="name">{{ $postoutstandone->title }}</a>
                            <div class="desc --importanttext">
                                <?php echo html_entity_decode($postoutstandone->content); ?>
                            </div>
                            <p class="day">
                                <i class="fa-solid fa-clock"></i>
                                <span>{{ $postoutstandone->created_at }}</span>
                            </p>
                        </div>
                    </div>
                    <div class="news_list">
                        @foreach ($postpaginate as $item)
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
                    <!-- paginate -->
                    <div class="customnav">
                        {{ $postpaginate->links() }}
                    </div>
                    <div class="outstanding">
                        <h2 class="title">Tin Tức Nổi Bật</h2>
                        <div class="outstanding-list">
                            @foreach ($postoutstand as $item)
                                <div class="item">
                                    <div class="thumnail">
                                        <img src="{{ url::asset('uploads/post') }}/{{ $item->photo }}"
                                            alt="" />
                                    </div>
                                    <div class="content">
                                        <a href="{{ route('posts.show', $item->id) }}"
                                            class="name">{{ $item->title }}</a>
                                        <div class="desc --importanttext">
                                            <?php echo html_entity_decode($item->content); ?>
                                        </div>
                                        <p class="day">
                                            <i class="fa-solid fa-clock"></i>
                                            <span>{{ $item->created_at }}</span>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="news_content-right">
                    <div class="recent-news cpn-new-mini">
                        <h2 class="title">Tin Tức Vừa Xem</h2>
                        <div class="list">
                            @if (count($recentlyViewedPosts) == 0)
                                <p class="no-news">Không có tin tức nào</p>
                            @else
                                @foreach ($recentlyViewedPosts as $item)
                                    <div class="item">
                                        <div class="thumnail">
                                            <img src="{{ url::asset('uploads/post') }}/{{ $item->photo }}"
                                                alt="" />
                                        </div>
                                        <div class="content">
                                            <a href="{{ route('posts.show', $item->id) }}"
                                                class="name">{{ $item->title }}</a>
                                            <p class="day">
                                                <i
                                                    class="fa-solid fa-clock"></i><span>{{ $item->created_at }}</span>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="new-post cpn-new-mini">
                        <h2 class="title">Tin Tức Mới</h2>
                        <div class="listnews">
                            @foreach ($postnew as $item)
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
                    <div class="category-news">
                        <h2 class="title">Danh Mục</h2>
                        <ul class="listcategory">
                            @foreach ($categories as $item)
                                <li>
                                    <i class="fa-solid fa-check"></i><a href="#">{{ $item->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

