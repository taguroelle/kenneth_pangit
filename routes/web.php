<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->group(['prefix' => 'api'], function () use ($router) {
$router->get('/users',['uses' => 'UserController@getUsers']);

});

$router->post('/cusers', 'UserController@addstud'); //insert new record

$router->delete('/dusers/{id}', 'UserController@deletestudid'); // delete student record by studid

$router->put('/uusers/{id}', 'UserController@updatestudid'); // update student record by studid

$router->get('/gusers/{id}', 'UserController@getstudid'); // search student by studid

$router->get('/gusers', 'UserController@getallstud'); // view all student records