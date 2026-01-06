<x-layouts.shop title="購物車">

<section class="py-5">
    <div class="container">

        <div class="row g-4">

            {{-- 左：購物車 + 配送付款 --}}
            <div class="col-lg-8">

                {{-- 購物車列表 --}}
                <div class="card shadow-sm mb-4">
                    <div class="card-header fw-bold fs-4">
                        🛒 購物車（{{ count($cartItems) }} 件）
                    </div>

                    <div class="card-body p-0">

                        {{-- 表頭 --}}
                        <div class="row text-muted fw-semibold border-bottom py-2 px-3 text-nowrap align-items-center">
                            <div class="col-5">商品資料</div>
                            <div class="col-2 text-center">單價</div>
                            <div class="col-2 text-center">數量</div>
                            <div class="col-2 text-start">小計</div>
                            <div class="col-1 text-center">移除</div>
                        </div>

                        @php $total = 0; @endphp

                        @foreach ($cartItems as $item)
                            @php
                                $qty = $item->quantity ?? 1;
                                $subtotal = $item->product->price * $qty;
                                $total += $subtotal;
                            @endphp

                            <div class="row align-items-center border-bottom py-3 px-3">

                                {{-- 商品資料 --}}
                                <div class="col-5">
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="{{ asset($item->product->image) }}"
                                             alt="{{ $item->product->name }}"
                                             class="cart-product-img">

                                        <div class="fw-semibold">
                                            {{ $item->product->name }}
                                        </div>
                                    </div>
                                </div>

                                {{-- 單價 --}}
                                <div class="col-2 text-center">
                                    NT${{ $item->product->price }}
                                </div>

                                {{-- 數量 --}}
                                <div class="col-2 text-center">
                                    <button class="btn btn-light btn-sm">{{ $qty }}</button>
                                </div>

                                {{-- ⭐ 小計（單獨一欄，跟表頭對齊） --}}
                                <div class="col-2 text-center fw-bold">
                                    NT${{ $subtotal }}
                                </div>

                                {{-- ⭐ 移除（單獨一欄，正中） --}}
                                <div class="col-1 text-center">
                                    <form method="POST"
                                          action="{{ route('cart_items.destroy', $item) }}"
                                          onsubmit="return confirm('確定要移除這個商品嗎？')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-link p-0"
                                                style="
                                                    font-size: 1.8rem;
                                                    line-height: 1;
                                                    text-decoration: none;
                                                ">
                                            🗑
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                {{-- 配送與付款 --}}
                <div class="card shadow-sm mb-4">
                    <div class="card-header fw-bold fs-5">
                        🚚 選擇送貨及付款方式
                    </div>

                    <div class="card-body">

                        {{-- 姓名 --}}
                        <div class="mb-3">
                            <label class="form-label">姓名</label>
                            <input type="text"
                                   class="form-control"
                                   value="{{ auth()->user()->name }}"
                                   readonly>
                        </div>

                        {{-- Gmail --}}
                        <div class="mb-3">
                            <label class="form-label">Gmail</label>
                            <input type="email"
                                   class="form-control"
                                   value="{{ auth()->user()->email }}"
                                   readonly>
                        </div>

                        {{-- 送貨方式 --}}
                        <div class="mb-3">
                            <label for="deliveryMethod" class="form-label">送貨方式</label>
                            <select id="deliveryMethod" class="form-select">
                                <option value="store">到店取貨</option>
                                <option value="home">宅配到府</option>
                            </select>
                        </div>

                        {{-- 到店取貨地址 --}}
                        <div class="mb-3" id="storeAddress">
                            <label class="form-label">取貨地點</label>
                            <input type="text"
                                   class="form-control"
                                   value="臺中市太平區中山路二段57號"
                                   readonly>
                        </div>

                        {{-- 宅配地址 --}}
                        <div class="mb-3 d-none" id="homeAddress">
                            <label class="form-label">宅配地址</label>

                           <div class="row g-2 mb-2">
                               <div class="col-md-4">
                                   <select class="form-select" id="citySelect">
                                       <option value="">請選擇縣市</option>
                                       <option value="taipei">臺北市</option>
                                       <option value="taichung">臺中市</option>
                                       <option value="kaohsiung">高雄市</option>
                                   </select>
                               </div>

                               <div class="col-md-4">
                                   <select class="form-select" id="districtSelect">
                                       <option value="">請先選擇縣市</option>
                                   </select>
                               </div>

                               <div class="col-md-4">
                                   <input type="text"
                                          id="detailAddress"
                                          class="form-control"
                                          placeholder="請輸入詳細地址">
                               </div>
                           </div>
                        </div>


                        {{-- 付款方式 --}}
                        <div class="mb-3">
                            <label for="paymentMethod" class="form-label">付款方式</label>
                            <select id="paymentMethod" class="form-select">
                                <option value="cash">現金</option>
                                <option value="card">信用卡</option>
                            </select>
                        </div>

                        {{-- 信用卡卡號 --}}
                        <div class="mb-3 d-none" id="creditCardArea">
                            <label class="form-label">信用卡卡號</label>
                            <input type="text"
                                   class="form-control"
                                   placeholder="xxxx-xxxx-xxxx-xxxx">
                        </div>
                    </div>
                </div>
            </div>

            {{-- 右：訂單資訊 --}}
            <div class="col-lg-4">
                <div class="card shadow-sm sticky-top" style="top:20px;">
                    <div class="card-header fw-bold fs-4">
                        🧾 訂單資訊
                    </div>

                    <div class="card-body">

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>小計</span>
                                <strong id="subtotal">NT${{ $total }}</strong>
                            </li>

                            <li class="list-group-item d-flex justify-content-between">
                                <span>運費</span>
                                <strong id="shipping">NT$120</strong>
                            </li>

                            <li class="list-group-item d-flex justify-content-between">
                                <span>合計</span>
                                <strong id="total">NT$</strong>
                            </li>
                        </ul>

                        <form method="POST" action="{{ route('orders.store') }}">
                            @csrf

                            <input type="hidden" name="payment_method" value="cash">
                            <input type="hidden" name="total" value="{{ $total }}">

                            <button type="submit"
                                    id="confirmOrderBtn"
                                    class="btn btn-success w-100"
                                    disabled>
                                確認
                            </button>

                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

{{-- 付款成功畫面 --}}
<div id="successOverlay" class="d-none"
     style="
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.6);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
     ">
    <div class="bg-white rounded-4 p-5 text-center shadow-lg" style="max-width: 420px;">

        <h1 id="successTitle"
            class="text-success fw-bold mb-3"
            style="font-size: 3rem;">
            付款成功
        </h1>

        <p id="successDesc" class="fs-4 mb-4">
            商品將於三天後寄出
        </p>

        <a href="http://127.0.0.1:8000/shop"
           class="btn btn-success btn-lg w-100">
            回首頁
        </a>
    </div>
</div>



    <script>
        /* ===== DOM ===== */
        const deliveryMethod = document.getElementById('deliveryMethod'); // store / home
        const storeAddress   = document.getElementById('storeAddress');
        const homeAddress    = document.getElementById('homeAddress');

        const citySelect     = document.getElementById('citySelect');
        const districtSelect = document.getElementById('districtSelect');

        const paymentMethod  = document.getElementById('paymentMethod'); // cash / card
        const creditCardArea = document.getElementById('creditCardArea');

        const shippingEl     = document.getElementById('shipping');
        const subtotalEl     = document.getElementById('subtotal');
        const totalEl        = document.getElementById('total');

        const confirmBtn     = document.getElementById('confirmOrderBtn');

        /* ===== 工具 ===== */
        function getNumber(text) {
            return parseInt(text.replace(/[^\d]/g, ''), 10) || 0;
        }

        /* ===== 核心 UI 控制 ===== */
        function updateUI() {
            const isStore  = deliveryMethod.value === 'store';

                /* 地址顯示 */
                storeAddress.classList.toggle('d-none', !isStore);
                homeAddress.classList.toggle('d-none', isStore);

                /* ⭐ 關鍵：控制縣市 / 區域是否可選 ⭐ */
                citySelect.disabled = isStore;
                districtSelect.disabled = isStore;

                if (isStore) {
                    citySelect.value = '';
                    districtSelect.innerHTML = '<option value="">請先選擇縣市</option>';
                }

                /* 付款方式 */
                if (isStore) {
                    paymentMethod.innerHTML = `
                        <option value="cash">現金</option>
                        <option value="card">信用卡</option>
                    `;
                    paymentMethod.value = 'cash';
                    creditCardArea.classList.add('d-none');
                } else {
                    paymentMethod.innerHTML = `
                        <option value="card">信用卡</option>
                    `;
                    paymentMethod.value = 'card';
                    creditCardArea.classList.remove('d-none');
                }

                /* 金額計算 */
                const subtotal = getNumber(subtotalEl.innerText);
                const shipping = isStore ? 0 : 120;

                shippingEl.innerText = 'NT$' + shipping;
                totalEl.innerText    = 'NT$' + (subtotal + shipping);

                validateOrder();
            }

        /* ===== 事件 ===== */
        deliveryMethod.addEventListener('change', updateUI);

        paymentMethod.addEventListener('change', function () {
            creditCardArea.classList.toggle('d-none', this.value !== 'card');
        });

        confirmBtn.addEventListener('click', function (e) {

            const totalText = totalEl.innerText;
            const payType   = paymentMethod.value;

            const msg = payType === 'cash'
                ? `訂單金額：${totalText}\n到店取貨時請付款，是否確認下單？`
                : `訂單金額：${totalText}\n是否確認付款？`;

            if (!confirm(msg)) return;

            document.getElementById('successTitle').innerText =
                payType === 'cash' ? '下單成功' : '付款成功';

            document.getElementById('successDesc').innerText =
                payType === 'cash'
                    ? '到店取貨時請至櫃檯付款'
                    : '商品將於三天後寄出';

            document.getElementById('successOverlay').classList.remove('d-none');
        });

        /* ⭐ 頁面載入先算一次 ⭐ */
        updateUI();
        validateOrder();

        /* ===== 縣市 → 區域資料 ===== */
        const districtData = {
            taipei: ['中正區', '大安區', '信義區', '士林區'],
            taichung: ['太平區', '西屯區', '北區', '南區'],
            kaohsiung: ['三民區', '左營區', '前鎮區', '苓雅區'],
        };

        /* ===== 當縣市改變時，更新區域 ===== */
        citySelect.addEventListener('change', function () {
            const city = this.value;

            // 清空區域選單
            districtSelect.innerHTML = '';

            if (!city || !districtData[city]) {
                districtSelect.innerHTML =
                    '<option value="">請先選擇縣市</option>';
                validateOrder();
                return;
            }

            // 加入「請選擇區域」
            districtSelect.innerHTML =
                '<option value="">請選擇區域</option>';

            // 塞入對應區域
            districtData[city].forEach(district => {
                const option = document.createElement('option');
                option.value = district;
                option.textContent = district;
                districtSelect.appendChild(option);
            });

            validateOrder();
        });
        const detailAddress = document.getElementById('detailAddress');

        /* ===== 下單條件檢查 ===== */
        function validateOrder() {
            let valid = true;

            // 送貨方式
            if (!deliveryMethod.value) valid = false;

            // 宅配要填完整地址
            if (deliveryMethod.value === 'home') {
                if (!citySelect.value) valid = false;
                if (!districtSelect.value) valid = false;
                if (!detailAddress.value.trim()) valid = false;
            }

            // 付款方式
            if (!paymentMethod.value) valid = false;

            // 信用卡付款要填卡號
            if (paymentMethod.value === 'card') {
                const cardInput = creditCardArea.querySelector('input');
                if (!cardInput.value.trim()) valid = false;
            }

            confirmBtn.disabled = !valid;
        }

        [
            deliveryMethod,
            citySelect,
            districtSelect,
            paymentMethod,
        ].forEach(el => {
            el.addEventListener('change', validateOrder);
        });

        if (detailAddress) {
            detailAddress.addEventListener('input', validateOrder);
        }

        const cardInput = creditCardArea.querySelector('input');
        if (cardInput) {
            cardInput.addEventListener('input', validateOrder);
        }

    </script>
    @if (session('order_success'))
        <div id="orderSuccessModal" class="modal-overlay">
            <div class="modal-box">
                <h2 class="text-success">下單成功</h2>
                <p>到店取貨時請至櫃檯付款</p>

                <a href="{{ route('shop.index') }}" class="btn btn-success">
                    回首頁
                </a>
            </div>
        </div>
    @endif
</x-layouts.shop>
