@extends('layouts.app')

@section('content')
    <h1>{{ __('Add Employee') }}</h1>

    {!! Form::model(\App\Employee::make(), ['files' => true, 'route' => ['companies.employees.store', 'company' => $company]]) !!}
        <div class="form-group">
            {!! Form::label('first_name', __('First Name')) !!}
            {!! Form::text(
                'first_name',
                null,
                [
                    'class' => 'form-control' . ($errors->any() ? ($errors->has('first_name') ? ' is-invalid' : ' is-valid') : ''),
                    'maxlength' => '30',
                    'placeholder' => __('First Name'),
                    'required' => 'required',
                ]
            ) !!}
            @if($errors->has('first_name'))
                <div class="invalid-feedback">{{ implode(' ', $errors->get('first_name')) }}</div>
            @else
                <div class="valid-feedback">Looks good!</div>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('last_name', __('Last Name')) !!}
            {!! Form::text(
                'last_name',
                null,
                [
                    'class' => 'form-control' . ($errors->any() ? ($errors->has('last_name') ? ' is-invalid' : ' is-valid') : ''),
                    'maxlength' => '30',
                    'placeholder' => __('Last Name'),
                    'required' => 'required',
                ]
            ) !!}
            @if($errors->has('last_name'))
                <div class="invalid-feedback">{{ implode(' ', $errors->get('last_name')) }}</div>
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
                    'placeholder' => __('Email Address'),
                ]
            ) !!}
            @if($errors->has('email'))
                <div class="invalid-feedback">{{ implode(' ', $errors->get('email')) }}</div>
            @else
                <div class="valid-feedback">Looks good!</div>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('phone', __('Phone Number')) !!}
            {!! Form::tel(
                'phone',
                null,
                [
                    'class' => 'form-control' . ($errors->any() ? ($errors->has('phone') ? ' is-invalid' : ' is-valid') : ''),
                    'maxlength' => '16',
                    'placeholder' => __('Phone Number'),
                ]
            ) !!}
            @if($errors->has('phone'))
                <div class="invalid-feedback">{{ implode(' ', $errors->get('phone')) }}</div>
            @else
                <div class="valid-feedback">Looks good!</div>
            @endif
        </div>

        {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
