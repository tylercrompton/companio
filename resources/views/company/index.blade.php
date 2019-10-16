@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-start">
        <h1>{{ __('Companies') }}</h1>
        @can('create', \App\Company::class)
            <a href="{{ route('companies.create', [], false) }}" class="btn btn-primary">{{ __('Add') }}</a>
        @endcan
    </div>

    @if($companies->isEmpty())
        <p class="container">{{ __('No companies were found.') }}</p>
    @else
        <ul class="list-unstyled grid g-3">
            @foreach($companies as $company)
                <li class="card text-center">
                    <img class="card-img-top company-img align-self-center" src="/images/logo-default.png" alt="{{ $company->name }} logo">
                    <div class="card-body">
                        <p class="card-text">
                            @can('view', $company)
                                <a href="{{ route('companies.show', compact('company'), false) }}" class="stretched-link">{{ $company->name }}</a>
                            @else
                                {{ $company->name }}
                            @endcan
                        </p>
                    </div>
                </li>
            @endforeach
        </ul>

        {{ $companies->links() }}
    @endif
@endsection
