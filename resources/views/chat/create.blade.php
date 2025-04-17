
@extends('layouts.css')

@section('content')
<div class="chat-layout">
    <!-- Chat Contacts Sidebar (Same as main view) -->
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
            <a href="{{ route('chat.show', $conversation) }}" class="contact-item">
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
    
    <!-- Create Chat Main Content -->
    <div class="chat-main">
        <div class="create-chat-container">
            <div class="create-chat-header">
                <h2>Nouvelle conversation</h2>
                <p>Sélectionnez un ou plusieurs utilisateurs pour démarrer une conversation</p>
            </div>
            
            <form action="{{ route('chat.store') }}" method="POST" class="create-chat-form">
                @csrf
                
                <div class="form-group">
                    <label for="users">Utilisateurs</label>
                    <select name="users[]" id="users" class="form-control" multiple>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('users')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="message">Message initial (optionnel)</label>
                    <textarea name="message" id="message" rows="4" class="form-control" placeholder="Écrivez votre message..."></textarea>
                </div>
                
                <div class="form-actions">
                    <a href="{{ route('chat.index') }}" class="btn btn-secondary">Annuler</a>
                    <button type="submit" class="btn btn-primary">Créer la conversation</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

{{-- <style>
/* Additional styles for the create chat view */
.create-chat-container {
    max-width: 800px;
    margin: 40px auto;
    padding: 24px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
}

.create-chat-header {
    margin-bottom: 24px;
    text-align: center;
}

.create-chat-header h2 {
    font-size: 24px;
    color: #111827;
    margin-bottom: 8px;
}

.create-chat-header p {
    color: #6b7280;
}

.create-chat-form {
    display: flex;
    flex-direction: column;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: #374151;
}

.form-control {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #e5e7eb;
    border-radius: 6px;
    font-size: 14px;
}

select.form-control {
    min-height: 120px;
}

textarea.form-control {
    resize: vertical;
}

.form-error {
    margin-top: 4px;
    color: #ef4444;
    font-size: 13px;
}

.form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    margin-top: 12px;
}

.btn-secondary {
    background-color: #f3f4f6;
    color: #374151;
    border: 1px solid #e5e7eb;
}

.btn-secondary:hover {
    background-color: #e5e7eb;
}
</style> --}}