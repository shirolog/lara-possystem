<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();

        return view('brand.index', compact('brands'));
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

            'brandname' => 'required',
            'status' => 'required|boolean',
        ]);

        $brand = new Brand;

        $brand -> brandname = $request-> input('brandname');
        $brand -> status = $request-> input('status');
        $brand->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([

            'brandname' => 'required',
            'status' => 'required|boolean',
        ]);

        $brand -> brandname = $request->input('brandname');
        $brand -> status = $request->input('status');
        $brand->save();

        return redirect()->route('brand.index')
        ->with('flash_message', 'Brand Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('brand.index');
    }
}
