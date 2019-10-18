<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\Http\Requests\StoreCompanyEmployeeRequest;
use App\Http\Requests\UpdateCompanyEmployeeRequest;

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
     * @param  StoreCompanyEmployeeRequest  $request
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyEmployeeRequest $request, Company $company)
    {
        $validated = $request->validated();

        $employee = Employee::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'company_id' => $company->id,
            'email' => $validated['email'],
            'phone' => $validated['phone'],
        ]);

        return redirect()->route('companies.employees.show', compact('company', 'employee'));
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
     * @param  UpdateCompanyEmployeeRequest  $request
     * @param  Company  $company
     * @param  Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyEmployeeRequest $request, Company $company, Employee $employee)
    {
        $validated = $request->validated();

        if (array_key_exists('first_name', $validated) && !is_null($validated['first_name'])) {
            $employee->first_name = $validated['first_name'];
        }

        if (array_key_exists('last_name', $validated) && !is_null($validated['last_name'])) {
            $employee->last_name = $validated['last_name'];
        }

        if (array_key_exists('email', $validated)) {
            $employee->email = $validated['email'];
        }

        if (array_key_exists('phone', $validated)) {
            $employee->phone = $validated['phone'];
        }

        $employee->save();

        return redirect()->route('companies.employees.show', compact('company', 'employee'));
    }

    /** @noinspection PhpDocMissingThrowsInspection */
    /**
     * Remove the specified resource from storage.
     *
     * @param  Company  $company
     * @param  Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company, Employee $employee)
    {
        /** @noinspection PhpUnhandledExceptionInspection */
        $employee->delete();

        return redirect()->route('companies.employees.index', compact('company'));
    }
}
