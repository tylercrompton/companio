@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-start">
        <h1>Companies</h1>
        <a href="{{ route('companies.create') }}" class="btn btn-primary">Add</a>
    </div>

    @if($companies->isEmpty())
        <p class="container">No companies were found.</p>
    @else
        <ul class="list-unstyled grid g-3">
            @foreach($companies as $company)
                <li class="card text-center">
                    <img class="card-img-top company-img" src="/images/logo-default.png" alt="Company logo">
                    <div class="card-body">
                        <p class="card-text">
                            <a href="#" class="stretched-link">{{ $company->name }}</a>
                        </p>
                    </div>
                </li>
            @endforeach
        </ul>

        {{ $companies->links() }}
    @endif
@endsection
