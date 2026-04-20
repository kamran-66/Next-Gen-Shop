<?php

namespace App\Services;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductService
{
    public function create($data)
    {
        return Product::create($data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Product added');
    }


    public function update($product, $data)
    {
        $product->update($data);
        return $product;
    }
}