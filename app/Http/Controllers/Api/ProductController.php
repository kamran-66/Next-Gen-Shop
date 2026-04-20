<?php

namespace App\Http\Controllers\Api;
use App\Services\ProductService;
use App\Http\Resources\ProductResource;

use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{
    public function index()
    {
        // Database se saari products uthayein
        $products = Product::all();

        // Inhein JSON format mein wapis bhein
        return response()->json([
            'success' => true,
            'data' => $products
        ], 200);
    }

   protected $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    // public function store(Request $req)
    // {
    //     return $this->service->create($req->all());
    // }


   public function store(Request $request)
{
    // 1. Validation
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'description' => 'nullable|string',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    // 2. Create Product
    $product = Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'stock' => $request->stock,
        'description' => $request->description,
    ]);

    // 3. Return Success JSON
    return response()->json([
        'message' => 'Product added successfully!',
        'product' => $product
    ], 201);
}



    public function show(Product $product)
    {
        return $product;
    }

    // public function update(Request $req, Product $product)
    // {
    //     $this->authorize('update', $product);
    //     $product->update($req->all());
    //     return $product;
    // }

    public function update(Request $req, Product $product)
{
    $this->authorize('update', $product);

    $product = $this->service->update($product, $req->all());

    return response()->json([
        'status' => true,
        'message' => 'Product updated',
        'data' => $product
    ]);
}

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
