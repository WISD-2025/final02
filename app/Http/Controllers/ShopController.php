<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ShopController extends Controller
{
    public function index()
    {
        $sweetProducts = Product::where('type', '甜')->get();
        $savoryProducts = Product::where('type', '鹹')->get();

        return view('shop.index', compact('sweetProducts', 'savoryProducts'));
    }
}
