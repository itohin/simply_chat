@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="list-group">
                    @foreach ($users as $user)
                        <a href="{{ route('chats.show', $user) }}" class="list-group-item list-group-item-action">{{ $user->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
