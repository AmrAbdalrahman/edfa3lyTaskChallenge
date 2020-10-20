<?php

namespace App\Repositories;

use App\Interfaces\OrderRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class OrderRepository implements OrderRepositoryInterface
{
    use ApiResponseTrait;

    public function userCheckout(Request $request)
    {
        // TODO: Implement userCheckout() method.
    }

    #validation part
    public function userCheckoutValidation(Request $request)
    {
        return $this->apiValidation($request, [
            'T-shirt' => 'required|numeric|gte:0',
            'Pants' => 'required|numeric|gte:0',
            'Jacket' => 'required|numeric|gte:0',
            'Shoes' => 'required|numeric|gte:0',
            'billType' => 'required|in:USD,EGP',
        ]);
    }

}
