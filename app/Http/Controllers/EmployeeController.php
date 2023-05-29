<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();

        return response()->json([
            "success" => true,
            "message" => "Employee List",
            "data"    => $employees,
        ]);
    }
/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
    public function store(Request $request)
    {
        $input     = $request->all();
        
        $validator = Validator::make($input, [
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'department_id' => 'required',
            'first_name'   => 'required',
            'last_name'   => 'required',
            'address'   => 'required',
            'zip_code' => 'required',
            'birth_date' => 'required',
            'date_hired' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => true,
                "message" => $validator->errors(),
                "data"    => [],
            ]);

        }
        
        $employee = Employee::create($input);
        
        return response()->json([
            "success" => true,
            "message" => "Employee created successfully.",
            "data"    => $employee,
        ]);
    }
/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function show($id)
    {
        $employee = Employee::find($id);

        if (is_null($employee)) {
            return response()->json([
                "success" => true,
                "message" => "Employee retrieved successfully.",
                "data"    => $employee
            ]);

        }

        return response()->json([
            "success" => true,
            "message" => "Employee retrieved successfully.",
            "data"    => $employee,
        ]);
    }
/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function update(Request $request, Employee $employee)
    {
        $input     = $request->all();
        $validator = Validator::make($input, [
            'first_name'   => 'required|min:2',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => true,
                "message" => $validator->errors(),
                "data"    => []
            ]);
        }

        $employee->first_name = $input['first_name'];
        $employee->update();

        return response()->json([
            "success" => true,
            "message" => "Employee updated successfully.",
            "data"    => $employee,
        ]);
    }
/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json([
            "success" => true,
            "message" => "Employee deleted successfully.",
            "data"    => $employee,
        ]);
    }
}
