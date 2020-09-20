<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    protected $statusCodes = [
		'done' => [ 'status'=> 200 , 'message'=> 'Done'],
		'created' => [ 'status'=> 201 , 'message' => 'Created'],
		'removed' => [ 'status'=> 200 , 'message' => 'Removed'],
		'not_valid' => [ 'status'=> 400 , 'message' => 'Not Valid'],
		'not_found' => [ 'status'=> 404 , 'message' => 'Not Found'],
		'conflict' => [ 'status'=> 409 , 'message' => 'Conflit'],
		'permissions' => [ 'status'=> 401 , 'message' => 'Permission'],
	];
    
    protected function respondWithToken($token)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ], 200);
    }
    protected function respond($status, $data = [])
    {
    	return response()->json([ 'data'=>$data,'message'=>$this->statusCodes[$status]['message'] ], $this->statusCodes[$status]['status']);
    }
}
