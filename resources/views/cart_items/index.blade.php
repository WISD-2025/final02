<x-layouts.shop title="購物車">

<section class="py-5">
    <div class="container">
        <div class="card">
            <div class="row">
                <div class="card">
                            <div class="row">
                                <div class="col-md-8 cart">
                                    <div class="title">
                                        <div class="row">
                                            <div class="col"><h4><b>Shopping Cart</b></h4></div>
                                            <div class="col align-self-center text-right text-muted">
                                                {{ $cartItems->count() }} items
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $total = 0;
                                    @endphp

                                    @foreach ($cartItems as $item)
                                        @php
                                            $qty = $item->quantity ?? 1;
                                            $total += $item->product->price * $qty;
                                        @endphp

                                        <div class="row border-top border-bottom">
                                            <div class="row main align-items-center">
                                                <div class="col-2">
                                                    <img class="img-fluid" src="https://dummyimage.com/100x100/ddd/555">
                                                </div>

                                                <div class="col">
                                                    <div class="row text-muted">商品</div>
                                                    <div class="row">{{ $item->product->name }}</div>
                                                </div>

                                                <div class="col text-center">
                                                    {{ $qty }}
                                                </div>

                                                <div class="col text-right">
                                                    $ {{ $item->product->price }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="back-to-shop"><a href="{{ route('shop.index') }}">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
                                </div>
                                <div class="col-md-4 summary">
                                    <div><h5><b>Summary</b></h5></div>
                                    <hr>
                                    <div class="row">
                                        <div class="col" style="padding-left:0;">ITEMS {{ $cartItems->count() }}</div>
                                        <div class="col text-right">$ {{ $total }}</div>
                                    </div>
                                    <form>
                                        <p>SHIPPING</p>
                                        <select><option class="text-muted">Standard-Delivery- &euro;5.00</option></select>
                                        <p>GIVE CODE</p>
                                        <input id="code" placeholder="Enter your code">
                                    </form>
                                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                                        <div class="col">TOTAL PRICE</div>
                                        <div class="col text-right">$ {{ $total }}</div>
                                    </div>
                                    <button class="btn">CHECKOUT</button>
                                </div>
                            </div>

                        </div>
            </div>
        </div>
    </div>
</section>

</x-layouts.shop>
