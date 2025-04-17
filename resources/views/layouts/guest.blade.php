<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>TUTOACADEMY - Smart Learning Platform</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Styles -->
    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        
        body {
            background-color: #fff9f5;
            color: #333;
            line-height: 1.6;
        }
        
        a {
            text-decoration: none;
            color: inherit;
        }
        
        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Header Styles */
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
        
        /* Course Cards */
        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }
        
        .course-card {
            background-color: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }
        
        .course-card:hover {
            transform: translateY(-10px);
        }
        
        .course-image {
            height: 180px;
            background-color: #f4f4f4;
            position: relative;
            overflow: hidden;
        }
        
        .course-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .course-image.design { background-color: #f0fff4; }
        .course-image.development { background-color: #eff6ff; }
        .course-image.marketing { background-color: #eef2ff; }
        .course-image.writing { background-color: #fdf2f8; }
        
        .course-tag {
            position: absolute;
            left: 15px;
            top: 15px;
            background-color: #FF6B35;
            color: white;
            font-size: 12px;
            padding: 5px 10px;
            border-radius: 20px;
            font-weight: 500;
        }
        
        .course-content {
            padding: 20px;
        }
        
        .course-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .course-instructor {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }
        
        .instructor-avatar {
            width: 30px;
            height: 30px;
            background-color: #e0e0e0;
            border-radius: 50%;
        }
        
        .instructor-name {
            font-size: 14px;
            color: #666;
        }
        
        .course-stats {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .course-stat {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 14px;
        }
        
        .course-price {
            font-weight: 600;
            color: #FF6B35;
        }
        
        /* Alert Styles */
        .alert {
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-info {
            background-color: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }
        
        /* Button styles */
        .btn {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            border: none;
        }
        
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        
        .btn-sm {
            padding: 5px 10px;
            font-size: 12px;
        }
        
        /* Utility Classes */
        .d-flex {
            display: flex;
        }
        
        .justify-content-between {
            justify-content: space-between;
        }
        
        .justify-content-center {
            justify-content: center;
        }
        
        .align-items-center {
            align-items: center;
        }
        
        .mb-4 {
            margin-bottom: 1.5rem;
        }
        
        .mt-3 {
            margin-top: 1rem;
        }
        
        .mt-4 {
            margin-top: 1.5rem;
        }
        
        /* Footer */
        footer {
            background-color: #333;
            color: white;
            padding: 70px 0 20px;
            margin-top: 50px;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 50px;
            margin-bottom: 50px;
        }
        
        .footer-logo {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .footer-desc {
            color: rgba(255,255,255,0.7);
            margin-bottom: 20px;
        }
        
        .social-links {
            display: flex;
            gap: 15px;
        }
        
        .social-icon {
            width: 40px;
            height: 40px;
            background-color: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .footer-heading {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 15px;
        }
        
        .footer-links a {
            color: rgba(255,255,255,0.7);
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: white;
        }
        
        .newsletter-form {
            display: flex;
            margin-top: 20px;
        }
        
        .newsletter-input {
            flex: 1;
            padding: 10px 15px;
            border: none;
            border-radius: 5px 0 0 5px;
            outline: none;
        }
        
        .newsletter-button {
            background-color: #FF6B35;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }
        
        .copyright {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: rgba(255,255,255,0.5);
            font-size: 14px;
        }
        
        /* Responsive Styles */
        @media (max-width: 992px) {
            .courses-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }
        
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .courses-grid {
                grid-template-columns: 1fr;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
            }
        }
        
        /* Pagination */
        .pagination {
            display: flex;
            list-style: none;
            gap: 10px;
            justify-content: center;
        }
        
        .page-item {
            display: inline-block;
        }
        
        .page-link {
            padding: 8px 15px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .page-item.active .page-link {
            background-color: #FF6B35;
            color: white;
        }
        
        .page-item.disabled .page-link {
            color: #999;
            pointer-events: none;
        }
    </style>
    
    <!-- Additional CSS -->
    {{-- @stack('styles') --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
                 {{-- @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                    >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                    >
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                            Register
                        </a>
                    @endif
                @endauth
            </div> --}}
        </header>
        
        <main>
            @yield('content')
        </main>
    </div>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            
            <div class="row g-4">
                <div class="col-md-6">
                    <img src="{{ asset('img/course-7.jpg') }}" class="img-fluid rounded shadow" alt="cours 1">
                </div>
                
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
   
    
    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add hover effect to course cards
            const courseCards = document.querySelectorAll('.course-card');
            courseCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-10px)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
            
            // Mobile menu toggle functionality
            const mobileMenuButton = document.createElement('button');
            mobileMenuButton.className = 'mobile-menu-button';
            mobileMenuButton.innerHTML = '☰';
            mobileMenuButton.style.display = 'none';
            mobileMenuButton.style.backgroundColor = 'transparent';
            mobileMenuButton.style.border = 'none';
            mobileMenuButton.style.fontSize = '24px';
            mobileMenuButton.style.cursor = 'pointer';
            
            const header = document.querySelector('header');
            header.insertBefore(mobileMenuButton, header.firstChild);
            
            function checkScreenSize() {
                if (window.innerWidth <= 768) {
                    mobileMenuButton.style.display = 'block';
                } else {
                    mobileMenuButton.style.display = 'none';
                }
            }
            
            window.addEventListener('resize', checkScreenSize);
            checkScreenSize();
            
            // Auto-hide alerts after 5 seconds
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.opacity = '0';
                    alert.style.transition = 'opacity 1s';
                    setTimeout(() => {
                        alert.style.display = 'none';
                    }, 1000);
                }, 5000);
            });
        });
    </script>
    
    @stack('scripts')
</body>
</html>










{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            /* Reset and Base Styles */
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            }
            
            body {
                background-color: #fff9f5;
                color: #333;
                line-height: 1.6;
            }
            
            a {
                text-decoration: none;
                color: inherit;
            }
            
            /* Container */
            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 20px;
            }
            
            /* Header Styles */
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
            
            /* Course Cards */
            .courses-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                gap: 30px;
                margin-bottom: 40px;
            }
            
            .course-card {
                background-color: white;
                border-radius: 20px;
                overflow: hidden;
                box-shadow: 0 10px 20px rgba(0,0,0,0.05);
                transition: transform 0.3s ease;
            }
            
            .course-card:hover {
                transform: translateY(-10px);
            }
            
            .course-image {
                height: 180px;
                background-color: #f4f4f4;
                position: relative;
                overflow: hidden;
            }
            
            .course-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            
            .course-image.design { background-color: #f0fff4; }
            .course-image.development { background-color: #eff6ff; }
            .course-image.marketing { background-color: #eef2ff; }
            .course-image.writing { background-color: #fdf2f8; }
            
            .course-tag {
                position: absolute;
                left: 15px;
                top: 15px;
                background-color: #FF6B35;
                color: white;
                font-size: 12px;
                padding: 5px 10px;
                border-radius: 20px;
                font-weight: 500;
            }
            
            .course-content {
                padding: 20px;
            }
            
            .course-title {
                font-size: 18px;
                font-weight: 600;
                margin-bottom: 10px;
            }
            
            .course-instructor {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-bottom: 15px;
            }
            
            .instructor-avatar {
                width: 30px;
                height: 30px;
                background-color: #e0e0e0;
                border-radius: 50%;
            }
            
            .instructor-name {
                font-size: 14px;
                color: #666;
            }
            
            .course-stats {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            
            .course-stat {
                display: flex;
                align-items: center;
                gap: 5px;
                font-size: 14px;
            }
            
            .course-price {
                font-weight: 600;
                color: #FF6B35;
            }
            
            /* Alert Styles */
            .alert {
                padding: 15px;
                border-radius: 10px;
                margin-bottom: 20px;
            }
            
            .alert-success {
                background-color: #d4edda;
                color: #155724;
                border: 1px solid #c3e6cb;
            }
            
            .alert-info {
                background-color: #d1ecf1;
                color: #0c5460;
                border: 1px solid #bee5eb;
            }
            
            /* Button styles */
            .btn {
                display: inline-block;
                padding: 5px 10px;
                border-radius: 5px;
                font-size: 14px;
                cursor: pointer;
                border: none;
            }
            
            .btn-primary {
                background-color: #007bff;
                color: white;
            }
            
            .btn-secondary {
                background-color: #6c757d;
                color: white;
            }
            
            .btn-danger {
                background-color: #dc3545;
                color: white;
            }
            
            .btn-sm {
                padding: 5px 10px;
                font-size: 12px;
            }
            
            /* Utility Classes */
            .d-flex {
                display: flex;
            }
            
            .justify-content-between {
                justify-content: space-between;
            }
            
            .justify-content-center {
                justify-content: center;
            }
            
            .align-items-center {
                align-items: center;
            }
            
            .mb-4 {
                margin-bottom: 1.5rem;
            }
            
            .mt-3 {
                margin-top: 1rem;
            }
            
            .mt-4 {
                margin-top: 1.5rem;
            }
            
            /* Footer */
            footer {
                background-color: #333;
                color: white;
                padding: 70px 0 20px;
                margin-top: 50px;
            }
            
            .footer-content {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 50px;
                margin-bottom: 50px;
            }
            
            .footer-logo {
                font-size: 28px;
                font-weight: 700;
                margin-bottom: 20px;
            }
            
            .footer-desc {
                color: rgba(255,255,255,0.7);
                margin-bottom: 20px;
            }
            
            .social-links {
                display: flex;
                gap: 15px;
            }
            
            .social-icon {
                width: 40px;
                height: 40px;
                background-color: rgba(255,255,255,0.1);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            
            .footer-heading {
                font-size: 20px;
                font-weight: 600;
                margin-bottom: 20px;
            }
            
            .footer-links {
                list-style: none;
            }
            
            .footer-links li {
                margin-bottom: 15px;
            }
            
            .footer-links a {
                color: rgba(255,255,255,0.7);
                transition: color 0.3s ease;
            }
            
            .footer-links a:hover {
                color: white;
            }
            
            .newsletter-form {
                display: flex;
                margin-top: 20px;
            }
            
            .newsletter-input {
                flex: 1;
                padding: 10px 15px;
                border: none;
                border-radius: 5px 0 0 5px;
                outline: none;
            }
            
            .newsletter-button {
                background-color: #FF6B35;
                color: white;
                border: none;
                padding: 10px 15px;
                border-radius: 0 5px 5px 0;
                cursor: pointer;
            }
            
            .copyright {
                text-align: center;
                padding-top: 30px;
                border-top: 1px solid rgba(255,255,255,0.1);
                color: rgba(255,255,255,0.5);
                font-size: 14px;
            }
            
            /* Responsive Styles */
            @media (max-width: 992px) {
                .courses-grid {
                    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                }
            }
            
            @media (max-width: 768px) {
                .nav-links {
                    display: none;
                }
                
                .courses-grid {
                    grid-template-columns: 1fr;
                }
                
                .footer-content {
                    grid-template-columns: 1fr;
                }
            }
            
            /* Pagination */
            .pagination {
                display: flex;
                list-style: none;
                gap: 10px;
                justify-content: center;
            }
            
            .page-item {
                display: inline-block;
            }
            
            .page-link {
                padding: 8px 15px;
                background-color: white;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            }
            
            .page-item.active .page-link {
                background-color: #FF6B35;
                color: white;
            }
            
            .page-item.disabled .page-link {
                color: #999;
                pointer-events: none;
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('courses.index') }}">TutoAcademy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('welcome') }}">home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('courses.index') }}">Courses</a></li>
                     <li class="nav-item"><a class="nav-link" href="About">About</a></li>  
                     <li class="nav-item"><a class="nav-link" href="contact">contact</a></li>  --}}
                   
                    {{-- @auth
                        <li class="nav-item"><span class="nav-link">{{ Auth::user()->name }}</span></li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Déconnexion</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Connexion</a></li>
                    @endauth --}}
                    
                     {{-- @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                    >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                    >
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                            Register
                        </a>
                    @endif
                @endauth
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <img src="{{ asset('img/course-7.jpg') }}" class="img-fluid rounded shadow" alt="cours 1">
                    </div>
                    
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html> --}}
