<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\CartItem;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Services\OrderService;


class OrderController extends Controller
{


    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    // Admin List
    public function index()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $orders = Order::with('items.product', 'user')->latest()->get();
        return view('orders.index', compact('orders'));
    }

    // Update Status
    public function update(Request $request, Order $order)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $this->orderService->updateStatus($order, $request->status);
        return back()->with('success', 'Order updated');
    }

    // Store Order
    public function store()
    {
        try {
            $user = auth()->user();
            $order = $this->orderService->checkout($user);

            return redirect()->route('products.index')->with('success', 'Order Successful! Notification sent.');
            
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

  


}