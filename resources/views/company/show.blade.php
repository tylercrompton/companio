@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column align-items-center">
        <h1 class="text-center">{{ $company->name }}</h1>

        <img class="company-img order--1" src="{{ $company->logo_path ? Storage::url($company->logo_path) : '/images/logo-default.png' }}" alt="{{ $company->name }} logo">

        @can('update', $company)
            <a href="{{ route('companies.edit', compact('company'), false) }}" class="btn btn-primary mb-3">{{ __('Edit') }}</a>
        @endcan

        @isset($company->email)
            <div>
                {!! \Octicons\Octicon::mail() !!}
                <a href="mailto:{{ $company->email }}">{{ $company->email }}</a>
            </div>
        @endisset

        @isset($company->website)
            <div>
                {!! \Octicons\Octicon::globe() !!}
                <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a>
            </div>
        @endisset

        @can('viewAny', \App\Employee::class)
            <a href="{{ route('companies.employees.index', compact('company'), false) }}" class="btn btn-outline-primary mt-3">View Employees</a>
        @endcan

        @can('delete', $company)
            {{-- TODO: Fix confirmation dialog --}}
            {!! Form::model($company, ['class' => 'mt-3', 'id' => 'deleteForm', 'method' => 'delete', 'route' => ['companies.destroy', 'company' => $company]]) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger']) !!}
            {!! Form::close() !!}
        @endcan
    </div>

    @can('delete', $company)
        <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title h5" id="confirmationModalLabel">Confirm Deletion</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure that you want to delete {{ $company->name }}?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" id="confirmationButton" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    @endcan
@endsection
