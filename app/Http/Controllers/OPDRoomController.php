<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\OPDRoom;
use Illuminate\Support\Facades\Auth;

class OPDRoomController extends Controller
{
    // get all data
    public function all()
    {
        $opdrooms = OPDRoom::with('doctor','appointment')->get();
        return $this->respond('done', $opdrooms);
    }
    // retrieve single data
    public function get($id)
    {
        $opdroom = OPDRoom::with('doctor','appointment')->find($id);
        if(is_null($opdroom)){
            return $this->respond('not_found'); 
        }   
        return $this->respond('done',$opdroom);
    }
    // validate and add row to db
    public function add(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
           'name' => 'required',
           'location' => 'required',
           'current_doctor_id' => 'required'
        ]);

        try {
            $opdroom = $request->all();
            // $opdroom['created_user_id'] = Auth::user()->id;
            // $opdroom['updated_user_id'] = 0;

            OPDRoom::insert($opdroom);
            //return successful response
            return $this->respond('created', $opdroom);
        } catch (\Exception $e) {
            //return error message
            return $this->respond('not_valid', $e);
        }
    }
    // single row update
    public function put($id, Request $request)
    {
        $requestData = $request->all();
        $this->validate($request, [
            'name' => 'required',
            'location' => 'required',
            'current_doctor_id' => 'required'
         ]);
        $opdroom = OPDRoom::find($id);
        if(is_null($opdroom)){
            return $this->respond('not_found');
        }
        // $requestData['updated_user_id'] = Auth::user()->id;
        $opdroom->update($requestData);
        return $this->respond('done', $opdroom);
    }
    // remove single row
    public function remove($id)
	{
		$opdroom = OPDRoom::find($id);
		if(is_null($opdroom)){
            return $this->respond('not_found');
		}
		OPDRoom::destroy($id);
        return $this->respond('removed',$opdroom);

	}

    
}