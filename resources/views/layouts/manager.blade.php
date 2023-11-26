<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="http://fonts.googleapis.com/css?family=Open+Sans:300,700,800|Open+Sans+Condensed:300,700|Prata&subset=vietnamese"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('css') }}/tri.css">
    <link rel="stylesheet" href="{{ URL::asset('css') }}/kien_manager.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/cbq48gtdz0pfdbuzyype3yu466uymwxiwm110gup8nlexzj2/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    @stack('style')

    <link rel="stylesheet" href="{{ URL::asset('css') }}/dat.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.min.css" rel="stylesheet">
    {{-- <script src="https://cdn.tiny.cloud/1/cbq48gtdz0pfdbuzyype3yu466uymwxiwm110gup8nlexzj2/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> --}}
    <script src="https://cdn.tiny.cloud/1/vbbr3guak3bbui05i5xfk71ggpqurnvymcu6v3ahyizq6fw0/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="navigation">
        <ul>
            <li>
                <a href="#">
                    <span class="icon">
                        <img style="position: absolute; top: -14px; left: 5px" width="50px"
                            src="{{ URL::asset('image') }}/z4848777580187_dd98418481af2c824043a206219bca2e.png"
                            alt="" />
                    </span>
                    <span class="title tieude">Fruity Shop</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('products.index') }}">
                    <span class="icon">
                        <ion-icon name="clipboard-outline"></ion-icon>
                    </span>
                    <span class="title">Sản phẩm</span>
                </a>
            </li>
            <li>
                <a href="{{ route('categoriesProduct.index') }}">
                    <span class="icon">
                        <ion-icon name="grid-outline"></ion-icon>
                    </span>
                    <span class="title">Danh Mục Sản phẩm</span>
                </a>
            </li>

            <li>
                <a href="{{ route('users.index') }}">
                    <span class="icon">
                        <ion-icon name="people-outline"></ion-icon>
                    </span>
                    <span class="title">Người dùng</span>
                </a>
            </li>
            <li>
                <a href="{{ route('posts.index') }}">
                    <span class="icon">
                        <ion-icon name="document-text-outline"></ion-icon>
                    </span>
                    <span class="title">Bài Viết</span>
                </a>
            </li>
            <li>
                <a href="{{ route('categoriesPost.index') }}">
                    <span class="icon">
                        <ion-icon name="file-tray-full-outline"></ion-icon>
                    </span>
                    <span class="title">Danh Mục Bài Viết</span>
                </a>
            </li>

            <li>
                <a href="{{ route('managerOrders') }}">
                    <span class="icon">
                        <ion-icon name="bag-outline"></ion-icon>
                    </span>
                    <span class="title">Đơn hàng</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="settings-outline"></ion-icon>
                    </span>
                    <span class="title">Cài đặt</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </span>
                    <span class="title">Đăng xuất</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="manager_main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
            <div class="user">
                <img src="https://images.unsplash.com/photo-1698611229097-cf0e2fc8ba81?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="">
            </div>
        </div>

        @yield('manager_doashboard')
        {{-- Manager Product --}}
        @yield('manager_product')
        @yield('manager_product-create')
        @yield('manager_product-edit')
        {{-- Manager Post --}}
        @yield('manager_post')
        @yield('manager_post-create')
        @yield('manager_post-edit')
        {{-- Manager Order --}}
        @yield('manager_orders')
        {{-- category product --}}
        @yield('manager_category_product')
        {{-- Manager User --}}
        @yield('manager_user')
    </div>
    @yield('kien-js')
    @yield('duong-js')
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="{{ URL::asset('js') }}/tri.js"></script>
    <script src="{{ URL::asset('js') }}/dat.js"></script>
</body>

</html>
