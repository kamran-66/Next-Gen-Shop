<?php

namespace App\Services;

use App\Models\Cart;

class CartService
{
    public function add($user, $productId)
    {
        $cart = $user->cart ?? Cart::create(['user_id' => $user->id]);

        $item = $cart->items()->where('product_id', $productId)->first();

        if ($item) {
            $item->increment('quantity');
        } else {
            $cart->items()->create([
                'product_id' => $productId,
                'quantity' => 1
            ]);
        }

        return $cart->load('items.product');
    }

    public function remove($user, $productId)
    {
        $cart = $user->cart;

        $cart->items()->where('product_id', $productId)->delete();

        return $cart->load('items.product');
    }
}