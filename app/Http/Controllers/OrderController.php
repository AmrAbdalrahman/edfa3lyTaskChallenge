<?php

namespace App\Http\Controllers;


use App\Repositories\OrderRepository;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function checkout(Request $request)
    {

    }


}
