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
        $employees = DB::table('employees')->join('companies', 'employees.company_id', '=', 'companies.id')->select('employees.id', 'employees.first_name', 'employees.last_name', 'employees.phone', 'employees.email', 'companies.name')->paginate(10);

        return view('adminComponents.employees', compact('companies', 'employees'));

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

        Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company_id' => $request->company,

        ]);

        return redirect('/dashboard/employees')->with('mssg', 'Employee created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $employee = Employee::findOrFail($id);
        $employee = DB::table('employees')->join('companies', 'employees.company_id', '=', 'companies.id')->where('employees.id', $id)->select('employees.id', 'employees.first_name', 'employees.last_name', 'employees.phone', 'employees.email', 'companies.name')->get();
        return view('adminComponents.employeesComponents.view_employee', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $companies = Company::all();

        return view('adminComponents.employeesComponents.edit_employee', compact('companies', 'employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateemployeesRequest $request, $id)
    {
        $employee = Employee::find($id);
        $employee->update($request->all());

        return redirect('/dashboard/employees')->with('mssg', 'Employee information updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect('/dashboard/employees')->with('mssg', 'Employee Deleted successfully');
    }
}