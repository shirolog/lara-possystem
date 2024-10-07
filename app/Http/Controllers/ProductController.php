<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = Product::with('category', 'brand')->get();

        $categories = Category::all();

        $brands = Brand::all();

        return view('product.index', compact('products', 'categories', 'brands'));
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

            'productname' => 'required|string|max:255',
            'cat_id' => 'required',
            'brand_id' => 'required',
            'price' => 'required|numeric',
        ]);

        $product = new Product;

        $product-> productname = $request->input('productname');
        $product-> cat_id = $request->input('cat_id');
        $product-> brand_id = $request->input('brand_id');
        $product-> price = $request->input('price');
        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {   
        $categories = Category::all();

        $brands = Brand::all();

        return view('product.edit', compact('product', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([

            'productname' => 'required|string|max:255',
            'cat_id' => 'required',
            'brand_id' => 'required',
            'price' => 'required|numeric',
        ]);

        $product-> productname = $request->input('productname');
        $product-> cat_id = $request->input('cat_id');
        $product-> brand_id = $request->input('brand_id');
        $product-> price = $request->input('price');
        $product->save();

        return redirect()->route('product.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
