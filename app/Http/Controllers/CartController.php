<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Show cart
    public function index()
    {
        $cart = auth()->user()->cart;

        return view('cart.index', compact('cart'));
    }



    //ADD TO CART 

       public function addToCart(Request $request)
    {
        // 1. Get the product or fail
        $product = Product::findOrFail($request->product_id);

        // 2. Ensure user has a cart (find existing or create new)
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);

        // 3. Get the requested quantity (default is 1)
        $requestedQty = $request->input('quantity', 1);

        // 4. Check if item is already in cart to see total quantity
        $cartItem = CartItem::where('cart_id', $cart->id)
                            ->where('product_id', $product->id)
                            ->first();

        $currentInCart = $cartItem ? $cartItem->quantity : 0;

        // 5. STOCK VALIDATION: Compare (In Cart + New Request) vs Stock
        if (($currentInCart + $requestedQty) > $product->stock) {
            return back()->with('error', 'Cannot add more. Only ' . $product->stock . ' items available.');
        }

        // 6. Final Action: Update or Create
        if ($cartItem) {
            $cartItem->increment('quantity', $requestedQty);
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => $requestedQty,
            ]);
        }

        return back()->with('success', 'Product added to cart successfully!');
    }

    // Add to cart
    public function add($id)
    {
        $user = auth()->user();

        // Get or create cart
        $cart = $user->cart ?? Cart::create([
            'user_id' => $user->id
        ]);

        // Check if product already exists
        $item = $cart->items()->where('product_id', $id)->first();

        if ($item) {
            $item->increment('quantity');
        } else {
            $cart->items()->create([
                'product_id' => $id,
                'quantity' => 1
            ]);
        }

        return back()->with('success', 'Added to cart');
    }

    // Remove item
    public function remove($id)
    {
        CartItem::findOrFail($id)->delete();

        return back()->with('success', 'Item removed');
    }
}






