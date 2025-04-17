
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->title }} - Leçons</title>
    <style>
        /* Reset and Base Styles from your provided HTML */
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
        
        .nav-links a:hover, .nav-links a.active {
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
        
        /* Page header */
        .page-header {
            background-color: #e9f8f5;
            padding: 80px 0;
            border-radius: 20px;
            margin-bottom: 50px;
            text-align: center;
        }
        
        .page-title {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 15px;
        }
        
        .page-title .highlight {
            color: #FF6B35;
        }
        
        .page-description {
            max-width: 700px;
            margin: 0 auto;
            font-size: 18px;
            color: #666;
        }

        /* Button styles */
        .button, .cta-button {
            background-color: #FF6B35;
            color: white;
            padding: 10px 20px;
            border-radius: 50px;
            font-weight: 600;
            display: inline-block;
            border: none;
            cursor: pointer;
        }

        .button.blue {
            background-color: rgb(8, 70, 203);
        }

        .button.green {
            background-color: #48B899;
        }

        .button.red {
            background-color: #ff4d4d;
        }

        /* Alert styles */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-info {
            background-color: #d1ecf1;
            color: #0c5460;
        }

        /* Course panel styles */
        .course-info {
            background-color: white;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            display: flex;
            gap: 30px;
        }

        .course-image {
            width: 200px;
            height: 150px;
            background-color: #f4f4f4;
            border-radius: 10px;
            overflow: hidden;
        }

        .course-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .course-details {
            flex: 1;
        }

        .course-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .course-meta {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
            color: #666;
        }

        .course-instructor {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .instructor-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #f4f4f4;
        }

        /* Lessons section */
        .lessons-section {
            background-color: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .lessons-title {
            font-size: 24px;
            font-weight: 700;
        }

        .lessons-list {
            list-style: none;
        }

        .lesson-item {
            border-top: 1px solid #f4f4f4;
            padding: 20px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .lesson-info {
            display: flex;
            gap: 20px;
            align-items: center;
            flex: 1;
        }

        .lesson-order {
            width: 40px;
            height: 40px;
            background-color: #e9f8f5;
            color: #48B899;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .lesson-details {
            flex: 1;
        }

        .lesson-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .lesson-meta {
            display: flex;
            gap: 15px;
            color: #666;
            font-size: 14px;
        }

        .lesson-actions {
            display: flex;
            gap: 10px;
        }

        .lesson-button {
            padding: 8px 15px;
            font-size: 14px;
        }

        /* Form group */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
        }

        .form-control:focus {
            outline: none;
            border-color: #FF6B35;
        }

        textarea.form-control {
            min-height: 150px;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
        }

        .page-link {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: white;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        }

        .page-link.active {
            background-color: #FF6B35;
            color: white;
        }

        /* Breadcrumb */
        .breadcrumb {
            display: flex;
            margin-bottom: 20px;
        }

        .breadcrumb-item {
            margin-right: 10px;
        }

        .breadcrumb-item:after {
            content: "/";
            margin-left: 10px;
            color: #999;
        }

        .breadcrumb-item:last-child:after {
            content: "";
        }

        .breadcrumb-item.active {
            color: #666;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .course-info {
                flex-direction: column;
            }

            .course-image {
                width: 100%;
                height: 200px;
            }

            .lesson-info {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .lesson-actions {
                margin-top: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">TUTOACADEMY</div>
            <div class="nav-links">
                <a href="/">Home</a>
                <a href="{{ route('courses.index') }}" class="active">Courses</a>
                <a href="/about">About</a>
                <a href="/contact">Contact</a>
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
                    <span>{{ Auth::user()->name }}</span>
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

        <div class="breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('courses.index') }}">Courses</a></div>
            <div class="breadcrumb-item"><a href="{{ route('courses.indexs') }}">Gérer les Cours</a></div>
            <div class="breadcrumb-item active">{{ $course->title }}</div>
        </div>

        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif

        <div class="course-info">
            <div class="course-image">
                @if($course->image_url)
                    <img src="{{ $course->image_url }}" alt="{{ $course->title }}">
                @endif
            </div>
            <div class="course-details">
                <h1 class="course-title">{{ $course->title }}</h1>
                <div class="course-meta">
                    <div class="course-instructor">
                        <div class="instructor-avatar"></div>
                        <div class="instructor-name">{{ $course->instructor_name }}</div>
                    </div>
                    <div class="course-stat">
                        <span>⭐</span>
                        <span>{{ $course->rating }}.0</span>
                    </div>
                    <div class="course-stat">
                        <span>👥</span>
                        <span>{{ $course->students_count }} étudiants</span>
                    </div>
                    <div class="course-price">{{ $course->formatted_price }}</div>
                </div>
                <p>{{ \Illuminate\Support\Str::limit($course->description, 150) }}</p>
                <div style="margin-top: 15px;">
                    <a href="{{ route('courses.edit', $course) }}" class="button green">Modifier le cours</a>
                    <a href="{{ route('courses.indexs') }}" class="button">Retour à la liste</a>
                    <form action="{{ route('courses.destroy', $course) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce cours ? Cette action est irréversible.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="cta-button " style="background-color: #ff4d4d;">supprimer</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="lessons-section">
            <div class="section-header">
                <h2 class="lessons-title">Leçons du cours</h2>
                <a href="{{ route('courses.createLesson', $course) }}" class="cta-button">Ajouter une leçon</a>
            </div>

            @if($lessons->count() > 0)
                <ul class="lessons-list">
                    @foreach($lessons as $lesson)
                        <li class="lesson-item">
                            <div class="lesson-info">
                                <div class="lesson-order">{{ $lesson->order }}</div>
                                <div class="lesson-details">
                                    <h3 class="lesson-title">{{ $lesson->title }}</h3>
                                    <div class="lesson-meta">
                                        <div class="lesson-duration">⏱️ {{ $lesson->duration }}</div>
                                        <div class="lesson-type">
                                            @if($lesson->video_type == 'youtube')
                                                📺 YouTube
                                            @elseif($lesson->video_type == 'vimeo')
                                                🎬 Vimeo
                                            @elseif($lesson->video_type == 'upload')
                                                🎥 Vidéo
                                            @else
                                                📋 Embed
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lesson-actions">
                                <a href="{{ route('courses.showLesson', [$course->id, $lesson->id]) }}" class="button blue lesson-button">Voir</a>
                                <a href="{{ route('courses.editLesson', [$course->id, $lesson->id]) }}" class="button green lesson-button">Modifier</a>
                                <form action="{{ route('courses.destroyLesson', [$course->id, $lesson->id]) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette leçon?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="button red lesson-button">Supprimer</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="alert alert-info">
                    Aucune leçon n'a encore été ajoutée à ce cours. 
                    <a href="{{ route('courses.createLesson', $course) }}">Ajouter votre première leçon</a>.
                </div>
            @endif
        </div>
    </div>
</body>
</html>