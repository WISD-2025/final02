<x-layouts.shop title="商品詳情">
    <!-- Section-->
    <section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">

            <!-- 商品圖片 -->
            <div class="col-md-6">
                <img class="card-img-top mb-5 mb-md-0"
                     src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg"
                     alt="{{ $product->name }}">
            </div>

            <!-- 商品資訊 -->
            <div class="col-md-6">
                <h1 class="display-5 fw-bolder">
                    {{ $product->name }}
                </h1>

                <div class="fs-5 mb-4">
                    <span>${{ $product->price }}</span>
                </div>

                <p class="lead">
                    商品編號：{{ $product->id }}
                </p>

                <!-- 加入購物車 -->
                <form method="POST" action="{{ route('cart_items.store') }}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="quantity" value="1">
                    <button class="btn btn-outline-dark" type="submit">
                        Add to cart
                    </button>
                </form>
            </div>

        </div>
    </div>
    </section>
</x-layouts.shop>