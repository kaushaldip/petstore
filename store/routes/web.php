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
$router->get('/store/inventory' , 'V1\OrdersController@inventory');
$router->post('/store/order' , 'V1\OrdersController@createOrder');
$router->get('/store/order/{orderId}' , 'V1\OrdersController@getOrder');
$router->delete('/store/order/{orderId}' , 'V1\OrdersController@deleteOrder');