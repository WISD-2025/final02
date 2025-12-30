<x-layouts.app title="購物車">
    <h1>購物車清單</h1>

    <ul>
        @foreach ($cartItems as $cartItem)
            <li>
                商品名稱：
                {{ $cartItem->product->name }}
                ，數量：
                {{ $cartItem->quantity }}
            </li>
        @endforeach
    </ul>
</x-layouts.app>