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
// API route group
$router->group([
    // 'middleware' => 'api',
    'prefix' => 'api'
], function () use ($router) {
    $router->post('register', 'AuthController@register');
    $router->post('login', 'AuthController@login');
    
    
});
// API route group
$router->group([
    'middleware' => 'auth:api',
    'prefix' => 'api'
], function () use ($router) {    
    $router->post('logout', 'AuthController@logout');
    $router->post('refresh', 'AuthController@refresh');
    $router->post('me', 'AuthController@me');

    $router->post('users', 'UserController@all');
    $router->post('users/add', 'UserController@add');
    $router->post('users/{id}', 'UserController@get');
    $router->post('users/{id}/update', 'UserController@put');
    $router->post('users/{id}/remove', 'UserController@remove');
    
});