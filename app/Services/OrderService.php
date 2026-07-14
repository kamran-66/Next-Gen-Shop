<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use App\Notifications\OrderPlacedNotification;

class OrderService
{
    public function checkout($user, array $data)
    {
        $cart = $user->cart;

        if (!$cart || $cart->items->isEmpty()) {
            throw new \Exception('Cart is empty cant order!');
        }

        return DB::transaction(function() use ($user, $cart, $data) {
            
            // 1. Calculate Total Bill
            $total = $cart->items->sum(function ($item) {
                return $item->product->price * $item->quantity;
            });

            // 2. Create Order Record
            $order = Order::create([
                'user_id'          => $user->id,
                'total'            => $total,
                'shipping_address' => $data['shipping_address'],
                'phone'            => $data['phone'],
                'payment_method'   => $data['payment_method'] ?? 'COD',
                'status'           => 'pending'
            ]);

            // 3. Create Order Items and Decrement Product Stock
            foreach ($cart->items as $item) {
                $order->items()->create([
                    'product_id' => $item->product_id,
                    'quantity'   => $item->quantity,
                    'price'      => $item->product->price,
                ]);

                $item->product->decrement('stock', $item->quantity);
            }

            // 4. Clear Cart Items from Database
            $cart->items()->delete();

            // 5. Send Order Notification to User
            // $user->notify(new OrderPlacedNotification($order));

            return $order;
        });
    }

    public function updateStatus(Order $order, $status)
    {
        return $order->update(['status' => $status]);
    }
}