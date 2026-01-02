<?php

namespace App\Http\Controllers;
use App\Models\Product; 

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'index';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'create';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 'store';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $product)
    {
        return 'show ' . $product;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $product)
    {
        return 'edit ' . $product;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $product)
    {
        return 'update';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $product)
    {
        return 'destroy';
    }

    public function shop()
    {
        $products = Product::all();
        return view('shop.index', compact('products'));
    }

    public function item(Product $product)
    {
        return view('shop.item', compact('product'));
    }
}
