<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\PharmacyInventoryTransaction;
use Illuminate\Support\Facades\Auth;

class PharmacyInventoryTransactionController extends Controller
{
    // get all data
    public function all()
    {
        $pinventorytransactions = PharmacyInventoryTransaction::all();
        return $this->respond('done', $pinventorytransactions);
    }
    // retrieve single data
    public function get($id)
    {
        $pinventorytransaction = PharmacyInventoryTransaction::find($id);
        if(is_null($pinventorytransaction)){
            return $this->respond('not_found'); 
        }   
        return $this->respond('done',$pinventorytransaction);
    }
    // validate and add row to db
    public function add(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'pharmacy_item_id'=> 'required',
            'transaction_type'=> 'required',
            'quantity'=> 'required',
            'moving_average_price'=> 'required',
            'purchasing_price'=> 'required',
            'selling_price'=> 'required',
            'opening_balance'=> 'required',
            'closing_balance'=> 'required',
            'expired_date'=> 'required',
            'note'=> 'required',
            
        ]);

        try {
            $pinventorytransaction = $request->all();
            $pinventorytransaction['created_user_id'] = Auth::user()->id;
            $pinventorytransaction['updated_user_id'] = 0;
            PharmacyInventoryTransaction::insert($pinventorytransaction);
            //return successful response
            return $this->respond('created', $pinventorytransaction);
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
            'pharmacy_item_id'=> 'required',
            'transaction_type'=> 'required',
            'quantity'=> 'required',
            'moving_average_price'=> 'required',
            'purchasing_price'=> 'required',
            'selling_price'=> 'required',
            'opening_balance'=> 'required',
            'closing_balance'=> 'required',
            'expired_date'=> 'required',
            'note'=> 'required',
            
        ]);
        $pinventorytransaction = PharmacyInventoryTransaction::find($id);
        if(is_null($pinventorytransaction)){
            return $this->respond('not_found');
        }
        $requestData['updated_user_id'] = Auth::user()->id;
        $pinventorytransaction->update($requestData);
        return $this->respond('done', $pinventorytransaction);
    }
    // remove single row
    public function remove($id)
	{
		$pinventorytransaction = PharmacyInventoryTransaction::find($id);
		if(is_null($pinventorytransaction)){
            return $this->respond('not_found');
		}
		PharmacyInventoryTransaction::destroy($id);
        return $this->respond('removed',$pinventorytransaction);
	}
}