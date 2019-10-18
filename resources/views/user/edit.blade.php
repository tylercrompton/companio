@extends('layouts.app')

@section('content')
    <h1>{{ __('Edit User') }}</h1>

    {!! Form::model($user, ['method' => 'put', 'route' => ['users.update', 'user' => $user]]) !!}
        <div class="form-group">
            {!! Form::label('name', __('Name')) !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => '100', 'placeholder' => $user->name]) !!}
        </div>

        <div class="form-group">
            {{-- The server will completely ignore this field. This is strictly for informational purposes, but the code is here should the functionality be desired later. --}}
            {!! Form::label('role', __('Role')) !!}
            {!! Form::select('size', [\App\UserRole::admin => __('Administrator'), \App\UserRole::manager => __('Manager'), \App\UserRole::user => __('User')], null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', __('Email Address')) !!}
            {!! Form::email('email', null, ['class' => 'form-control', 'maxlength' => '254', 'placeholder' => $user->email]) !!}
        </div>

        {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
