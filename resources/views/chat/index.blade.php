@extends('layouts.css')

@section('title', 'Messages')

@section('content')
<div class="chat-layout">
    <!-- Chat Contacts -->
    <div><a href="{{route('student.dashboard')}}">Retour à ma page</a></div>
    <div class="chat-contacts">
        <div class="chat-search">
            <input type="text" class="search-input" placeholder="Rechercher...">
        </div>
        <div class="chat-contacts-filter">
            <button class="filter-btn active">Tous</button>
            <button class="filter-btn">Non lus</button>
            <button class="filter-btn">Étudiants</button>
        </div>
        
        @foreach($conversations as $conversation)
            @php
                $otherUser = $conversation->users->first();
                $lastMessage = $conversation->lastMessage;
            @endphp
            <a href="{{ route('chat.show', $conversation) }}" class="contact-item {{ request()->route('conversation') && request()->route('conversation')->id == $conversation->id ? 'active' : '' }}">
                <div class="contact-avatar">{{ substr($otherUser->name, 0, 2) }}</div>
                <div class="contact-details">
                    <div class="contact-header">
                        <div class="contact-name">{{ $otherUser->name }}</div>
                        <div class="contact-time">{{ $lastMessage ? $lastMessage->created_at->format('H:i') : '' }}</div>
                    </div>
                    <div class="contact-message">{{ $lastMessage ? Str::limit($lastMessage->content, 50) : 'Pas de messages' }}</div>
                    <div class="contact-status">
                        @if($otherUser->isOnline())
                            <div class="status-online"></div>
                        @endif
                        @if($conversation->unread_count > 0)
                            <div class="status-unread">{{ $conversation->unread_count }}</div>
                        @endif
                    </div>
                </div>
            </a>
        @endforeach

        <div class="mt-4 text-center">
            <a href="{{ route('chat.create') }}" class="btn btn-primary">Nouvelle conversation</a>
        </div>
    </div>
    
    <!-- Chat Main When No Conversation is Selected -->
    <div class="chat-main flex items-center justify-center">
        <div class="text-center text-gray-500">
            <div class="text-5xl mb-4">💬</div>
            <h3 class="text-xl font-semibold">Sélectionnez une conversation</h3>
            <p>Ou commencez une nouvelle conversation</p>
        </div>
    </div>
</div>
@endsection