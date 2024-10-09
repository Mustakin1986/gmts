<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product= Product::get();
        return response()->json($product,200);
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
        
        // dd($request->all());    
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);  

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $validated = $validator->validated();

        $product= Product::create($validated);
        // $product = new Product();
        // $product->name = $validated['name'];
        // $product->price = $validated['price'];
        // $product->save();

        return response()->json([
            'message' => 'Product inserted successfully',
            'product' => $product
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product, $id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

         $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);  

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $validated = $validator->validated();

        $product->update($validated);

        return response()->json([
            'message' => 'Product inserted successfully',
            'product' => $product
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json([
            'message' => 'Product deleted successfully',
        ], 201);
    }
}
