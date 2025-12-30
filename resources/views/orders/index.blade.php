<x-layouts.app title="我的訂單">
    <h1 class="text-2xl font-bold mb-4">我的訂單</h1>

    @if ($orders->count() === 0)
        <p>目前尚無訂單</p>
    @else
        <ul>
            @foreach ($orders as $order)
                <li class="mb-2 border-b pb-2">
                    訂單編號：{{ $order->id }} <br>
                    下訂時間：{{ $order->created_at->format('m/d') }}
                </li>
            @endforeach
        </ul>
    @endif
</x-layouts.app>
