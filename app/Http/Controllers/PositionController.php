<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Position;

class PositionController extends Controller
{
    // get all data
    public function all()
    {
        $positions = Position::all();
        return $this->respond('done', $positions);
    }
    // retrieve single data
    public function get($id)
    {
        $position = Position::find($id);
        if(is_null($position)){
            return $this->respond('not_found'); 
        }   
        return $this->respond('done',$position);   
    }
    // validate and add row to db
    public function add(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
           'name' => 'required|unique:position'
        ]);

        try {
            $position = $request->all();
            Position::insert($position);
            //return successful response
            return $this->respond('created', $position);
        } catch (\Exception $e) {
            //return error message
            return $this->respond('not_valid', $e);
        }
    }
    // single row update
    public function put($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
         ]);
        $position = Position::find($id);
        if(is_null($position)){
            return $this->respond('not_found');
        }
        $position->update($request->all());
        return $this->respond('done', $position);
    }
    // remove single row
    public function remove($id)
	{
		$position = Position::find($id);
		if(is_null($position)){
            return $this->respond('not_found');
		}
		Position::destroy($id);
        return $this->respond('removed',$position);

	}

    
}