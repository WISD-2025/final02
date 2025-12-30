<x-layouts.app title="訂單內容">
    <h1 class="text-2xl font-bold mb-4">
        訂單編號：{{ $order->id }}
    </h1>

    <p class="mb-4">
        下訂時間：
        {{ optional($order->created_at)->format('Y-m-d H:i') ?? '尚未記錄' }}
    </p>

    <h2 class="text-xl font-semibold mb-2">購買商品</h2>

    @if ($order->orderItems->count() === 0)
        <p>此訂單沒有商品</p>
    @else
        <ul>
            @foreach ($order->orderItems as $orderItem)
                <li class="mb-2 border-b pb-2">
                    商品名稱：{{ $orderItem->product->name }}
                </li>
            @endforeach
        </ul>
    @endif
</x-layouts.app>