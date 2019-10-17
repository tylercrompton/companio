@extends('layouts.app')

@section('content')
    <h1>{{ __('Add Company') }}</h1>

    {!! Form::model(\App\Company::make(), ['files' => true, 'route' => 'companies.store']) !!}
        <div class="form-group">
            {!! Form::label('name', __('Name')) !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => '100', 'placeholder' => __('Name'), 'required' => 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', __('Email Address')) !!}
            {!! Form::email('email', null, ['class' => 'form-control', 'maxlength' => '254', 'placeholder' => __('Email Address')]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('website', __('Website')) !!}
            {!! Form::url('website', null, ['class' => 'form-control', 'maxlength' => '256', 'placeholder' => __('Website')]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('logo', __('Logo')) !!}
            {!! Form::file('logo', ['class' => 'form-control-file']) !!}
        </div>

        {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
