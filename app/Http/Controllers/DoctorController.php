<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Doctor;

class DoctorController extends Controller
{
    // get all data
    public function all()
    {
        $doctors = Doctor::all();
        return $this->respond('done', $doctors);
    }
    // retrieve single data
    public function get($id)
    {
        $doctor = Doctor::find($id);
        if(is_null($doctor)){
            return $this->respond('not_found'); 
        }   
        return $this->respond('done',$doctor);
        
        
    }
    // validate and add row to db
    public function add(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
           'name' => 'required',
           'phone' => 'required'
        ]);

        try {
            $doctor = $request->all();
            Doctor::insert($doctor);
            //return successful response
            return $this->respond('created', $doctor);
        } catch (\Exception $e) {
            //return error message
            return $this->respond('not_valid', $e);
        }
    }
    // single row update
    public function put($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required'
         ]);
        $doctor = Doctor::find($id);
        if(is_null($doctor)){
            return $this->respond('not_found');
        }
        $doctor->update($request->all());
        return $this->respond('done', $doctor);
    }
    // remove single row
    public function remove($id)
	{
		$doctor = Doctor::find($id);
		if(is_null($doctor)){
            return $this->respond('not_found');
		}
		Doctor::destroy($id);
        return $this->respond('removed',$doctor);

	}

    
}