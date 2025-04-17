{{-- @extends('layouts.css')

@section('title', 'Conversation avec ' . $otherUser->name)

@section('header-title', 'Conversation avec ' . $otherUser->name)

@section('content')
<div class="chat-layout">
    <!-- Chat Contacts -->
    @include('chat.partials.contacts', ['conversations' => Auth::user()->conversations])
    
    <!-- Chat Main -->
    <div class="chat-main">
        <div class="chat-messages" id="chat-messages">
            @foreach($messages as $message)
                <div class="message {{ $message->user_id === Auth::id() ? 'self' : '' }}">
                    <div class="message-avatar">{{ substr($message->user->name, 0, 2) }}</div>
                    <div class="message-content">
                        <div class="message-bubble">
                            {!! nl2br(e($message->content)) !!}
                            
                            @if($message->files->count() > 0)
                                <div class="mt-2">
                                    @foreach($message->files as $file)
                                        <div class="file-attachment">
                                            <a href="{{ route('files.download', $file) }}" class="flex items-center">
                                                <span class="file-icon">📎</span>
                                                <span class="file-name">{{ $file->name }}</span>
                                                <span class="file-size">({{ round($file->size / 1024, 2) }} Ko)</span>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="message-info">{{ $message->created_at->format('H:i') }}</div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="chat-input">
            <form id="message-form" class="input-container">
                <div class="input-actions">
                    <label for="file-upload" class="input-icon cursor-pointer">
                        📎
                        <input id="file-upload" type="file" class="hidden" form="file-form">
                    </label>
                    <div class="input-icon">😊</div>
                </div>
                <textarea name="content" class="message-input" placeholder="Écrivez un message..." required></textarea>
                <button type="submit" class="send-btn">➤</button>
            </form>
            
            <!-- Formulaire pour l'upload de fichiers -->
            <form id="file-form" action="{{ route('files.store', $conversation) }}" method="POST" enctype="multipart/form-data" class="hidden">
                @csrf
            </form>
        </div>
    </div>
    
    <!-- Chat Info -->
    <div class="chat-info">
        <div class="chat-info-header">
            <div class="info-avatar">{{ substr($otherUser->name, 0, 2) }}</div>
            <div class="info-name">{{ $otherUser->name }}</div>
            <div class="info-status">
                @if($otherUser->isOnline())
                    <div class="status-indicator"></div>
                    <span>En ligne</span>
                @else
                    <span>Hors ligne</span>
                @endif
            </div>
        </div>
        
        <div class="info-actions">
            <div class="info-action">📞</div>
            <div class="info-action">📹</div>
            <div class="info-action">ℹ️</div>
        </div>
        
        <div class="info-section">
            <div class="info-section-title">INFORMATIONS</div>
            <ul class="info-list">
                <li class="info-list-item">
                    <div class="info-list-icon">📧</div>
                    <div>{{ $otherUser->email }}</div>
                </li>
                <li class="info-list-item">
                    <div class="info-list-icon">📚</div>
                    <div>{{ $otherUser->role === 'student' ? 'Étudiant' : 'Enseignant' }}</div>
                </li>
                <li class="info-list-item">
                    <div class="info-list-icon">📋</div>
                    <div>Dernière activité: {{ $otherUser->last_seen_at ? $otherUser->last_seen_at->diffForHumans() : 'Inconnue' }}</div>
                </li>
            </ul>
        </div>
        
        <div class="info-section">
            <div class="info-section-title">FICHIERS PARTAGÉS</div>
            <div class="shared-files">
                @php
                    $files = $conversation->messages()->whereHas('files')->with('files')->get()->pluck('files')->flatten();
                @endphp
                
                @foreach($files as $file)
                    <div class="file-item">
                        <div class="file-icon">
                            @if(strpos($file->type, 'image') !== false)
                                🖼️
                            @elseif(strpos($file->type, 'pdf') !== false)
                                📄
                            @elseif(strpos($file->type, 'word') !== false || strpos($file->type, 'document') !== false)
                                📝
                            @else
                                📁
                            @endif
                        </div>
                        <div class="file-name">{{ $file->name }}</div>
                        <div class="file-size">{{ round($file->size / 1024, 2) }} Ko</div>
                    </div>
                @endforeach
            </div>
        </div>
        
        <div class="info-section">
            <div class="info-section-title">ACTIONS</div>
            <ul class="info-list">
                <li class="info-list-item">
                    <div class="info-list-icon">🔕</div>
                    <div>Couper les notifications</div>
                </li>
                <li class="info-list-item">
                    <div class="info-list-icon">📌</div>
                    <div>Épingler la conversation</div>
                </li>
                <li class="info-list-item">
                    <div class="info-list-icon">🗑️</div>
                    <div>Supprimer la conversation</div>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const conversationId = {{ $conversation->id }};
    const currentUserId = {{ Auth::id() }};
    
    // Scroll to bottom of chat on load
    document.addEventListener('DOMContentLoaded', function() {
        const messagesContainer = document.getElementById('chat-messages');
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
        
        // Message form submission
        const messageForm = document.getElementById('message-form');
        messageForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const messageInput = this.querySelector('textarea');
            const content = messageInput.value.trim();
            
            if (content !== '') {
                // Send message via AJAX
                fetch("{{ route('messages.store', $conversation) }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ content: content })
                })
                .then(response => response.json())
                .then(message => {
                    // Clear input
                    messageInput.value = '';
                    
                    // Add message to UI
                    addMessageToUI(message, true);
                });
            }
        });
        
        // File upload handling
        document.getElementById('file-upload').addEventListener('change', function() {
            if (this.files.length > 0) {
                document.getElementById('file-form').submit();
            }
        });
    });
    
    // Listen for new messages
    window.Echo.private(`conversation.${conversationId}`)
        .listen('MessageSent', (e) => {
            if (e.message.user_id !== currentUserId) {
                addMessageToUI(e.message, false);
                
                // Mark message as read
                fetch(`/api/messages/${e.message.id}/read`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });
            }
        });
    
    function addMessageToUI(message, isSelf) {
        const messagesContainer = document.getElementById('chat-messages');
        
        const messageElement = document.createElement('div');
        messageElement.className = `message ${isSelf ? 'self' : ''}`;
        
        const initials = message.user.name.split(' ').map(n => n[0]).join('').substr(0, 2);
        
        messageElement.innerHTML = `
            <div class="message-avatar">${initials}</div>
            <div class="message-content">
                <div class="message-bubble">
                    ${message.content.replace(/\n/g, '<br>')}
                </div>
                <div class="message-info">${new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}</div>
            </div>
        `;
        
        messagesContainer.appendChild(messageElement);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }
</script>
@endpush --}}


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
        
        @foreach($conversations as $conv)
            @php
                $otherUser = $conv->users->first();
                $lastMessage = $conv->lastMessage;
            @endphp
            <a href="{{ route('chat.show', $conv) }}" class="contact-item {{ $conversation->id == $conv->id ? 'active' : '' }}">
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
                        @if($conv->unread_count > 0 && $conversation->id != $conv->id)
                            <div class="status-unread">{{ $conv->unread_count }}</div>
                        @endif
                    </div>
                </div>
            </a>
        @endforeach
        
        <div class="mt-4 text-center">
            <a href="{{ route('chat.create') }}" class="btn btn-primary">Nouvelle conversation</a>
        </div>
    </div>
    
    <!-- Chat Main Content -->
    <div class="chat-main">
        <div class="chat-header">
            <div class="chat-header-info">
                <div class="chat-header-name">
                    @if($participants->count() == 1)
                        {{ $participants->first()->name }}
                    @else
                        Conversation de groupe ({{ $participants->count() + 1 }} personnes)
                    @endif
                </div>
                <div class="chat-header-status">
                    @if($participants->count() == 1 && $participants->first()->isOnline())
                        <div class="status-online"></div> En ligne
                    @else
                        {{ $participants->count() }} participants
                    @endif
                </div>
            </div>
            <div class="chat-header-actions">
                <button class="chat-action-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                </button>
                <button class="chat-action-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-video"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg>
                </button>
                <button class="chat-action-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                </button>
            </div>
        </div>
        
        <div class="chat-messages">
            @forelse($messages as $message)
                <div class="message {{ $message->user_id == Auth::id() ? 'message-sent' : 'message-received' }}">
                    <div class="message-content">
                        <div class="message-text">{{ $message->content }}</div>
                        <div class="message-time">{{ $message->created_at->format('H:i') }}</div>
                    </div>
                </div>
            @empty
                <div class="no-messages">
                    <p>Aucun message. Commencez la conversation!</p>
                </div>
            @endforelse
        </div>
        
        <div class="chat-input">
            <form action="{{ route('chat.message.send', $conversation) }}" method="POST" class="chat-form">
                @csrf
                <div class="chat-input-actions">
                    <button type="button" class="chat-input-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg>
                    </button>
                </div>
                <input type="text" name="message" class="chat-input-field" placeholder="Écrivez votre message..." autocomplete="off">
                <button type="submit" class="chat-send-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

<style>
/* Additional styles for the chat view */
/* .chat-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px 24px;
    background-color: white;
    border-bottom: 1px solid #e6e9ef;
}

.chat-header-info {
    display: flex;
    flex-direction: column;
}

.chat-header-name {
    font-weight: 600;
    font-size: 16px;
    color: #111827;
}

.chat-header-status {
    display: flex;
    align-items: center;
    font-size: 13px;
    color: #6b7280;
}

.chat-header-status .status-online {
    margin-right: 4px;
}

.chat-header-actions {
    display: flex;
    gap: 12px;
}

.chat-action-btn {
    background: none;
    border: none;
    cursor: pointer;
    color: #6b7280;
    padding: 6px;
    border-radius: 50%;
}

.chat-action-btn:hover {
    background-color: #f3f4f6;
    color: #4f46e5;
}

.chat-messages {
    flex: 1;
    padding: 20px;
    overflow-y: auto;
    display: flex;
    flex-direction: column;
}

.message {
    max-width: 70%;
    margin-bottom: 16px;
    display: flex;
}

.message-sent {
    align-self: flex-end;
}

.message-received {
    align-self: flex-start;
}

.message-content {
    padding: 12px 16px;
    border-radius: 16px;
    position: relative;
}

.message-sent .message-content {
    background-color: #4f46e5;
    color: white;
    border-bottom-right-radius: 4px;
}

.message-received .message-content {
    background-color: white;
    color: #374151;
    border-bottom-left-radius: 4px;
}

.message-text {
    margin-bottom: 4px;
    font-size: 14px;
    line-height: 1.4;
}

.message-time {
    font-size: 11px;
    text-align: right;
    opacity: 0.8;
}

.no-messages {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100%;
    color: #6b7280;
    font-size: 14px;
}

.chat-input {
    padding: 16px;
    background-color: white;
    border-top: 1px solid #e6e9ef;
}

.chat-form {
    display: flex;
    align-items: center;
}

.chat-input-actions {
    margin-right: 8px;
}

.chat-input-btn {
    background: none;
    border: none;
    cursor: pointer;
    color: #6b7280;
    padding: 8px;
    border-radius: 50%;
}

.chat-input-btn:hover {
    background-color: #f3f4f6;
    color: #4f46e5;
}

.chat-input-field {
    flex: 1;
    padding: 12px 16px;
    border: 1px solid #e6e9ef;
    border-radius: 24px;
    font-size: 14px;
    background-color: #f5f7fb;
}

.chat-send-btn {
    background-color: #4f46e5;
    color: white;
    border: none;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-left: 12px;
    cursor: pointer;
    transition: background-color 0.2s;
}

.chat-send-btn:hover {
    background-color: #4338ca;
} */
</style>