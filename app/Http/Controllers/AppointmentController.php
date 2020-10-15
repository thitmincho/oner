<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Appointment;

class AppointmentController extends Controller
{
    // get all data
    public function all()
    {
        $appointments = Appointment::all();
        return $this->respond('done', $appointments);
    }
    // retrieve single data
    public function get($id)
    {
        $appointment = Appointment::find($id);
        if(is_null($appointment)){
            return $this->respond('not_found'); 
        }   
        return $this->respond('done',$appointment);
    }
    // validate and add row to db
    public function add(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'opd_room_id' => 'required',
            'appointment_time' => 'required',
            'status' => 'required',
            'appointment_type' => 'required',
            'source' => 'required',
        ]);

        try {
            $appointment = $request->all();
            
            Appointment::insert($appointment);
            //return successful response
            return $this->respond('created', $appointment);
        } catch (\Exception $e) {
            //return error message
            return $this->respond('not_valid', $e);
        }
    }
    // single row update
    public function put($id, Request $request)
    {
        $this->validate($request, [
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'opd_room_id' => 'required',
            'appointment_time' => 'required',
            'status' => 'required',
            'appointment_type' => 'required',
            'source' => 'required',
        ]);
        $appointment = Appointment::find($id);
        if(is_null($appointment)){
            return $this->respond('not_found');
        }
        $appointment->update($request->all());
        return $this->respond('done', $appointment);
    }
    // remove single row
    public function remove($id)
	{
		$appointment = Appointment::find($id);
		if(is_null($appointment)){
            return $this->respond('not_found');
		}
		Appointment::destroy($id);
        return $this->respond('removed',$appointment);
	}
}