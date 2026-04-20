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
        return $this->service->checkout($req->user());
    }

    public function index(Request $req)
    {
        return $req->user()->orders()->with('items.product')->get();
    }
}