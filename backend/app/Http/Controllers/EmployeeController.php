<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee= Employee::get();
        return response()->json($employee,200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {      
        // dd($request->all());    
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string',
            'address' => 'required|string',
            'salary' => 'required|string',
            'position' => 'required|string',
            'image' => '',
        ]);  

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $validated = $validator->validated();

        $employee= Employee::create($validated);
        return response()->json([
            'message' => 'Product inserted successfully',
            'employee' => $employee
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee ,$id)
    {
        $employee = Employee::findOrFail($id);
        return response()->json($employee,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

         $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string',
            'address' => 'required|string',
            'salary' => 'required|string',
            'position' => 'required|string',
            'image' => '',
        ]);  

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $validated = $validator->validated();

        $employee->update($validated);

        return response()->json([
            'message' => 'Employee Updated successfully',
            'employee' => $employee
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return response()->json([
            'message' => 'Employee deleted successfully',
        ], 201);
    }
}
