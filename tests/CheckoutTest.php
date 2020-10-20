<?php

class CheckoutTest extends TestCase
{
    /**
     * /api/order/checkout [POST]
     */
    public function testShouldReturnCheckoutDetails()
    {

        $parameters = [
            'T-shirt' => 3,
            'Pants' => 1,
            'Jacket' => 1,
            'Shoes' => 4,
            'billCurrency' => 'USD'
        ];

        $this->post("api/order/checkout", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJson([
            'status' => true,
            "error" => null,
        ]);
        $this->seeJsonStructure(
            ['data' =>
                [
                    '*' =>
                        'Subtotal',
                        'Taxes',
                        'Total',
                ],
                'status',
                'error'
            ]
        );

    }


}
