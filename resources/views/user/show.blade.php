@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column align-items-center">
        <h1 class="text-center">{{ $user->name }}</h1>

        @can('update', $user)
            <a href="{{ route('users.edit', compact('user'), false) }}" class="btn btn-primary mb-3">{{ __('Edit') }}</a>
        @endcan

        <div>
            {!! \Octicons\Octicon::person() !!}
            {{ __(ucfirst($user->role)) }}
        </div>

        <div>
            {!! \Octicons\Octicon::mail() !!}
            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
        </div>

        @can('delete', $user)
            {{-- TODO: Fix confirmation dialog --}}
            {!! Form::model($user, ['class' => 'mt-3', 'id' => 'deleteForm', 'method' => 'delete', 'route' => ['users.destroy', 'user' => $user]]) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger']) !!}
            {!! Form::close() !!}
        @endcan
    </div>

    @can('delete', $user)
        <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title h5" id="confirmationModalLabel">Confirm Deletion</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure that you want to delete {{ $user->name }}?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" id="confirmationButton" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    @endcan
@endsection
