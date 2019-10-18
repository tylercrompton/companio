@extends('layouts.app')

@section('content')
    <h1>{{ __('Edit Employee') }}</h1>

    {!! Form::model($employee, ['files' => true, 'method' => 'put', 'route' => ['companies.employees.update', 'company' => $company, 'employee' => $employee]]) !!}
        <div class="form-group">
            {!! Form::label('first_name', __('First Name')) !!}
            {!! Form::text('first_name', null, ['class' => 'form-control', 'maxlength' => '30', 'placeholder' => $employee->first_name]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('last_name', __('Last Name')) !!}
            {!! Form::text('last_name', null, ['class' => 'form-control', 'maxlength' => '30', 'placeholder' => $employee->last_name]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', __('Email Address')) !!}
            {!! Form::email('email', null, ['class' => 'form-control', 'maxlength' => '254', 'placeholder' => __('Email Address')]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('phone', __('Phone Number')) !!}
            {!! Form::tel('phone', null, ['class' => 'form-control', 'maxlength' => '16', 'placeholder' => __('Phone Number')]) !!}
        </div>

        {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
