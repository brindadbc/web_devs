
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la leçon | {{ $lesson->title }}</title>
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

        /* Form Styles */
        .form-container {
            background-color: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            margin-bottom: 40px;
        }

        .page-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 30px;
        }

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

        .form-select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%23333' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 30px;
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-check-input {
            width: 18px;
            height: 18px;
        }

        /* Video preview */
        .video-preview {
            margin-top: 20px;
            border-radius: 10px;
            overflow: hidden;
            background-color: #f4f4f4;
            height: 0;
            padding-bottom: 56.25%; /* 16:9 aspect ratio */
            position: relative;
        }

        .video-preview iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .video-preview-placeholder {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 250px;
            background-color: #f4f4f4;
            color: #666;
            border-radius: 10px;
        }

        /* Alert Styles */
        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .form-actions {
                flex-direction: column;
            }
            
            .button, .cta-button {
                width: 100%;
                text-align: center;
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
                <a href="/courses" class="active">Courses</a>
                <a href="/about">About</a>
                <a href="/contact">Contact</a>
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

        <div class="breadcrumb">
            <div class="breadcrumb-item">
                <a href="{{ route('courses.indexs') }}">Cours</a>
            </div>
            <div class="breadcrumb-item">
                <a href="{{ route('courses.show', $course) }}">{{ $course->title }}</a>
            </div>
            <div class="breadcrumb-item">
                <a href="{{ route('courses.lessons', $course) }}">Leçons</a>
            </div>
            <div class="breadcrumb-item active">Modifier la leçon</div>
        </div>

        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul style="margin-bottom: 0; list-style-type: none;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="form-container">
            <h1 class="page-title">Modifier la leçon</h1>

            <form action="{{ route('courses.updateLesson', [$course, $lesson]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label" for="title">Titre</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $lesson->title) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5">{{ old('description', $lesson->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label" for="video_type">Type de Vidéo</label>
                    <select class="form-select" id="video_type" name="video_type">
                        <option value="youtube" {{ old('video_type', $lesson->video_type) == 'youtube' ? 'selected' : '' }}>YouTube</option>
                        <option value="vimeo" {{ old('video_type', $lesson->video_type) == 'vimeo' ? 'selected' : '' }}>Vimeo</option>
                        <option value="uploaded" {{ old('video_type', $lesson->video_type) == 'uploaded' ? 'selected' : '' }}>Vidéo uploadée</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="video_url">URL de la Vidéo</label>
                    <input type="text" class="form-control" id="video_url" name="video_url" value="{{ old('video_url', $lesson->video_url) }}">
                    <small id="videoUrlHelp" class="form-text text-muted">Pour YouTube: collez l'URL complète (ex: https://www.youtube.com/watch?v=XXXXXXXXXXX)</small>
                </div>

                <div class="form-group">
                    <label class="form-label" for="video_preview">Aperçu de la vidéo</label>
                    <div class="video-preview" id="video_preview">
                        @if($lesson->video_url)
                            {!! $lesson->video_embed !!}
                        @else
                            <div class="video-preview-placeholder">
                                L'aperçu de la vidéo apparaîtra ici
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="duration_minutes">Durée (minutes)</label>
                    <input type="number" class="form-control" id="duration_minutes" name="duration_minutes" value="{{ old('duration_minutes', $lesson->duration_minutes) }}" min="1">
                </div>

                <div class="form-group">
                    <label class="form-label" for="order">Ordre</label>
                    <input type="number" class="form-control" id="order" name="order" value="{{ old('order', $lesson->order) }}" min="1">
                    <small class="form-text text-muted">Position de cette leçon dans le cours</small>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_free" name="is_free" value="1" {{ old('is_free', $lesson->is_free) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_free">Leçon gratuite</label>
                    </div>
                    <small class="form-text text-muted">Les leçons gratuites sont accessibles à tous les utilisateurs sans inscription</small>
                </div>

                <div class="form-actions">
                    <a href="{{ route('courses.lessons', $course) }}" class="button" style="background-color: #999;">Annuler</a>
                    <button type="submit" class="button green">Enregistrer les modifications</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Video preview functionality
        document.addEventListener('DOMContentLoaded', function() {
            const videoTypeSelect = document.getElementById('video_type');
            const videoUrlInput = document.getElementById('video_url');
            const videoPreview = document.getElementById('video_preview');
            const videoUrlHelp = document.getElementById('videoUrlHelp');

            // Function to update the preview based on the video URL and type
            function updateVideoPreview() {
                const videoType = videoTypeSelect.value;
                const videoUrl = videoUrlInput.value.trim();
                
                if (!videoUrl) {
                    videoPreview.innerHTML = '<div class="video-preview-placeholder">L\'aperçu de la vidéo apparaîtra ici</div>';
                    return;
                }

                let embedHtml = '';
                
                if (videoType === 'youtube') {
                    // Extract YouTube ID
                    const regex = /(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/;
                    const match = videoUrl.match(regex);
                    
                    if (match && match[1]) {
                        const videoId = match[1];
                        embedHtml = `<iframe width="100%" height="100%" src="https://www.youtube.com/embed/${videoId}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
                        videoUrlHelp.textContent = 'Pour YouTube: collez l\'URL complète (ex: https://www.youtube.com/watch?v=XXXXXXXXXXX)';
                    } else {
                        embedHtml = '<div class="video-preview-placeholder">URL YouTube non valide</div>';
                        videoUrlHelp.textContent = 'URL YouTube non valide. Format: https://www.youtube.com/watch?v=XXXXXXXXXXX';
                    }
                } else if (videoType === 'vimeo') {
                    // Extract Vimeo ID
                    const regex = /vimeo\.com\/(?:video\/)?(\d+)/;
                    const match = videoUrl.match(regex);
                    
                    if (match && match[1]) {
                        const videoId = match[1];
                        embedHtml = `<iframe src="https://player.vimeo.com/video/${videoId}" width="100%" height="100%" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>`;
                        videoUrlHelp.textContent = 'Pour Vimeo: collez l\'URL complète (ex: https://vimeo.com/123456789)';
                    } else {
                        embedHtml = '<div class="video-preview-placeholder">URL Vimeo non valide</div>';
                        videoUrlHelp.textContent = 'URL Vimeo non valide. Format: https://vimeo.com/123456789';
                    }
                } else if (videoType === 'uploaded') {
                    // Handle uploaded video preview
                    embedHtml = '<div class="video-preview-placeholder">Prévisualisation non disponible pour les vidéos uploadées</div>';
                    videoUrlHelp.textContent = 'Pour les vidéos uploadées: entrez le chemin du fichier';
                }
                
                videoPreview.innerHTML = embedHtml;
            }

            // Initial update
            updateVideoPreview();
            
            // Update preview when video URL or type changes
            videoUrlInput.addEventListener('input', updateVideoPreview);
            videoTypeSelect.addEventListener('change', updateVideoPreview);
        });
    </script>
</body>
</html>