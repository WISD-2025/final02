<?php

namespace App\Http\Controllers;

use App\Models\CarItem;
use App\Http\Requests\StoreCarItemRequest;
use App\Http\Requests\UpdateCarItemRequest;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cartItems = auth()->user()->cartItems;
        $data = ['cartItems' => $cartItems,];
        return view('cart_items.index', $data);
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
    public function store(StoreCarItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CarItem $carItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CarItem $carItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarItemRequest $request, CarItem $carItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarItem $carItem)
    {
        //
    }
}
