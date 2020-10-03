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
    $router->post('registers', 'AuthController@register');
    $router->post('login', 'AuthController@login');
    
    
});
// API route group
$router->group([
    'middleware' => ['auth:api','lvl'],
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
    
    $router->post('employees', 'EmployeeController@all');
    $router->post('employees/add', 'EmployeeController@add');
    $router->post('employees/{id}', 'EmployeeController@get');
    $router->post('employees/{id}/update', 'EmployeeController@put');
    $router->post('employees/{id}/remove', 'EmployeeController@remove');

    $router->post('roles', 'RoleController@all');
    $router->post('roles/add', 'RoleController@add');
    $router->post('roles/{id}', 'RoleController@get');
    $router->post('roles/{id}/update', 'RoleController@put');
    $router->post('roles/{id}/remove', 'RoleController@remove');

    $router->post('departments', 'DepartmentController@all');
    $router->post('departments/add', 'DepartmentController@add');
    $router->post('departments/{id}', 'DepartmentController@get');
    $router->post('departments/{id}/update', 'DepartmentController@put');
    $router->post('departments/{id}/remove', 'DepartmentController@remove');

    $router->post('positions', 'PositionController@all');
    $router->post('positions/add', 'PositionController@add');
    $router->post('positions/{id}', 'PositionController@get');
    $router->post('positions/{id}/update', 'PositionController@put');
    $router->post('positions/{id}/remove', 'PositionController@remove');

    $router->post('doctors', 'DoctorController@all');
    $router->post('doctors/add', 'DoctorController@add');
    $router->post('doctors/{id}', 'DoctorController@get');
    $router->post('doctors/{id}/update', 'DoctorController@put');
    $router->post('doctors/{id}/remove', 'DoctorController@remove');

    $router->post('patients', 'PatientController@all');
    $router->post('patients/add', 'PatientController@add');
    $router->post('patients/{id}', 'PatientController@get');
    $router->post('patients/{id}/update', 'PatientController@put');
    $router->post('patients/{id}/remove', 'PatientController@remove');
});