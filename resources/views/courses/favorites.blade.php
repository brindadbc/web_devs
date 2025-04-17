<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>{{ $lesson->title }} | {{ $course->title }}</title> --}}
    <style>
        /* Reset and Base Styles */
        /* Style général */

        {
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

        /* Lesson layout */
        .lesson-container {
            display: flex;
            gap: 30px;
            margin-bottom: 40px;
        }

        .video-container {
            flex: 2;
            background-color: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        }

        .sidebar {
            flex: 1;
            background-color: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        }

        /* Video styling */
        .video-wrapper {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
            height: 0;
            overflow: hidden;
            border-radius: 15px;
            margin-bottom: 20px;
        }

        .video-wrapper iframe, 
        .video-wrapper video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        /* Lesson content */
        .lesson-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .lesson-meta {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
            color: #666;
        }

        .lesson-description {
            margin-bottom: 30px;
        }

        /* Lessons list in sidebar */
        .lessons-list {
            list-style: none;
        }

        .sidebar-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .sidebar-lesson {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-lesson.active {
            background-color: #e9f8f5;
        }

        .sidebar-lesson-number {
            width: 30px;
            height: 30px;
            background-color: #e9f8f5;
            color: #48B899;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .sidebar-lesson.active .sidebar-lesson-number {
            background-color: #48B899;
            color: white;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .lesson-container {
                flex-direction: column;
            }
            
            .video-container, .sidebar {
                width: 100%;
            }
        }


.container {
  max-width: 1200px;
  padding: 2rem 1rem;
  font-family: 'Poppins', sans-serif;
}

h1 {
  color: #3a3a3a;
  margin-bottom: 2rem;
  position: relative;
  padding-bottom: 0.5rem;
  font-weight: 700;
}

h1:after {
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  width: 60px;
  height: 4px;
  background: #4a6fdc;
  border-radius: 2px;
}

/* Cartes des favoris */
.card {
  border: none;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
  transition: transform 0.3s, box-shadow 0.3s;
  border-radius: 8px;
  overflow: hidden;
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 16px rgba(0,0,0,0.12);
}

.card-body {
  padding: 1.5rem;
}

.card-title {
  color: #3a3a3a;
  font-weight: 600;
  margin-bottom: 0.75rem;
}

.card-subtitle {
  color: #4a6fdc;
  font-weight: 500;
  font-size: 0.9rem;
  margin-bottom: 1rem;
}

.card-text {
  color: #6c757d;
  font-size: 0.95rem;
  line-height: 1.5;
}

.card-footer {
  background-color: #f8f9fa;
  border-top: 1px solid #f0f0f0;
  padding: 1rem 1.5rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

/* Boutons */
.btn {
  border-radius: 6px;
  font-weight: 500;
  padding: 0.5rem 1rem;
  transition: all 0.3s;
}

.btn-primary {
  background-color: #4a6fdc;
  border-color: #4a6fdc;
}

.btn-primary:hover {
  background-color: #3d5cba;
  border-color: #3d5cba;
}

.btn-warning {
  background-color: #ffc107;
  border-color: #ffc107;
  color: #212529;
}

.btn-warning:hover {
  background-color: #e0a800;
  border-color: #e0a800;
}

/* Alerte */
.alert {
  border-radius: 8px;
  padding: 1rem 1.5rem;
  margin-bottom: 2rem;
  border-left: 4px solid;
}

.alert-success {
  background-color: #d4edda;
  color: #155724;
  border-left-color: #28a745;
}

.alert-info {
  background-color: #e1f0ff;
  color: #0c5460;
  border-left-color: #4a6fdc;
  padding: 2rem;
  text-align: center;
  font-size: 1.1rem;
}

/* Ajustements responsive */
@media (max-width: 767px) {
  .card-footer {
    flex-direction: column;
    gap: 0.75rem;
  }
  
  .card-footer form {
    width: 100%;
  }
  
  .card-footer .btn {
    width: 100%;
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



    <h1>Mes Favoris</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    @if($favoriteItems->count() > 0)
        <div class="row">
            @foreach($favoriteItems as $favorite)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $favorite->lesson->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $favorite->lesson->course->title }}</h6>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($favorite->lesson->description, 100) }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('courses.show_lesson', [$favorite->lesson->course_id, $favorite->lesson->id]) }}" class="btn btn-primary">Voir la leçon</a>
                            <form action="{{ route('courses.lessons.favorite', [$favorite->lesson->course_id, $favorite->lesson->id]) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-warning">
                                    <i class="fa fa-star"></i> Retirer des favoris
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">
            Vous n'avez pas encore de leçons en favoris.
        </div>
    @endif
</div>
</body>
</html>