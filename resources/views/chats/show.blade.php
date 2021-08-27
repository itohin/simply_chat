@extends('layouts.app')

@section('content')
    <div class="container">
        <chat-component :chat="{{ $chat }}" :recipient="{{ $recipient }}" :owner="{{ $owner }}"></chat-component>
    </div>
@endsection
