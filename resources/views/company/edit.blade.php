@extends('layouts.app')

@section('content')
    <h1>{{ __('Edit Company') }}</h1>

    {!! Form::model($company, ['class' => 'needs-validation', 'files' => true, 'method' => 'put', 'novalidate' => 'novalidate', 'route' => ['companies.update', 'company' => $company]]) !!}
        <div class="form-group">
            {!! Form::label('name', __('Name')) !!}
            {!! Form::text(
                'name',
                null,
                [
                    'class' => 'form-control' . ($errors->any() ? ($errors->has('name') ? ' is-invalid' : ' is-valid') : ''),
                    'maxlength' => '100',
                    'placeholder' => $company->name,
                ]
            ) !!}
            @if($errors->has('name'))
                <div class="invalid-feedback">{{ implode(' ', $errors->get('name')) }}</div>
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
            {!! Form::label('website', __('Website')) !!}
            {!! Form::url(
                'website',
                null,
                [
                    'class' => 'form-control' . ($errors->any() ? ($errors->has('website') ? ' is-invalid' : ' is-valid') : ''),
                    'maxlength' => '256',
                    'placeholder' => __('Website')
                ]
            ) !!}
            @if($errors->has('website'))
                <div class="invalid-feedback">{{ implode(' ', $errors->get('website')) }}</div>
            @else
                <div class="valid-feedback">Looks good!</div>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('logo', __('Logo')) !!}
            {!! Form::file(
                'logo',
                [
                    'accept' => 'image/*',
                    'class' => 'form-control-file' . ($errors->any() ? ($errors->has('logo') ? ' is-invalid' : ' is-valid') : ''),
                ]
            ) !!}
            @if($errors->has('logo'))
                <div class="invalid-feedback">{{ implode(' ', $errors->get('logo')) }}</div>
            @endif
        </div>

        {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
