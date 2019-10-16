@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-start">
        <h1>{{ __('Users') }}</h1>
        @can('create', \App\User::class)
            <a href="{{ route('users.create', [], false) }}" class="btn btn-primary">{{ __('Add') }}</a>
        @endcan
    </div>

    @if($users->isEmpty())
        <p class="container">{{ __('No users were found.') }}</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col">{{ __('Role') }}</th>
                    <th scope="col" class="d-none d-sm-table-cell">{{ __('Email Address') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="position-relative">
                            @can('view', $user)
                                <a href="{{ route('users.show', compact('user'), false) }}" class="stretched-link">{{ $user->name }}</a>
                            @else
                                {{ $user->name }}
                            @endcan
                        </td>
                        <td>{{ __(ucfirst($user->role)) }}</td>
                        <td class="position-relative d-none d-sm-table-cell"><a href="mailto:{{ $user->email }}" class="stretched-link">{{ $user->email }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $users->links() }}
    @endif
@endsection
