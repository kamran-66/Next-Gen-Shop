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



    public function index(Request $request)
{
    $search = $request->input('search');

    $products = Product::query()
        ->when($search, function ($query) use ($search) {
            $query->where(function ($q) use ($search) {
                // Purani search (Name)
                $q->where('name', 'LIKE', "%{$search}%")
                // Nayi search (Category) - Ab category se bhi search hoga
                ->orWhere('category', 'LIKE', "%{$search}%")
                // Agar aap description se bhi search karna chahte hain
                ->orWhere('description', 'LIKE', "%{$search}%");
            });
        })
        
        ->paginate(20);

    return view('products.index', compact('products'));
}

    // Show create form
    public function create()
    {
        return view('products.create');
    }



    //  protected $service;

    // public function __construct(ProductService $service)
    // {
    //     $this->service = $service;
    // }

    // public function store(Request $req)
    // {
    //     return $this->service->create($req->all());
    // }


    // ADD PRODUCTS TO CART LOGIC

        // public function addToCart(Request $request, Product $product) {
        //     $requestedQty = $request->input('quantity', 1);
            
        //     // Auth user ka cart dhoondein (Assume user login hai)
        //     $userCartId = auth()->user()->cart->id; 

        //     $cartItem = CartItem::where('cart_id', $userCartId)
        //                         ->where('product_id', $product->id)
        //                         ->first();

        //     $currentInCart = $cartItem ? $cartItem->quantity : 0;
        //     $totalNeeded = $currentInCart + $requestedQty;

        //     // Strict Stock Check
        //     if ($product->stock < $totalNeeded) {
        //         return back()->with('error', 'Sorry! Stock limit exceeded. Only ' . $product->stock . ' items available.');
        //     }

        //     if ($cartItem) {
        //         // Purane item mein plus karein
        //         $cartItem->increment('quantity', $requestedQty);
        //     } else {
        //         // Naya record banayein (Yeh wala part aapka missing tha)
        //         CartItem::create([
        //             'cart_id' => $userCartId,
        //             'product_id' => $product->id,
        //             'quantity' => $requestedQty
        //         ]);
        //     }

        //     return back()->with('success', 'Product added to cart successfully!');
        // }



    // Store product
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

    // Show edit form
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Update product
    public function update(Request $request, Product $product)
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

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Updated');
    }

    // Delete
    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Deleted');
    }
}