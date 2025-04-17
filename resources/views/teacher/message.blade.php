@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Messagerie</h2>

    <div class="list-group">
        @foreach($messages as $message)
            <a href="{{ route('teacher.view_message', $message->id) }}" class="list-group-item list-group-item-action">
                <strong>{{ $message->sender->name }}</strong> : {{ Str::limit($message->content, 50) }}
            </a>
        @endforeach
    </div>
</div>
@endsection
