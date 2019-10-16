@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column align-items-center">
        <h1 class="text-center">{{ $employee->first_name }} {{ $employee->last_name }}</h1>
        <div>
            {!! \Octicons\Octicon::briefcase() !!}
            @can('view', $company)
                <a href="{{ route('companies.show', compact('company'), false) }}">{{ $company->name }}</a>
            @else
                <span class="text-muted">{{ $company->name }}</span>
            @endcan
        </div>
        <div>
            {!! \Octicons\Octicon::device_mobile() !!}
            <a href="tel:{{ $employee->phone }}">{{ $employee->phone }}</a>
        </div>
        <div>
            {!! \Octicons\Octicon::mail() !!}
            <a href="mailto:{{ $employee->email }}">{{ $employee->email }}</a>
        </div>
    </div>
@endsection
