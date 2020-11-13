<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PharmacyPurchase;
use Illuminate\Support\Facades\Auth;

class PharmacyPurchaseController extends Controller
{
    // get all data
    public function all()
    {
        $pharmacypurchases = PharmacyPurchase::all();
        return $this->respond('done', $pharmacypurchases);
    }
    // retrieve single data
    public function get($id)
    {
        $pharmacypurchase = PharmacyPurchase::find($id);
        if (is_null($pharmacypurchase)) {
            return $this->respond('not_found');
        }
        return $this->respond('done', $pharmacypurchase);
    }
    // validate and add row to db
    public function add(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'date' => 'required',
            'supplier_id' => 'required',
            'total_amount' => 'required',
            'discount' => 'required',
            'status' => 'required',
        ]);

        try {
            $pharmacypurchase = $request->all();
            $pharmacypurchase['created_user_id'] = Auth::user()->id;
            $pharmacypurchase['updated_user_id'] = 0;
            PharmacyPurchase::insert($pharmacypurchase);
            //return successful response
            return $this->respond('created', $pharmacypurchase);
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
            'date'=> 'required',
            'supplier_id'=> 'required',
            'total_amount'=> 'required',
            'discount'=> 'required',
            'status'=> 'required',
        ]);
        $pharmacypurchase = PharmacyPurchase::find($id);
        if (is_null($pharmacypurchase)) {
            return $this->respond('not_found');
        }
        $requestData['updated_user_id'] = Auth::user()->id;
        $pharmacypurchase->update($requestData);
        return $this->respond('done', $pharmacypurchase);
    }
    // remove single row
    public function remove($id)
    {
        $pharmacypurchase = PharmacyPurchase::find($id);
        if (is_null($pharmacypurchase)) {
            return $this->respond('not_found');
        }
        PharmacyPurchase::destroy($id);
        return $this->respond('removed', $pharmacypurchase);
    }
}
