
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $lesson->title }} | {{ $course->title }}</title>
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


        /* CSS pour les étoiles de notation */
    .rating {
        display: inline-flex;
        flex-direction: row-reverse;
        justify-content: flex-end;
    }
    .rating input {
        display: none;
    }
    .rating label {
        cursor: pointer;
        width: 25px;
        height: 25px;
        margin: 0 2px;
        position: relative;
        color: #ccc;
    }
    .rating label:before {
        content: '★';
        font-size: 24px;
        position: absolute;
        top: 0;
        left: 0;
    }
    .rating input:checked ~ label {
        color: #ffca08;
    }
    .rating label:hover,
    .rating label:hover ~ label {
        color: #ffca08;
    }



    /* Lesson actions */
.lesson-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
}

.action-buttons {
    display: flex;
    gap: 15px;
}

/* Rating styles */
.rating-container {
    display: flex;
    align-items: center;
}

.rating-form {
    display: flex;
    align-items: center;
    gap: 15px;
}

.rating-label {
    font-weight: 500;
}

.stars-container {
    display: flex;
    gap: 5px;
}

.stars-container input[type="radio"] {
    display: none;
}

.stars-container label {
    cursor: pointer;
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

.stars-container input[type="radio"]:checked + label {
    background-color: #48B899;
    color: white;
}

/* Navigation between lessons */
.lesson-navigation {
    display: flex;
    justify-content: space-between;
    margin: 40px 0;
}

.navigation-placeholder {
    width: 150px;
}

/* Comments section */
.comments-section {
    margin-top: 50px;
}

.section-title {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 20px;
}

.comment-form-container {
    background-color: white;
    border-radius: 20px;
    padding: 20px;
    margin-bottom: 30px;
    box-shadow: 0 10px 20px rgba(0,0,0,0.05);
}

.comment-input {
    margin-bottom: 15px;
}

.comment-input textarea {
    width: 100%;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 15px;
    resize: vertical;
    font-family: inherit;
}

.comments-list {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.comment-item {
    background-color: white;
    border-radius: 20px;
    padding: 20px;
    box-shadow: 0 10px 20px rgba(0,0,0,0.05);
}

.comment-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.user-info {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.timestamp {
    font-size: 12px;
    color: #666;
}

.comment-content {
    line-height: 1.6;
}

.no-comments {
    background-color: #e9f8f5;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    color: #48B899;
    font-weight: 500;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .lesson-actions {
        flex-direction: column;
        gap: 20px;
        align-items: flex-start;
    }
    
    .comment-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;

    
}
    </style>
</head>
<body>
    {{-- <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $lesson->title }}</h1>
                
                <!-- Affichage de la vidéo selon le type -->
                <div class="lesson-video mb-4">
                    @if($lesson->video_type == 'youtube')
                        <div class="ratio ratio-16x9">
                            <iframe src="https://www.youtube.com/embed/{{ $lesson->video_url }}" allowfullscreen></iframe>
                        </div>
                    @elseif($lesson->video_type == 'vimeo')
                        <div class="ratio ratio-16x9">
                            <iframe src="https://player.vimeo.com/video/{{ $lesson->video_url }}" allowfullscreen></iframe>
                        </div>
                    @elseif($lesson->video_type == 'upload')
                        <video controls class="w-100">
                            <source src="{{ asset('storage/' . $lesson->video_url) }}" type="video/mp4">
                            Votre navigateur ne supporte pas les vidéos HTML5.
                        </video>
                    @elseif($lesson->video_type == 'embed')
                        {!! $lesson->video_url !!}
                    @endif
                </div>
                 --}}

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
                        <div class="breadcrumb-item"><a href="{{ route('courses.lessons', $course) }}">{{ $course->title }}</a></div>
                        <div class="breadcrumb-item active">{{ $lesson->title }}</div>
                    </div>
            
                    <div class="lesson-container">
                        <div class="video-container">
                            <div class="video-wrapper">
                                @if($lesson->video_type == 'youtube')
                                    <iframe src="https://www.youtube.com/embed/{{ $lesson->video_url }}" allowfullscreen></iframe>
                                @elseif($lesson->video_type == 'vimeo')
                                    <iframe src="https://player.vimeo.com/video/{{ $lesson->video_url }}" allowfullscreen></iframe>
                                @elseif($lesson->video_type == 'upload')
                                    <video controls>
                                        <source src="{{ asset('storage/' . $lesson->video_url) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @else
                                    {!! $lesson->video_embed !!}
                                @endif
                            </div>
            
                            <h1 class="lesson-title">{{ $lesson->title }}</h1>
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
            
                            <div class="lesson-description">
                                {!! nl2br(e($lesson->description)) !!}
                            </div>
            
                            <div class="lesson-actions">
                                <a href="{{ route('courses.editLesson', [$course->id, $lesson->id]) }}" class="button green">Modifier cette leçon</a>
                                <a href="{{ route('courses.lessons', $course) }}" class="button">Retour au cours</a>
                            </div>
                        </div>


            
                        <div class="sidebar">
                            <h3 class="sidebar-title">Leçons de ce cours</h3>
                            <ul class="lessons-list">
                                @foreach($courseLessons as $courseLesson)
                                    <a href="{{ route('courses.showLesson', [$course->id, $courseLesson->id]) }}">
                                        <li class="sidebar-lesson {{ $courseLesson->id == $lesson->id ? 'active' : '' }}">
                                            <div class="sidebar-lesson-number">{{ $courseLesson->order }}</div>
                                            <div class="sidebar-lesson-title">{{ $courseLesson->title }}</div>
                                            <div class="small {{ $courseLesson->id == $lesson->id ? 'text-white-50' : 'text-muted' }}">
                                                <i class="fa fa-clock"></i> {{ $courseLesson->duration }}
                                            </div>
                                        </li>
                                    </a>
                                    
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div> 

        </div>
    </div>
   
    <div class="lesson-actions">
        <div class="action-buttons">
            <!-- Like button -->
            <form action="{{ route('courses.lessons.like', [$course->id, $lesson->id]) }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="button {{ $userLiked ? 'blue' : '' }}">
                    <i class="fa fa-thumbs-up"></i> {{ $lesson->likes()->count() }} J'aime
                </button>
            </form>
            
            <!-- Favoris button -->
            <form action="{{ route('courses.lessons.favorite', [$course->id, $lesson->id]) }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="button {{ $userFavorited ? 'green' : '' }}">
                    <i class="fa fa-star"></i> {{ $userFavorited ? 'Retirer des favoris' : 'Ajouter aux favoris' }}
                </button>
            </form>
        </div>
       
        
        <!-- Notation -->
        <div class="rating-container">
            <form action="{{ route('courses.lessons.rate', [$course->id, $lesson->id]) }}" method="POST" class="rating-form">
                @csrf
                <div class="rating-label">Noter:</div>
                <div class="stars-container">
                    @for($i = 1; $i <= 5; $i++)
                        <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" {{ $userRating == $i ? 'checked' : '' }} />
                        <label for="star{{ $i }}">{{ $i }}</label>
                    @endfor
                </div>
                <button type="submit" class="button green">Valider</button>
            </form>
        </div>
    </div>
   
    
    <!-- Navigation entre leçons -->
    <div class="lesson-navigation">
        @if($prevLesson)
            <a href="{{ route('courses.show_lesson', [$course->id, $prevLesson->id]) }}" class="button blue">
                <i class="fa fa-arrow-left"></i> Leçon précédente
            </a>
        @else
            <div class="navigation-placeholder"></div>
        @endif
        
        @if($nextLesson)
            <a href="{{ route('courses.show_lesson', [$course->id, $nextLesson->id]) }}" class="button blue">
                Leçon suivante <i class="fa fa-arrow-right"></i>
            </a>
        @else
            <div class="navigation-placeholder"></div>
        @endif
    </div>
    
    <!-- Section Commentaires -->
    <div class="comments-section">
        <h3 class="section-title">Commentaires ({{ $comments->count() }})</h3>
        
        <!-- Formulaire de commentaire -->
        <div class="comment-form-container">
            <form action="{{ route('courses.lessons.comment', [$course->id, $lesson->id]) }}" method="POST">
                @csrf
                <div class="comment-input">
                    <textarea name="content" rows="3" placeholder="Ajouter un commentaire..." required></textarea>
                </div>
                <button type="submit" class="button blue">Commenter</button>
            </form>
        </div>
        
        <!-- Liste des commentaires -->
        <div class="comments-list">
            @forelse($comments as $comment)
                <div class="comment-item">
                    <div class="comment-header">
                        <div class="user-info">
                            <strong>{{ $comment->user->name }}</strong>
                            <span class="timestamp">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                      
                        
                        @if(Auth::id() == $comment->user_id)
                            <form action="{{ route('courses.lessons.comment.delete', [$course->id, $lesson->id, $comment->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button red" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire?')">
                                    <i class="fa fa-trash">supprimer</i>
                                </button>
                            </form>
                            @endif
                    </div>
                    <div class="comment-content">
                        {{ $comment->content }}
                    </div>
                </div>
               
            @empty
                <div class="no-comments">Aucun commentaire pour cette leçon. Soyez le premier à commenter!</div>
            </div>
                @endforelse
        
    </div>








   
</body>
</html>