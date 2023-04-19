<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreemployeesRequest;
use App\Http\Requests\UpdateemployeesRequest;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $companies = Company::all();
        $employees = Employee::all();
        return view('adminComponents.employees', compact('companies', 'employees'));

        // return view('adminComponents.companies', compact('companies'));

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
    public function store(StoreemployeesRequest $request)
    {

        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateemployeesRequest $request, Employee $employees)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employees)
    {
        //
    }
}