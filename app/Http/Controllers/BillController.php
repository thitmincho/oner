<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Bill;
use App\BillReceipt;
use App\BillServiceItem;
use Illuminate\Support\Facades\Auth;
class BillController extends Controller
{
    // get all data
    public function all()
    {
        $bills = Bill::with('billreceipt','billitem')->get();
        return $this->respond('done', $bills);
    }
    // retrieve single data
    public function get($id)
    {
        $bill = Bill::with('billreceipt','billitem.serviceitem.category')->find($id);
        if(is_null($bill)){
            return $this->respond('not_found'); 
        }   
        return $this->respond('done',$bill);
    }
    // validate and add row to db
    public function add(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'patient_id' => 'required',
            'patient_type' => 'required',
            'inpatient_care_id' => 'required',
            'emergency_care_id' => 'required',
            'appointment_id' => 'required',
            'bill_date_time' => 'required',
            'discount' => 'required',
            'tax_amount' => 'required',
            'discharge_date_time' => 'required',
            'status' => 'required',
        ]);

        try {
            $bill = $request->all();
            $bill['created_user_id'] = Auth::user()->id;
            $bill['updated_user_id'] = 0;
            Bill::insert($bill);
            //return successful response
            return $this->respond('created', $bill);
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
            'patient_type' => 'required',
            'inpatient_care_id' => 'required',
            'emergency_care_id' => 'required',
            'appointment_id' => 'required',
            'bill_date_time' => 'required',
            'discount' => 'required',
            'tax_amount' => 'required',
            'discharge_date_time' => 'required',
            'status' => 'required',
         ]);
        $bill = Bill::find($id);
        if(is_null($bill)){
            return $this->respond('not_found');
        }
        $requestData['updated_user_id'] = Auth::user()->id;
        $bill->update($request->all());
        return $this->respond('done', $bill);
    }
    // remove single row
    public function remove($id)
	{
		$bill = Bill::find($id);
		if(is_null($bill)){
            return $this->respond('not_found');
		}
		Bill::destroy($id);
        return $this->respond('removed',$bill);

	}

    
}