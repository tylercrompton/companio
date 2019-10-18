<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\UserRole;
use Storage;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Company::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role === UserRole::admin) {
            $companies = Company::paginate(10);
        } else {
            $companies = auth()->user()->companies()->paginate(10);
        }

        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $validated = $request->validated();

        $logo_path = null;

        if ($request->hasFile('logo')) {
            $logo_path = $request->file('logo')->store('public');
        }

        $company = Company::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'website' => $validated['website'],
            'logo_path' => $logo_path,
        ]);

        return redirect()->route('companies.show', compact('company'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCompanyRequest  $request
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $validated = $request->validated();

        if (array_key_exists('name', $validated) && !is_null($validated['name'])) {
            $company->name = $validated['name'];
        }

        if (array_key_exists('email', $validated)) {
            $company->email = $validated['email'];
        }

        if (array_key_exists('website', $validated)) {
            $company->website = $validated['website'];
        }

        if ($request->hasFile('logo')) {
            if (!is_null($company->logo_path)) {
                // We don't particularly care if this fails, so we'll just suppress any errors pertaining to this.
                @Storage::delete($company->logo_path);
            }

            $company->logo_path = $request->file('logo')->store('public');
        }

        $company->save();

        return redirect()->route('companies.show', compact('company'));
    }

    /** @noinspection PhpDocMissingThrowsInspection */
    /**
     * Remove the specified resource from storage.
     *
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        /** @noinspection PhpUnhandledExceptionInspection */
        $company->delete();

        return redirect()->route('companies.index');
    }
}
