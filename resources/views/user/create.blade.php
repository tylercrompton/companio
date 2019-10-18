@extends('layouts.app')

@section('content')
    <h1>{{ __('Add User') }}</h1>

    {!! Form::model(\App\User::make(), ['route' => 'users.store']) !!}
        <div class="form-group">
            {!! Form::label('name', __('Name')) !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => '100', 'placeholder' => __('Name'), 'required' => 'required']) !!}
        </div>

        <div class="form-group">
            {{-- The server will completely ignore this field. This is strictly for informational purposes, but the code is here should the functionality be desired later. --}}
            {!! Form::label('role', __('Role')) !!}
            {!! Form::select('size', [\App\UserRole::admin => __('Administrator'), \App\UserRole::manager => __('Manager'), \App\UserRole::user => __('User')], \App\UserRole::manager, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', __('Email Address')) !!}
            {!! Form::email('email', null, ['class' => 'form-control', 'maxlength' => '254', 'placeholder' => __('Email Address'), 'required' => 'required']) !!}
        </div>

        <p class="form-group">Upon creation, the user will receive an email to set their password.</p>

        {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
