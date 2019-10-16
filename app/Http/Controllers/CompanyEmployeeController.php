<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;

class CompanyEmployeeController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Employee::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function index(Company $company)
    {
        return view(
            'employee.index',
            [
                'company' => $company,
                'employees' => $company->employees()->paginate(10),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function create(Company $company)
    {
        return view('employee.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Company $company)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  Company  $company
     * @param  Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company, Employee $employee)
    {
        return view('employee.show', compact('company', 'employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Company  $company
     * @param  Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company, Employee $employee)
    {
        return view('employee.edit', compact('company', 'employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Company  $company
     * @param  Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Company  $company
     * @param  Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company, Employee $employee)
    {
        //
    }
}
