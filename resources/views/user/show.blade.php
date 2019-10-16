@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column align-items-center">
        <h1 class="text-center">{{ $user->name }}</h1>
        <div>{{ __(ucfirst($user->role)) }}</div>
        <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
    </div>
@endsection
