<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    
    public function all()
    {
        $employees = Employee::all();
        return $this->respond('done', $employees);
    }

    public function get($id)
    {
        $employee = Employee::find($id);
        if(is_null($employee)){
            return $this->respond('not_found'); 
        }   
        return $this->respond('done',$employee);
        
        
    }
    public function add(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'employee_identification_number' => 'required|unique:employee',
            'name' => 'required',
            'gender' => 'required',
            'tax_id' => 'required',
            'passport_number' => 'required|unique:employee',
            'position_id' => 'required',
            'department_id' => 'required',
        ]);

        try {

            $employee = $request->all();
            Employee::insert($employee);

            //return successful response
            return $this->respond('created', $employee);
        } catch (\Exception $e) {
            //return error message
            return $this->respond('not_valid', $e);
        }
    }
    public function put($id, Request $request)
    {
        $this->validate($request, [
            'employee_identification_number' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'tax_id' => 'required',
            'passport_number' => 'required',
            'position_id' => 'required',
            'department_id' => 'required',
        ]);
        $employee = Employee::find($id);
        if(is_null($employee)){
            return $this->respond('not_found');
        }
        $employee->update($request->all());
        return $this->respond('done', $employee);

        
    }

    public function remove($id)
	{
		$employee = Employee::find($id);
		if(is_null($employee)){
            return $this->respond('not_found');
		}
		Employee::destroy($id);
        return $this->respond('removed',$employee);

	}

    
}