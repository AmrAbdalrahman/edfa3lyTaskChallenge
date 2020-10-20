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
        $validation = $this->orderRepository->userCheckoutValidation($request);
        if ($validation) {
            return $validation;
        }

        $checkoutItem = $this->orderRepository->userCheckout($request);
        return $this->apiResponse($checkoutItem);
    }


}
