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
       // TODO: Implement userCheckoutValidation() method.
   }


}
