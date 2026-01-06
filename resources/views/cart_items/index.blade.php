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
                        <div class="row text-muted fw-semibold border-bottom py-2 px-3">
                            <div class="col-5">商品資料</div>
                            <div class="col-2 text-center">單價</div>
                            <div class="col-3 text-center">數量</div>
                            <div class="col-2 text-end">小計</div>
                        </div>

                        @php $total = 0; @endphp

                        @foreach ($cartItems as $item)
                            @php
                                $qty = $item->quantity ?? 1;
                                $subtotal = $item->product->price * $qty;
                                $total += $subtotal;
                            @endphp

                            <div class="row align-items-center border-bottom py-3 px-3">

                                {{-- 圖片 + 名稱 --}}
                                <div class="col-5">
                                    <div class="d-flex align-items-center gap-3">
                                        {{-- 商品圖片 --}}
                                        <img src="{{ asset($item->product->image) }}"
                                                 alt="{{ $item->product->name }}"
                                                 class="cart-product-img">

                                        {{-- 商品名稱 --}}
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
                                <div class="col-3 text-center">
                                    <div class="btn-group btn-group-sm">
                                        <button class="btn btn-light">{{ $qty }}</button>
                                    </div>
                                </div>

                                {{-- 小計 --}}
                                <div class="col-2 text-end fw-bold">
                                    NT${{ $subtotal }}
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
                        <select id="deliveryMethod" class="form-select">
                            <option value="store">到店取貨</option>
                            <option value="home">宅配到府</option>
                        </select>

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
                                          class="form-control"
                                          placeholder="請輸入詳細地址">
                               </div>
                           </div>
                        </div>


                        {{-- 付款方式 --}}
                        <select id="paymentMethod" class="form-select">
                            <option value="cash">現金</option>
                            <option value="card">信用卡</option>
                        </select>

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
                                <strong id="total">NT${{ $total }}</strong>
                            </li>
                        </ul>



                        <button id="confirmOrderBtn" class="btn btn-success w-100 py-2">
                            確認
                        </button>

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

/* ===== 縣市 → 區資料 ===== */
const districtData = {
    taipei: ['中正區', '大同區', '中山區', '松山區', '大安區'],
    taichung: ['中區', '東區', '西區', '南區', '北區'],
    kaohsiung: ['鹽埕區', '鼓山區', '左營區', '楠梓區', '三民區']
};

/* ===== 工具 ===== */
function getNumber(text) {
    return parseInt(text.replace(/[^\d]/g, ''), 10);
}

/* ===== 核心 UI 控制（地址 / 付款 / 運費） ===== */
function updateUI() {
    const isStore = deliveryMethod.value === 'store';

    /* 地址 */
    storeAddress.classList.toggle('d-none', !isStore);
    homeAddress.classList.toggle('d-none', isStore);

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

    /* 運費 */
    const subtotal = getNumber(subtotalEl.innerText);
    const shipping = isStore ? 0 : 120;

    shippingEl.innerText = 'NT$' + shipping;
    totalEl.innerText = 'NT$' + (subtotal + shipping);
}

/* ===== 事件：送貨方式 ===== */
deliveryMethod.addEventListener('change', updateUI);

/* ===== 事件：付款方式（顯示卡號） ===== */
paymentMethod.addEventListener('change', function () {
    creditCardArea.classList.toggle('d-none', this.value !== 'card');
});

/* ===== 事件：縣市 → 區 ===== */
citySelect.addEventListener('change', function () {
    const city = this.value;
    districtSelect.innerHTML = '<option value="">請選擇區</option>';

    if (!districtData[city]) return;

    districtData[city].forEach(d => {
        const opt = document.createElement('option');
        opt.value = d;
        opt.textContent = d;
        districtSelect.appendChild(opt);
    });
});

/* ===== 事件：確認訂單（⭐只留這一個） ===== */
confirmBtn.addEventListener('click', function (e) {
    e.preventDefault();

    const totalText = totalEl.innerText;
    const payType   = paymentMethod.value;

    let confirmMsg = '';

    if (payType === 'cash') {
        confirmMsg = `訂單金額：${totalText}\n到店取貨時請記得付款，是否確認下單？`;
    } else {
        confirmMsg = `訂單金額：${totalText}\n您確認付款嗎？`;
    }

    const ok = confirm(confirmMsg);
    if (!ok) return;

    // ===== 根據付款方式，改成功畫面文字 =====
    const titleEl = document.getElementById('successTitle');
    const descEl  = document.getElementById('successDesc');

    if (payType === 'cash') {
        titleEl.innerText = '下單成功';
        descEl.innerText  = '到店取貨時請至櫃檯付款';
    } else {
        titleEl.innerText = '付款成功';
        descEl.innerText  = '商品將於三天後寄出';
    }

    // 顯示成功畫面
    document.getElementById('successOverlay').classList.remove('d-none');
});

/* ===== 初始化 ===== */
updateUI();
</script>


</x-layouts.shop>