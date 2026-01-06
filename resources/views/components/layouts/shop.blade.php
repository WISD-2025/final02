<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Shop' }}</title>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- StartBootstrap shop-homepage CSS -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/cart.css') }}" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand fw-bold fs-3" href="{{ route('shop.index') }}">
            歡樂頌
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item">

                </li>
            </ul>
            <div class="d-flex gap-2">
                <a class="btn btn-outline-dark" href="{{ route('orders.index') }}">
                    購買紀錄
                </a>

                <a class="btn btn-outline-dark" href="{{ route('cart_items.index') }}">
                    購物車
                </a>

                @guest
                    <a class="btn btn-outline-dark" href="{{ route('login') }}">登入</a>
                    <a class="btn btn-outline-dark" href="{{ route('register') }}">註冊</a>
                @endguest

                @auth
                    @auth
                        <div class="dropdown">
                            <button class="btn btn-outline-dark dropdown-toggle"
                                    type="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="bi-person-circle me-1"></i>
                                {{ auth()->user()->name }}，您好
                            </button>

                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="{{ route('change.index') }}">
                                        <i class="bi-pencil-square me-2"></i>
                                        更改個資
                                    </a>
                                </li>

                                <li><hr class="dropdown-divider"></li>

                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="bi-box-arrow-right me-2"></i>
                                            登出
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endauth
                @endauth
            </div>
        </div>
    </div>
</nav>

{{-- ⭐ 關鍵：頁面內容插在這 --}}
<main class="flex-fill">
    {{ $slot }}
</main>

<!-- Footer -->
<footer class="py-5 bg-dark mt-auto">
    <div class="container">
        <p class="m-0 text-center text-white">
            Copyright © 歡樂頌
        </p>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
