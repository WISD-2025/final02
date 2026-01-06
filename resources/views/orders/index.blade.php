<x-layouts.shop title="購買紀錄">

    <section class="py-5">
        <div class="container">
            <h2 class="mb-4">🧾 歷史購買紀錄</h2>

            @forelse ($orders as $order)
                <div class="card mb-4">
                    <div class="card-header">
                        訂購時間：{{ $order->created_at->format('Y-m-d H:i') }}
                    </div>

                    <div class="card-body">
                        <p>付款方式：{{ $order->payment_method }}</p>
                        <p>總金額：NT${{ $order->total }}</p>

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>商品名稱</th>
                                <th>數量</th>
                                <th>單價</th>
                                <th>小計</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($order->items as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>NT${{ $item->price }}</td>
                                    <td>NT${{ $item->quantity * $item->price }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @empty
                <p class="text-muted">目前尚無購買紀錄</p>
            @endforelse
        </div>
    </section>

</x-layouts.shop>
