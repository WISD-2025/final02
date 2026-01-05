<x-layouts.shop title="訂購 {{ $product->name }}">

    <div class="container my-5">
        <div class="row align-items-center">

            <!-- 左：圖片 -->
            <div class="col-md-6 text-center">
                <img src="{{ asset($product->image) }}"
                     class="img-fluid"
                     style="max-height:400px">
            </div>

            <!-- 右：商品資訊 -->
            <div class="col-md-6">

                <h2 class="fw-bold mb-3">
                    商品名稱：{{ $product->name }}
                </h2>

                <p class="fs-5 mb-2">
                    價格：${{ $product->price ?? '尚未設定' }}
                </p>

                <p class="fs-5 mb-2">
                    介紹：{{ $product->introduce ?? '尚未填寫商品介紹' }}
                </p>

                <div class="d-flex align-items-center mb-4">
                    <span class="me-3">數量：</span>

                    <button type="button"
                            class="btn btn-outline-secondary"
                            onclick="changeQty(-1)">
                        −
                    </button>

                    <input type="text"
                           id="quantity"
                           value="1"
                           class="form-control mx-2 text-center"
                           style="width:60px"
                           readonly>

                    <button type="button"
                            class="btn btn-outline-secondary"
                            onclick="changeQty(1)">
                        +
                    </button>
                </div>

                <form action="{{ route('cart_items.store') }}" method="POST">
                    @csrf

                    <!-- 商品 ID -->
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <!-- 數量 -->
                    <input type="hidden" name="quantity" id="quantityInput" value="1">

                    <button type="submit" class="btn btn-dark px-4 py-2">
                        加入購物車
                    </button>
                </form>


            </div>
        </div>
    </div>

    <script>
        function changeQty(amount) {
            const displayInput = document.getElementById('quantity');
            const hiddenInput  = document.getElementById('quantityInput');

            let value = parseInt(displayInput.value);
            value = value + amount;

            if (value < 1) value = 1;

            displayInput.value = value;
            hiddenInput.value  = value; // ⭐ 關鍵
        }
    </script>


</x-layouts.shop>
