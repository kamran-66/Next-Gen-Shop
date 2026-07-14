<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    protected $service;

    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }

    public function checkout(Request $req)
    {
        $req->validate([
            'shipping_address' => 'required|string',
            'phone'            => 'required|string',
            'payment_method'   => 'required|string',
        ]);

        try {
            $order = $this->service->checkout($req->user(), $req->all());

            return response()->json([
                'status'  => true,
                'message' => 'Order placed successfully!',
                'order'   => $order
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function index(Request $req)
    {
        try {
            $orders = $req->user()->orders()->with('items.product')->get();

            return response()->json([
                'status' => true,
                'orders' => $orders
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => 'Database Error: ' . $e->getMessage()
            ], 500);
        }
    }



    public function updateStatus(Request $req, $id)
    {
        
        $req->validate([
            'status' => 'required|string|in:pending,processing,shipped,completed'
        ]);

        try {
            
            $order = \App\Models\Order::findOrFail($id);

            
            $order->status = $req->status;
            $order->save();

            return response()->json([
                'status' => true,
                'message' => 'Order status updated successfully to ' . $req->status,
                'order' => $order
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Database Error: ' . $e->getMessage()
            ], 500);
        }
    }




    public function allOrders()
{
    try {
        
        $orders = \App\Models\Order::with(['user', 'items.product'])->latest()->get();

        return response()->json([
            'status' => true,
            'orders' => $orders
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'Database Error: ' . $e->getMessage()
        ], 500);
    }
}
}