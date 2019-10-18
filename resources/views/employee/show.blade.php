@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column align-items-center">
        <h1 class="text-center">{{ $employee->first_name }} {{ $employee->last_name }}</h1>

        @can('update', $employee)
            <a href="{{ route('companies.employees.edit', compact('company', 'employee'), false) }}" class="btn btn-primary mb-3">{{ __('Edit') }}</a>
        @endcan

        <div>
            {!! \Octicons\Octicon::briefcase() !!}
            @can('view', $company)
                <a href="{{ route('companies.show', compact('company'), false) }}">{{ $company->name }}</a>
            @else
                <span class="text-muted">{{ $company->name }}</span>
            @endcan
        </div>

        @isset($employee->phone)
            <div>
                {!! \Octicons\Octicon::device_mobile() !!}
                <a href="tel:{{ $employee->phone }}">{{ $employee->phone }}</a>
            </div>
        @endisset

        @isset($employee->email)
            <div>
                {!! \Octicons\Octicon::mail() !!}
                <a href="mailto:{{ $employee->email }}">{{ $employee->email }}</a>
            </div>
        @endisset

        @can('delete', $company)
            {{-- TODO: Fix confirmation dialog --}}
            {!! Form::model($employee, ['class' => 'mt-3', 'id' => 'deleteForm', 'method' => 'delete', 'route' => ['companies.employees.destroy', 'company' => $company, 'employee' => $employee]]) !!}
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
                        Are you sure that you want to delete {{ $employee->first_name }} {{ $employee->last_name }}?
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
