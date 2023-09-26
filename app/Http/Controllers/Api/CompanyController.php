<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::with('employeers')->get();
        return CompanyResource::collection($companies);
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
    public function store(StoreCompanyRequest $request)
    {

        $companyData = $request->all();

        $company = Company::create($companyData);

        // Dodaj pracowników do firmy, jeśli są przesłani w żądaniu
        if ($request->has('employees')) {
            $employeesData = $request->input('employees');
            foreach ($employeesData as $employeeData) {
                $employee = $company->employeers()->create($employeeData);
            }
        }

        return response()->json(['message' => 'Company added'], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return new CompanyResource($company);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCompanyRequest $request, Company $company)
    {
        $company->update($request->all());

        return response()->json(['message' => 'Company update'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return response()->json(['message' => 'Company deleted'], 204);
    }
}

