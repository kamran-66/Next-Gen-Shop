<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\CartService;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    protected $service;

    public function __construct(CartService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request) {
    $cart = Cart::with('items.product')->where('user_id', $request->user()->id)->first();
    return response()->json($cart);
}

    // public function index(Request $req)
    // {
    //     return $req->user()->cart?->load('items.product');
    // }

    public function add(Request $req, $productId)
    {
        return $this->service->addItem($req->user(), $productId);
    }

    public function remove(Request $req, $productId)
    {
        // dd($productsId);
        return $this->service->removeItem($productId);
    }
}

