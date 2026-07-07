<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CartService;
use Exception;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    // Show cart
    public function index()
    {
        // $user->cart relationship use karein
        $cart = auth()->user()->cart;
        return view('cart.index', compact('cart'));
    }

    // Add product to cart
    public function addToCart(Request $request)
    {
        try {
            $quantity = $request->input('quantity', 1);
            
            $this->cartService->addItem(
                auth()->user(), 
                $request->product_id, 
                $quantity
            );

            return back()->with('success', 'Product added to cart!');

        } catch (Exception $e) {
            // Service se aane wala stock error yahan catch hoga
            return back()->with('error', $e->getMessage());
        }
    }

    // Remove item
    public function remove($id)
    {
        $this->cartService->removeItem($id);
        return back()->with('success', 'Item removed');
    }
}