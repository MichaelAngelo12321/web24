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

//        DB::beginTransaction();
//
//        try {
//            // Utwórz firmę
//            $company = Company::create([
//                'name' => $request->input('company_name'),
//                'nip' => $request->input('company_nip'),
//                'adres' => $request->input('company_adres'),
//                'miasto' => $request->input('company_miasto'),
//                'kod_pocztowy' => $request->input('company_kod_pocztowy'),
//            ]);
//
//            // Utwórz pracownika i powiąż go z firmą
//            $employee = new Employee([
//                'imie' => $request->input('employee_imie'),
//                'nazwisko' => $request->input('employee_nazwisko'),
//                'email' => $request->input('employee_email'),
//                'numer_telefonu' => $request->input('employee_numer_telefonu'),
//            ]);
//
//            $company->employees()->save($employee);
//
//            // Zatwierdź transakcję
//            DB::commit();
//
//            // Zwróć odpowiedź sukcesu
//            return response()->json(['message' => 'Firma i pracownik zostali utworzeni.'], 201);
//        } catch (\Exception $e) {
//            // W przypadku błędu, wycofaj transakcję
//            DB::rollback();
//
//            // Zwróć odpowiedź z błędem
//            return response()->json(['message' => 'Wystąpił błąd podczas tworzenia firmy i pracownika.'], 500);
//        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
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
//        $company->update($request->all());
//
//        return new CompanyResource($company);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
//        $company->delete();
//
//        return response(null, 204);
    }
}
