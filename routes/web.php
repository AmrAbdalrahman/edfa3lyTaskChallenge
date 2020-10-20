<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


//Grouping All Routes The Under API Prefix
$router->group(['prefix' => 'api'], function () use ($router) {

    /*************************** Start of orders routes ***************************/
    $router->group(['prefix' => 'order'], function () use ($router) {
        $router->post('/checkout', 'OrderController@checkout');
    });
    /*************************** End of orders routes ***************************/

});
