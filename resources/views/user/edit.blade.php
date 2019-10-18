@extends('layouts.app')

@section('content')
    <h1>{{ __('Edit User') }}</h1>

    {!! Form::model($user, ['method' => 'put', 'route' => ['users.update', 'user' => $user]]) !!}
        <div class="form-group">
            {!! Form::label('name', __('Name')) !!}
            {!! Form::text(
                'name',
                null,
                [
                    'class' => 'form-control' . ($errors->any() ? ($errors->has('name') ? ' is-invalid' : ' is-valid') : ''),
                    'maxlength' => '100',
                    'placeholder' => $user->name,
                ]
            ) !!}
            @if($errors->has('name'))
                <div class="invalid-feedback">{{ implode(' ', $errors->get('name')) }}</div>
            @else
                <div class="valid-feedback">Looks good!</div>
            @endif
        </div>

        <div class="form-group">
            {{-- The server will completely ignore this field. This is strictly for informational purposes, but the code is here should the functionality be desired later. --}}
            {!! Form::label('role', __('Role')) !!}
            {!! Form::select(
                'role',
                [
                    \App\UserRole::admin => __('Administrator'),
                    \App\UserRole::manager => __('Manager'),
                    \App\UserRole::user => __('User'),
                ],
                \App\UserRole::manager,
                [
                    'class' => 'form-control' . ($errors->any() ? ($errors->has('role') ? ' is-invalid' : ' is-valid') : ''),
                    'disabled' => 'disabled',
                ]
            ) !!}
            @if($errors->has('role'))
                <div class="invalid-feedback">{{ implode(' ', $errors->get('role')) }}</div>
            @else
                <div class="valid-feedback">Looks good!</div>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('email', __('Email Address')) !!}
            {!! Form::email(
                'email',
                null,
                [
                    'class' => 'form-control' . ($errors->any() ? ($errors->has('email') ? ' is-invalid' : ' is-valid') : ''),
                    'maxlength' => '254',
                    'placeholder' => $user->email,
                ]
            ) !!}
            @if($errors->has('email'))
                <div class="invalid-feedback">{{ implode(' ', $errors->get('email')) }}</div>
            @else
                <div class="valid-feedback">Looks good!</div>
            @endif
        </div>

        {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
