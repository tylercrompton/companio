@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column align-items-center">
        <h1 class="text-center">{{ $user->name }}</h1>
        <div>
            {!! \Octicons\Octicon::person() !!}
            {{ __(ucfirst($user->role)) }}
        </div>
        <div>
            {!! \Octicons\Octicon::mail() !!}
            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
        </div>
    </div>
@endsection
