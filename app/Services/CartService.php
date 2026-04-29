<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Product;
use Exception;

class CartService
{
    public function addItem($user, $productId, $quantity = 1)
    {
        $product = Product::findOrFail($productId);
        
        // 1. Cart Search or Create
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        // 2. Check karein ke item pehle se cart mein hai?
        $cartItem = $cart->items()->where('product_id', $productId)->first();
        $currentInCart = $cartItem ? $cartItem->quantity : 0;

        // 3. STOCK VALIDATION (Handle Service)
        if (($currentInCart + $quantity) > $product->stock) {
            throw new Exception('Cannot add more. Only ' . $product->stock . ' items in stock.');
        }

        // 4. Update or Create
        if ($cartItem) {
            $cartItem->increment('quantity', $quantity);
        } else {
            $cart->items()->create([
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }

        return $cart->load('items.product');
    }

    public function removeItem($cartItemId)
    {
        // CartItem ID se delete karna behtar hai
        return \App\Models\CartItem::where('id', $cartItemId)->delete();
    }
}