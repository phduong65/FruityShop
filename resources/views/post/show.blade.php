<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $post->title }}</title>
    @include('post/linkcss')

</head>

<body>
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
                                <span> Chỉ những người dùng đăng nhập mới được đánh giá</span>
                            </p>
                            <div class="form-group">
                                <div class="user_comment">
                                    <div class="avatar">
                                        <img src="https://scontent-tpe1-1.xx.fbcdn.net/v/t39.30808-6/395353319_1672809266540399_236902390255612610_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=5f2048&_nc_ohc=7cKCX3DB06UAX-bG9ze&_nc_ht=scontent-tpe1-1.xx&oh=00_AfDp7p_fuwanDDoKEoAjR-zxSdTBIIVO48LqrtaoyPe2rA&oe=6548A77C"
                                            alt="" />
                                    </div>
                                    <div class="infor">
                                        <p class="name">Nguyễn Đắc Kiên</p>
                                        <p class="day">
                                            <i class="fa-solid fa-clock"></i>
                                            <span>March 07, 2021</span>
                                        </p>
                                    </div>
                                </div>
                                <form action="" method="post" class="comment-form">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                        <label for="floatingTextarea2">Comments</label>
                                    </div>
                                    <button class="btn btn-success custom">Đánh giá</button>
                                </form>
                            </div>
                            <div class="list_comment">
                                <!-- <p class="no-comment">Bài viết chưa có đánh giá nào</p> -->
                                <div class="item">
                                    <div class="wrap">
                                        <div class="avatar">
                                            <img src="https://scontent-tpe1-1.xx.fbcdn.net/v/t39.30808-1/356847140_3586488198334825_3303260936444347827_n.jpg?stp=dst-jpg_s480x480&_nc_cat=105&ccb=1-7&_nc_sid=5f2048&_nc_ohc=3PQdVNYWaqUAX8ptE69&_nc_ht=scontent-tpe1-1.xx&oh=00_AfCQQt_w77_mae8g9tJNK9a_gecbjXMdeNQvn6cY47phEw&oe=6548244C"
                                                alt="" />
                                        </div>
                                        <div class="infor">
                                            <p class="name">Trương Quốc Đạt</p>
                                            <p class="day">
                                                <i class="fa-solid fa-clock"></i>
                                                <span>March 07, 2021</span>
                                            </p>
                                        </div>
                                    </div>
                                    <p class="content">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Excepturi dolore, temporibus veniam quo quia corrupti
                                        voluptatum perferendis nesciunt error doloremque et. Atque
                                        porro temporibus quidem ex maxime fugiat harum autem.
                                    </p>
                                </div>
                                <div class="item">
                                    <div class="wrap">
                                        <div class="avatar">
                                            <img src="https://scontent-tpe1-1.xx.fbcdn.net/v/t39.30808-1/356847140_3586488198334825_3303260936444347827_n.jpg?stp=dst-jpg_s480x480&_nc_cat=105&ccb=1-7&_nc_sid=5f2048&_nc_ohc=3PQdVNYWaqUAX8ptE69&_nc_ht=scontent-tpe1-1.xx&oh=00_AfCQQt_w77_mae8g9tJNK9a_gecbjXMdeNQvn6cY47phEw&oe=6548244C"
                                                alt="" />
                                        </div>
                                        <div class="infor">
                                            <p class="name">Trương Quốc Đạt</p>
                                            <p class="day">
                                                <i class="fa-solid fa-clock"></i>
                                                <span>March 07, 2021</span>
                                            </p>
                                        </div>
                                    </div>
                                    <p class="content">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Excepturi dolore, temporibus veniam quo quia corrupti
                                        voluptatum perferendis nesciunt error doloremque et. Atque
                                        porro temporibus quidem ex maxime fugiat harum autem.
                                    </p>
                                </div>
                                <div class="item">
                                    <div class="wrap">
                                        <div class="avatar">
                                            <img src="https://scontent-tpe1-1.xx.fbcdn.net/v/t39.30808-1/356847140_3586488198334825_3303260936444347827_n.jpg?stp=dst-jpg_s480x480&_nc_cat=105&ccb=1-7&_nc_sid=5f2048&_nc_ohc=3PQdVNYWaqUAX8ptE69&_nc_ht=scontent-tpe1-1.xx&oh=00_AfCQQt_w77_mae8g9tJNK9a_gecbjXMdeNQvn6cY47phEw&oe=6548244C"
                                                alt="" />
                                        </div>
                                        <div class="infor">
                                            <p class="name">Trương Quốc Đạt</p>
                                            <p class="day">
                                                <i class="fa-solid fa-clock"></i>
                                                <span>March 07, 2021</span>
                                            </p>
                                        </div>
                                    </div>
                                    <p class="content">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Excepturi dolore, temporibus veniam quo quia corrupti
                                        voluptatum perferendis nesciunt error doloremque et. Atque
                                        porro temporibus quidem ex maxime fugiat harum autem.
                                    </p>
                                </div>
                                <div class="item">
                                    <div class="wrap">
                                        <div class="avatar">
                                            <img src="https://scontent-tpe1-1.xx.fbcdn.net/v/t39.30808-1/356847140_3586488198334825_3303260936444347827_n.jpg?stp=dst-jpg_s480x480&_nc_cat=105&ccb=1-7&_nc_sid=5f2048&_nc_ohc=3PQdVNYWaqUAX8ptE69&_nc_ht=scontent-tpe1-1.xx&oh=00_AfCQQt_w77_mae8g9tJNK9a_gecbjXMdeNQvn6cY47phEw&oe=6548244C"
                                                alt="" />
                                        </div>
                                        <div class="infor">
                                            <p class="name">Trương Quốc Đạt</p>
                                            <p class="day">
                                                <i class="fa-solid fa-clock"></i>
                                                <span>March 07, 2021</span>
                                            </p>
                                        </div>
                                    </div>
                                    <p class="content">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Excepturi dolore, temporibus veniam quo quia corrupti
                                        voluptatum perferendis nesciunt error doloremque et. Atque
                                        porro temporibus quidem ex maxime fugiat harum autem.
                                    </p>
                                </div>
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
</body>

</html>
