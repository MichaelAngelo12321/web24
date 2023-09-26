<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employeers = Employee::all();
        return EmployeeResource::collection($employeers);
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
    public function store(StoreEmployeeRequest $request)
    {
        $employee = Employee::create($request->all());
        return response()->json(['message' => 'Employee added'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return new EmployeeResource($employee);
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
    public function update(StoreEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->all());

        return response()->json(['message' => 'Employee updated'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return response()->json(['message' => 'Employee deleted'], 204);
    }
}
