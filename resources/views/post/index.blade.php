@extends('components.layout')

@section('pageTitle', 'Bài Viết')
@include('post/linkcss')
@section('content')
    @php
        // tạo url detail
        $encryptionone = '123123jnjnbj1v3g12c3g123vgmnsadsf98f9sd8f09sd8f09sd8f0s';
        $encryptiontwo = '3i192u3j13bnj12b3b398191830183ksdmadmkfnajsnfas98f980a8';
    @endphp
    <main class="main">
        <section class="news">
            <div class="container">
                <div class="news_content">
                    <div class="news_content-left">
                        <div class="news_big">
                            <div class="thumnail">
                                <img src="{{ url::asset('uploads/post') }}/{{ $postoutstandone->photo }}" alt="" />
                            </div>
                            <div class="content">
                                @php
                                    $urlOne = $encryptionone . $encryptiontwo . $postoutstandone->id;
                                @endphp
                                <a href="{{ route('posts.show', $urlOne) }}"
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
                                @php
                                    $urlTwo = $encryptionone . $encryptiontwo . $item->id;
                                @endphp
                                <div class="item">
                                    <div class="thumnail">
                                        <img src="{{ url::asset('uploads/post') }}/{{ $item->photo }}" alt="" />
                                    </div>
                                    <div class="content">
                                        <a href="{{ route('posts.show', $urlTwo) }}" class="name">{{ $item->title }}</a>
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
                                    @php
                                        $urlThree = $encryptionone . $encryptiontwo . $item->id;
                                    @endphp
                                    <div class="item">
                                        <div class="thumnail">
                                            <img src="{{ url::asset('uploads/post') }}/{{ $item->photo }}"
                                                alt="" />
                                        </div>
                                        <div class="content">
                                            <a href="{{ route('posts.show', $urlThree) }}"
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
                                        @php
                                            $urlFour = $encryptionone . $encryptiontwo . $item->id;
                                        @endphp
                                        <div class="item">
                                            <div class="thumnail">
                                                <img src="{{ url::asset('uploads/post') }}/{{ $item->photo }}"
                                                    alt="" />
                                            </div>
                                            <div class="content">
                                                <a href="{{ route('posts.show', $urlFour) }}"
                                                    class="name">{{ $item->title }}</a>
                                                <p class="day">
                                                    <i class="fa-solid fa-clock"></i><span>{{ $item->created_at }}</span>
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
                                    @php
                                        $urlFive = $encryptionone . $encryptiontwo . $item->id;
                                    @endphp
                                    <div class="item">
                                        <div class="thumnail">
                                            <img src="{{ url::asset('uploads/post') }}/{{ $item->photo }}"
                                                alt="" />
                                        </div>
                                        <div class="content">
                                            <a href="{{ route('posts.show', $urlFive) }}"
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
                                    <li onclick="handle({{ $item->id }})">
                                        <i class="fa-solid fa-check"></i><a
                                            href="{{ route('post.showcategorypost') }}">{{ $item->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="{{ URL::asset('js') }}/tri2.js"></script>
@endsection
