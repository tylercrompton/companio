@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-start">
        <div>
            <h1>{{ __('Employees') }}</h1>
            <h2 class="h4 text-muted">{{ $company->name }}</h2>
        </div>
        @can('create', \App\Employee::class)
            <a href="{{ route('companies.employees.create', compact('company'), false) }}" class="btn btn-primary">{{ __('Add') }}</a>
        @endcan
    </div>

    @if($employees->isEmpty())
        <p class="container">{{ __('No employees were found.') }}</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" class="d-none d-sm-table-cell">{{ __('Last Name') }}</th>
                    <th scope="col" class="d-none d-sm-table-cell">{{ __('First Name') }}</th>
                    <th scope="col" class="d-sm-none">{{ __('Name') }}</th>
                    <th scope="col">{{ __('Phone Number') }}</th>
                    <th scope="col" class="d-none d-md-table-cell">{{ __('Email Address') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td class="position-relative d-none d-sm-table-cell">
                            @can('view', $employee)
                                <a href="{{ route('companies.employees.show', compact('company', 'employee'), false) }}" class="stretched-link last-name">{{ $employee->last_name }}</a>
                            @else
                                {{ $employee->last_name }}
                            @endcan
                        </td>
                        <td class="position-relative d-none d-sm-table-cell">
                            @can('view', $employee)
                                <a href="{{ route('companies.employees.show', compact('company', 'employee'), false) }}" class="stretched-link first-name">{{ $employee->first_name }}</a>
                            @else
                                {{ $employee->first_name }}
                            @endcan
                        </td>
                        <td class="position-relative d-sm-none">
                            @can('view', $employee)
                                <a href="{{ route('companies.employees.show', compact('company', 'employee'), false) }}" class="stretched-link">{{ $employee->last_name }}, {{ $employee->first_name }}</a>
                            @else
                                {{ $employee->last_name }}, {{ $employee->first_name }}
                            @endcan
                        </td>
                        <td class="position-relative"><a href="tel:{{ $employee->phone }}" class="stretched-link">{{ $employee->phone }}</a></td>
                        <td class="position-relative d-none d-md-table-cell"><a href="mailto:{{ $employee->email }}" class="stretched-link">{{ $employee->email }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $employees->links() }}
    @endif
@endsection
