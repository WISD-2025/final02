<x-shop-layout title="歡樂頌">

    <!-- Hero -->
    <header class="bg-dark py-5">
        <div class="container text-center text-white">
            <h3 class="display-4 fw-bolder">歡樂頌，甜與鹹的可頌專賣店</h3>
            <p class="lead text-white-50 mb-0">
                透過用心，為每一位顧客帶來簡單的美味與生活的歡樂。
            </p>
        </div>
    </header>

    <!-- 🍫 甜可頌 -->
    <section class="py-5">
        <div class="container">
            <h2 class="mb-4">🍫 甜可頌</h2>

            <div class="row row-cols-1 row-cols-md-3 row-cols-xl-4 g-4">
                @foreach ($sweetProducts as $product)
                    <div class="col">
                        <div class="card h-100 text-center">
                            <div class="product-image">
                                <img src="{{ asset($product->image) }}"
                                     alt="{{ $product->name }}">
                            </div>

                            <div class="card-body">
                                <h5 class="fw-bolder">{{ $product->name }}</h5>
                                <p class="text-muted">$50</p>
                                <p class="small">{{ $product->description }}</p>
                            </div>

                            <div class="card-footer bg-transparent border-0">
                                <a href="{{ url('/order') }}"
                                   class="btn btn-outline-dark">
                                    我要訂購
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 🥓 鹹可頌 -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="mb-4">🥓 鹹可頌</h2>

            <div class="row row-cols-1 row-cols-md-3 row-cols-xl-4 g-4">
                @foreach ($savoryProducts as $product)
                    <div class="col">
                        <div class="card h-100 text-center">
                            <div class="product-image">
                                <img src="{{ asset($product->image) }}"
                                     alt="{{ $product->name }}">
                            </div>

                            <div class="card-body">
                                <h5 class="fw-bolder">{{ $product->name }}</h5>
                                <p class="text-muted">$100</p>
                                <p class="small">{{ $product->description }}</p>
                            </div>

                            <div class="card-footer bg-transparent border-0">
                                <a href="{{ url('/order') }}"
                                   class="btn btn-outline-dark">
                                    我要訂購
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</x-shop-layout>
