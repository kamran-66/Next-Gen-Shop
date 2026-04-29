<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use App\Notifications\OrderPlacedNotification;
use Illuminate\Support\Facades\DB;

class OrderService
{
    public function checkout($user)
    {
        $cart = $user->cart;

        if (!$cart || $cart->items->isEmpty()) {
            throw new \Exception('Cart is empty');
        }

        // DB Transaction start (For Safety)
        return DB::transaction(function () use ($user, $cart) {
            
            // 1. Total Calculate
            $total = $cart->items->sum(function ($item) {
                return $item->product->price * $item->quantity;
            });

            // 2. Order Create
            $order = Order::create([
                'user_id' => $user->id,
                'total'   => $total,
                'status'  => 'pending'
            ]);

            // 3. Items Transfer & Stock Management
            foreach ($cart->items as $item) {
                // Order Item save
                $order->items()->create([
                    'product_id' => $item->product_id,
                    'quantity'   => $item->quantity,
                    'price'      => $item->product->price,
                ]);

                // Stock kam karein
                $item->product->decrement('stock', $item->quantity);
            }

            // 4. Delete Cart Items
            $cart->items()->delete();

            // 5. Send Notification
            $user->notify(new OrderPlacedNotification($order));

            return $order;
        });
    }

    public function updateStatus(Order $order, $status)
    {
        return $order->update(['status' => $status]);
    }
}