<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\ProductService;

class ProductController extends Controller
{



    // Show all products
    // public function index()
    // {
    //     $products = Product::latest()->get();
    //     return view('products.index', compact('products'));
    // }



    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

        // Index

            public function index(Request $request)
            {
                $products = $this->productService->getPaginatedProducts($request->search);
                return view('products.index', compact('products'));
            }


        // Create Products

            public function create()
            {
                return view('products.create');
            }


         // Store Products

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

                $this->productService->createProduct($data);

                return redirect()->route('products.index')->with('success', 'Product added');
            }



            // Update

            public function update(Request $request, Product $product)
            {
                $data = $request->validate([
                    'name' => 'required',
                    'description' => 'required',
                    'price' => 'required|numeric',
                    'image' => 'nullable|image'
                ]);

                if ($request->hasFile('image')) {
                    // Purani image delete karne ka logic yahan aa sakta hai
                    $data['image'] = $request->file('image')->store('products', 'public');
                }

                $this->productService->updateProduct($product, $data);

                return redirect()->route('products.index')->with('success', 'Updated');
            }


            // Delete Products

            public function destroy(Product $product)
            {
                // Admin check (Behtar hai isay Middleware ya Policy mein rakhein)
                if (!auth()->user()->is_admin) {
                    abort(403);
                }

                $this->productService->deleteProduct($product);
                return back()->with('success', 'Deleted');
            }
}