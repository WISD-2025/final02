<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="utf-8">
    <title>{{ $title ?? 'Shop' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/cart.css') }}" rel="stylesheet">
</head>
<body>

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
                    <i class="bi-receipt me-1"></i>
                    購買紀錄
                </a>
                <a class="btn btn-outline-dark" href="{{ route('cart_items.index') }}">
                    <i class="bi-cart-fill me-1"></i>
                    購物車
                </a>
                <a class="btn btn-outline-dark" href="{{ route('login') }}">
                    <i class="bi-person-circle me-1"></i>
                    登入
                </a>
                <a class="btn btn-outline-dark" href="{{ route('register') }}">
                    註冊
                </a>
            </div>
        </div>
    </div>
</nav>

<main>
    {{ $slot }}
</main>

<footer class="py-5 bg-dark">
    <p class="text-center text-white m-0">Copyright © 歡樂頌</p>
</footer>

</body>
</html>
