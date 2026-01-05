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
<body>

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
                <a class="btn btn-outline-dark" href="{{ route('menu.index') }}">
                    <i class="bi-list-ul me-1"></i>
                    菜單
                </a>
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

{{-- ⭐ 關鍵：頁面內容插在這 --}}
<main>
    {{ $slot }}
</main>

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">
            Copyright &copy; 歡樂頌
        </p>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
