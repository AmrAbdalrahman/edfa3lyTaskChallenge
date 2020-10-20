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
        $checkoutOutput = [];
        //get catalog item data
        $catalogItems = decodeCatalogJsonFile();
        $subtotal = $this->calculateSubTotal($request, $catalogItems);
        $taxes = round($subtotal * (14 / 100), 2);

        $checkoutOutput['Subtotal'] = priceForBillCurrency($request->billCurrency, $subtotal);
        $checkoutOutput['Taxes'] = priceForBillCurrency($request->billCurrency, $taxes);

        // the original total before discount if exists
        $total = $subtotal;

        //check for available offers now
        if (($request->Shoes > 0) || ($request['T-shirt'] > 1 && $request->Jacket > 0)) {
            $checkoutOutput['Discounts'] = [];
            //check for shoes offer
            if ($request->Shoes > 0) {
                $shoesOffer = $this->shoesOffer($request, $catalogItems);
                array_push($checkoutOutput['Discounts'], ['10% off shoes' => '-' . priceForBillCurrency($request->billCurrency, $shoesOffer)]);
                $total -= $shoesOffer;
            }

            //check for 2 t-shirts and jacket offer
            if ($request['T-shirt'] > 1 && $request->Jacket > 0) {
                $jacketOffer = $this->tShirtJacketOffer($catalogItems);
                array_push($checkoutOutput['Discounts'], ['50% off jacket' => '-' . priceForBillCurrency($request->billCurrency, $jacketOffer)]);
                $total -= $jacketOffer;
            }
        }
        $checkoutOutput['Total'] = priceForBillCurrency($request->billCurrency, $total);

        return $checkoutOutput;

    }

    public function calculateSubTotal(Request $request, $catalogItems)
    {
        $subtotal = 0;
        foreach ($request->all() as $key => $value) {

            //check first if the item is exists in the catalog data
            if (isset($catalogItems->{$key})) {
                //get dynamic item from catalog * number of items that user selected
                $calculateItemPrice = $catalogItems->{$key} * $value;
                $subtotal += $calculateItemPrice;
            }
        }

        return $subtotal;
    }

    public function shoesOffer(Request $request, $catalogItems)
    {
        return round($request->Shoes * $catalogItems->Shoes * (10 / 100), 3);
    }

    public function tShirtJacketOffer($catalogItems)
    {
        return round($catalogItems->Jacket * (50 / 100), 3);
    }


    #validation part
    public function userCheckoutValidation(Request $request)
    {
        return $this->apiValidation($request, [
            'T-shirt' => 'required|numeric|gte:0',
            'Pants' => 'required|numeric|gte:0',
            'Jacket' => 'required|numeric|gte:0',
            'Shoes' => 'required|numeric|gte:0',
            'billCurrency' => 'required|in:USD,EGP',
        ]);
    }


}
