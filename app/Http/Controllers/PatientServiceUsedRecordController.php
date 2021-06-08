<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PatientServiceUsedRecord;
use Illuminate\Support\Facades\Auth;

class PatientServiceUsedRecordController extends Controller
{
    // get all data
    public function all()
    {
        $psurs = PatientServiceUsedRecord::with('patient')->get();
        return $this->respond('done', $psurs);
    }
    // retrieve single data
    public function get($id)
    {
        $psur = PatientServiceUsedRecord::with('patient')->find($id);
        if (is_null($psur)) {
            return $this->respond('not_found');
        }
        return $this->respond('done', $psur);
    }
    // validate and add row to db
    public function add(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'patient_id' => 'required',
        ]);

        try {
            $psur = $request->all();
            $psur['created_user_id'] = Auth::user()->id;
            $psur['updated_user_id'] = 0;
            PatientServiceUsedRecord::insert($psur);
            //return successful response
            return $this->respond('created', $psur);
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
            'patient_id' => 'required',
        ]);
        $psur = PatientServiceUsedRecord::find($id);
        if (is_null($psur)) {
            return $this->respond('not_found');
        }
        $requestData['updated_user_id'] = Auth::user()->id;
        $psur->update($requestData);
        return $this->respond('done', $psur);
    }
    // remove single row
    public function remove($id)
    {
        $psur = PatientServiceUsedRecord::find($id);
        if (is_null($psur)) {
            return $this->respond('not_found');
        }
        PatientServiceUsedRecord::destroy($id);
        return $this->respond('removed', $psur);
    }
    public function getallopen($pid){
        $psurs = PatientServiceUsedRecord::with('patient','service_item')->where('patient_id',$pid)->where('status','open')->get();
        return $this->respond('done', $psurs);
    }    
}
