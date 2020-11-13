<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PharmacySale;
use Illuminate\Support\Facades\Auth;

class PharmacySaleController extends Controller
{
    // get all data
    public function all()
    {
        $pharmacysales = PharmacySale::all();
        return $this->respond('done', $pharmacysales);
    }
    // retrieve single data
    public function get($id)
    {
        $pharmacysale = PharmacySale::find($id);
        if (is_null($pharmacysale)) {
            return $this->respond('not_found');
        }
        return $this->respond('done', $pharmacysale);
    }
    // validate and add row to db
    public function add(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'date' => 'required',
            'patient_id' => 'required',
            'total_amount' => 'required',
            'discount' => 'required',
            'remark' => 'required',
            'status' => 'required',
        ]);

        try {
            $pharmacysale = $request->all();
            $pharmacysale['created_user_id'] = Auth::user()->id;
            $pharmacysale['updated_user_id'] = 0;
            PharmacySale::insert($pharmacysale);
            //return successful response
            return $this->respond('created', $pharmacysale);
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
            'patient_id'=> 'required',
            'total_amount'=> 'required',
            'discount'=> 'required',
            'remark'=> 'required',
            'status'=> 'required',
        ]);
        $pharmacysale = PharmacySale::find($id);
        if (is_null($pharmacysale)) {
            return $this->respond('not_found');
        }
        $requestData['updated_user_id'] = Auth::user()->id;
        $pharmacysale->update($requestData);
        return $this->respond('done', $pharmacysale);
    }
    // remove single row
    public function remove($id)
    {
        $pharmacysale = PharmacySale::find($id);
        if (is_null($pharmacysale)) {
            return $this->respond('not_found');
        }
        PharmacySale::destroy($id);
        return $this->respond('removed', $pharmacysale);
    }
}
