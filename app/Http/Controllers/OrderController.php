<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return view('orders.index', compact('products'));
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
        $request->validate([

            'productname' => 'required|array',
            'product_id' => 'required|array',
            'price' => 'required|array',
            'qty' => 'required|array|min:1|max:99',
        ]);
        
        
        $productNames = $request->input('productname');
        $productIds = $request->input('product_id');
        $prices = $request->input('price');
        $quantities = $request->input('qty');

        foreach($productNames as $index => $productName){

            $order = new Order;

            $order-> productname = $productName;
            $order-> product_id = $productIds[$index];
            $order-> price = $prices[$index];
            $order-> qty = $quantities[$index];
            if($quantities[$index] > 0){

                $order->save();
            }
        }

        session()->flash('success', 'Order Completed!');

        return redirect()->route('order.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
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
    public function update(Request $request, Order $order)
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
