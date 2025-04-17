<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'TUTOACADEMY') }} - @yield('title')</title>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /* Inclure les styles CSS de votre fichier HTML original ici */
        /* Chat Layout */
.chat-layout {
    display: flex;
    height: 100vh;
    width: 100%;
    background-color: #f5f7fb;
}

/* Chat Contacts Sidebar */
.chat-contacts {
    width: 320px;
    background-color: #ffffff;
    border-right: 1px solid #e6e9ef;
    display: flex;
    flex-direction: column;
    overflow-y: auto;
}

.chat-search {
    padding: 16px;
    border-bottom: 1px solid #e6e9ef;
}

.search-input {
    width: 100%;
    padding: 10px 16px;
    border-radius: 8px;
    border: 1px solid #e6e9ef;
    background-color: #f5f7fb;
    font-size: 14px;
}

.chat-contacts-filter {
    display: flex;
    padding: 12px 16px;
    border-bottom: 1px solid #e6e9ef;
}

.filter-btn {
    padding: 6px 12px;
    border-radius: 16px;
    border: none;
    background-color: transparent;
    font-size: 13px;
    color: #6b7280;
    cursor: pointer;
    margin-right: 8px;
}

.filter-btn.active {
    background-color: #4f46e5;
    color: white;
}

.contact-item {
    display: flex;
    padding: 12px 16px;
    border-bottom: 1px solid #f5f7fb;
    text-decoration: none;
    color: #374151;
    transition: background-color 0.2s;
}

.contact-item:hover {
    background-color: #f9fafb;
}

.contact-item.active {
    background-color: #f0f4ff;
    border-left: 3px solid #4f46e5;
}

.contact-avatar {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background-color: #e5e7eb;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    color: #6b7280;
    margin-right: 12px;
    flex-shrink: 0;
}

.contact-details {
    flex: 1;
    min-width: 0;
    position: relative;
}

.contact-header {
    display: flex;
    justify-content: space-between;
    margin-bottom: 4px;
}

.contact-name {
    font-weight: 600;
    color: #111827;
}

.contact-time {
    font-size: 12px;
    color: #6b7280;
}

.contact-message {
    font-size: 13px;
    color: #6b7280;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.contact-status {
    display: flex;
    position: absolute;
    right: 0;
    bottom: 0;
}

.status-online {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background-color: #10b981;
    margin-right: 8px;
}

.status-unread {
    font-size: 12px;
    background-color: #4f46e5;
    color: white;
    border-radius: 10px;
    padding: 1px 6px;
    min-width: 20px;
    text-align: center;
}

/* Chat Main Content */
.chat-main {
    flex: 1;
    display: flex;
    flex-direction: column;
}

/* Utility classes */
.mt-4 {
    margin-top: 16px;
}

.text-center {
    text-align: center;
}

.btn {
    display: inline-block;
    padding: 8px 16px;
    border-radius: 6px;
    font-weight: 500;
    text-decoration: none;
    cursor: pointer;
}

.btn-primary {
    background-color: #4f46e5;
    color: white;
    border: none;
}

.btn-primary:hover {
    background-color: #4338ca;
}

/* Empty state styling */
.flex {
    display: flex;
}

.items-center {
    align-items: center;
}

.justify-center {
    justify-content: center;
}

.text-gray-500 {
    color: #6b7280;
}

.text-5xl {
    font-size: 3rem;
}

.mb-4 {
    margin-bottom: 16px;
}

.text-xl {
    font-size: 1.25rem;
}

.font-semibold {
    font-weight: 600;
}

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


.chat-header {
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
}

header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            margin-bottom: 30px;
        }
        
        .logo {
            font-size: 28px;
            font-weight: 700;
            color: #333;
        }
        
        .nav-links {
            display: flex;
            gap: 30px;
        }
        
        .nav-links a {
            font-weight: 500;
        }
        
        .nav-links a:hover {
            color: #FF6B35;
        }
        
        .auth-buttons {
            display: flex;
            gap: 15px;
            align-items: center;
        }
        
        .login-btn {
            font-weight: 500;
        }
        
        .signup-btn {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border-radius: 50px;
            font-weight: 500;
        }
        
        /* Page Header */
        .page-header {
            text-align: center;
            margin-bottom: 40px;
            padding: 30px 0;
        }
        
        .page-title {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .page-title .highlight {
            color: #FF6B35;
        }
        
        .page-description {
            font-size: 18px;
            color: #666;
        }
        
        /* Buttons and CTAs */
        .cta-button {
            background-color: #FF6B35;
            color: white;
            padding: 12px 24px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 16px;
            display: inline-block;
            border: none;
            cursor: pointer;
        }
        
        .cta-button:hover {
            background-color: #e55a2a;
        }




    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">TUTOACADEMY</div>
            <div class="nav-links">
                <a href="{{ route('welcome') }}">Home</a>
                <a href="{{ route('courses.index') }}">Courses</a>
                <a href="About">About</a>
                <a href="contact">Contact</a>
                <a href="{{route('categories.index')}}">Categories</a>
                @auth
                <a href="{{ route('dashboard') }}">Dashboard</a>
                @endauth
            </div>
            <div class="auth-buttons">
                @guest
                    <a href="{{ route('login') }}" class="login-btn">Login</a>
                    <a href="{{ route('register') }}" class="signup-btn">Sign Up</a>
                @else
                    <span class="mr-3">{{ Auth::user()->name }}</span>
                    <a href="{{ route('logout') }}" class="login-btn" 
                        onclick="event.preventDefault(); 
                        document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest
            </div>
        </header>
    <div class="container">
        <!-- Sidebar -->
        {{-- @include('partials.sidebar') --}}
        
        <!-- Chat Container -->
        <div class="chat-container">
            <!-- Chat Header -->
            <div class="chat-header">
                <div class="chat-title">@yield('header-title', 'Messages')</div>
                <div class="chat-header-actions">
                    <div class="notification-bell">
                        🔔
                        <div class="notification-badge">{{ auth()->user()->unreadNotifications->count() }}</div>
                    </div>
                </div>
            </div>
            
            <!-- Content -->
            @yield('content')
        </div>
    </div>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>