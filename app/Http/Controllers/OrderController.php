<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*$orders = Order::with('orderItems')
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('orders.index', compact('orders'));*/
        $orders = auth()->user()
            ->orders()
            ->with('items.product')
            ->latest()
            ->get();

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ① 取得購物車資料（關鍵）
        $cartItems = CartItem::where('user_id', auth()->id())->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart_items.index')
                ->with('error', '購物車是空的');
        }

        // ② 計算總金額
        $total = 0;
        foreach ($cartItems as $cartItem) {
            $total += $cartItem->quantity * $cartItem->product->price;
        }

        // ③ 建立訂單
        $order = Order::create([
            'user_id' => auth()->id(),
            'payment_method' => $request->payment_method,
            'total' => $total,
        ]);

        // ④ 建立訂單明細（重點）
        foreach ($cartItems as $cartItem) {
            $order->items()->create([
                'product_id' => $cartItem->product_id,
                'quantity'   => $cartItem->quantity,
                'price'      => $cartItem->product->price,
            ]);
        }

        // ⑤ 清空購物車
        CartItem::where('user_id', auth()->id())->delete();

        // ⑥ 回購物車頁顯示成功彈窗
        return redirect()
            ->route('cart_items.index')
            ->with('order_success', true);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('order.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
