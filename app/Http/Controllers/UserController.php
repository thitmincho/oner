<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function all()
    {
        $users = User::all();
        return $this->respond('done', $users);
        // return response()->json(['users' => $users, 'message' => 'Success'], 201);
    }

    public function get($id)
    {
        $user = User::find($id);
        if(is_null($user)){
            // return response()->json(['message' => 'There is no data!'], 404);   
            return $this->respond('not_found'); 
        }   
        return $this->respond('done',$user);
        // return response()->json(['user' => $user, 'message' => 'Success'], 201);       
        
        
    }
    public function put($id, Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required|string',
        ]);
        $user = User::find($id);
        if(is_null($user)){
            return $this->respond('not_found');

            // return response()->json(['message' => 'There is no data!'], 404);
        }
        $user->update($request->all());
        return $this->respond('done', $user);

        // return response()->json(['user' => $user, 'message' => 'Success'], 201);
        
    }

    public function remove($id)
	{
		$user = User::find($id);
		if(is_null($user)){
            return $this->respond('not_found');
		}
		$user::destroy($id);
        return $this->respond('removed',$user);

	}

    public function add(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'fullname' => 'required|string',
            'username' => 'required|unique:users',
            'password' => 'required|confirmed',
        ]);

        try {

            $user = new User;
            $user->fullname = $request->input('fullname');
            $user->username = $request->input('username');
            $plainPassword = $request->input('password');
            $user->password = app('hash')->make($plainPassword);
            $user->created_user_id = $request->input('created_user_id');
            $user->save();

            //return successful response
            return $this->respond('created', $user);


        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => $e], 409);
        }
    }
}