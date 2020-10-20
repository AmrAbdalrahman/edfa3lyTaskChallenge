<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface OrderRepositoryInterface
{
    public function userCheckout(Request $request);
    public function calculateSubTotal(Request $request,$catalogItems);

    #validation part
    public function userCheckoutValidation(Request $request);

}
