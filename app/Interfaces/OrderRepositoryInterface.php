<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface OrderRepositoryInterface
{
    public function userCheckout(Request $request);

    #validation part
    public function userCheckoutValidation(Request $request);

}
