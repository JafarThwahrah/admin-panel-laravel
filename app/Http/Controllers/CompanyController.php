<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = DB::table('companies')->paginate(10);

        return view('adminComponents.companies', compact('companies'));
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
        $logo_name = null;
        if ($request->file('logo') !== null) {
            $logo = $request->file('logo');
            $logo_name = rand() . "." . $logo->getClientOriginalExtension();
            $logo->move('C:\Users\tr.jafar.thwahrah\Desktop\code\Laravel Task\admin-panel-laravel\storage\app\public', $logo_name);
        }
        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $logo_name,
        ]);

        return redirect('/dashboard')->with('mssg', 'Company created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $company = Company::findOrFail($id);

        return view('adminComponents.companiesComponents.view_company', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $company = Company::find($id);

        return view('adminComponents.companiesComponents.edit_company', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, $id)
    {
        $company = Company::find($id);

        if ($request->file('logo')) {

            $logo = $request->file('logo');
            $logo_name = rand() . "." . $logo->getClientOriginalExtension();
            $logo->move('C:\Users\tr.jafar.thwahrah\Desktop\code\Laravel Task\admin-panel-laravel\storage\app\public', $logo_name);

            $company->update([
                'name' => $request->name,
                'email' => $request->email,
                'website' => $request->website,
                'logo' => $logo_name,
            ]);
        } else {
            $company->update($request->all());
        }
        return redirect('/dashboard')->with('mssg', 'Company information updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();

        return redirect('/dashboard')->with('mssg', 'Company deleted successfully');

    }
}