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
        
       
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

       
        $cartItem = $cart->items()->where('product_id', $productId)->first();
        $currentInCart = $cartItem ? $cartItem->quantity : 0;

        
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

    // public function removeItem($cartItemId)
    // {
    //     // CartItem ID se delete karna behtar hai
    //     return \App\Models\CartItem::where('id', $cartItemId)->delete();
    // }

  public function removeItem($productId)
{
    // چونکہ ٹیبل میں user_id نہیں ہے، ہم براہِ راست product_id کو میچ کر کے ڈیلیٹ کریں گے
    $deleted = \App\Models\CartItem::where('product_id', $productId)->delete();

    if ($deleted) {
        return response()->json([
            'status' => true, 
            'message' => 'Item successfully removed from database'
        ]);
    }

    return response()->json([
        'status' => false, 
        'message' => 'Item not found in database'
    ], 404);
}

}