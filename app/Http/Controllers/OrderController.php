<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\CartItem;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    // Show all orders (ADMIN)
public function index()
{
    if (auth()->user()->role !== 'admin') {
        abort(403);
    }

    $orders = Order::with('items.product', 'user')->latest()->get();

    return view('orders.index', compact('orders'));
}

// Update order status
public function update(Request $request, Order $order)
{
    if (auth()->user()->role !== 'admin') {
        abort(403);
    }

    $order->update([
        'status' => $request->status
    ]);

    return back()->with('success', 'Order updated');
}



 //Store
    public function store()
    {
        $user = auth()->user();
        $cart = $user->cart;

        if (!$cart || $cart->items->isEmpty()) {
            return back()->with('error', 'Cart is empty');
        }

        // 🔥 Calculate total
        $total = 0;

        foreach ($cart->items as $item) {
            $total += $item->product->price * $item->quantity;
        }

        // 🔥 Create order
        $order = Order::create([
            'user_id' => $user->id,
            'total' => $total,
            'status' => 'pending'
        ]);

        // 🔥 Save order items
        foreach ($cart->items as $item) {
            $order->items()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }
 // 2. Loop through Cart Items to deduct stock
    $cartItems = CartItem::where('cart_id', auth()->user()->cart->id)->get();

    foreach ($cartItems as $item) {
        // --- YE LINE STOCK KAM KAREGI ---
        $product = $item->product;
        $product->decrement('stock', $item->quantity);

        // Order details save karein (order_items table mein)
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $item->product_id,
            'quantity' => $item->quantity,
            'price' => $item->product->price
        ]);
    }

    // 3. Cart khali karein
    auth()->user()->cart->items()->delete();

    return redirect()->route('products.index')->with('success', 'Order Successful! Stock Updated.');
}

  


}