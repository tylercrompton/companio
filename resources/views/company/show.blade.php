@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column align-items-center">
        <h1 class="text-center">{{ $company->name }}</h1>
        <img class="company-img order--1" src="/images/logo-default.png" alt="{{ $company->name }} logo">
        <div>
            {!! \Octicons\Octicon::mail() !!}
            <a href="mailto:{{ $company->email }}">{{ $company->email }}</a>
        </div>
        <div>
            {!! \Octicons\Octicon::globe() !!}
            <a href="{{ $company->website }}">{{ $company->website }}</a>
        </div>
        @can('viewAny', \App\Employee::class)
            <a href="{{ route('companies.employees.index', compact('company'), false) }}" class="btn btn-outline-primary mt-3">View Employees</a>
        @endcan
    </div>
@endsection
