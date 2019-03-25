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

$router->post('/pet' , 'V1\PetsController@createPet');
$router->get('/pet/findByStatus' , 'V1\PetsController@findByStatus');
$router->get('/pet/{petId}' , 'V1\PetsController@findById');
$router->post('/pet/{petId}' , 'V1\PetsController@updatePet');
$router->delete('/pet/{petId}' , 'V1\PetsController@deletePet');