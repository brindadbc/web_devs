{{-- resources/views/courses/create_lesson.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une leçon | {{ $course->title }}</title>
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

        /* Video type tabs */
        .video-type-tabs {
            display: flex;
            margin-bottom: 15px;
            border-bottom: 1px solid #ddd;
        }

        .video-type-tab {
            padding: 10px 20px;
            cursor: pointer;
            border-bottom: 2px solid transparent;
        }

        .video-type-tab.active {
            border-bottom-color: #FF6B35;
            color: #FF6B35;
            font-weight: 500;
        }

        .video-type-content {
            display: none;
        }

        .video-type-content.active {
            display: block;
        }

        /* Error message */
        .error-message {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
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

        <div class="breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('courses.index') }}">Courses</a></div>
            <div class="breadcrumb-item"><a href="{{ route('courses.indexs') }}">Gérer les Cours</a></div>
            <div class="breadcrumb-item"><a href="{{ route('courses.lessons', $course) }}">{{ $course->title }}</a></div>
            <div class="breadcrumb-item active">Ajouter une leçon</div>
        </div>

        <div class="form-container">
            <h1 class="page-title">Ajouter une nouvelle leçon</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('courses.storeLesson', $course) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title" class="form-label">Titre de la leçon</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                    @error('title')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="order" class="form-label">Ordre de la leçon</label>
                    <input type="number" name="order" id="order" class="form-control" value="{{ old('order') }}" required>
                    @error('order')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="duration" class="form-label">Durée (ex: "15 min", "1h30")</label>
                    <input type="text" name="duration" id="duration" class="form-control" value="{{ old('duration') }}" required>
                    @error('duration')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Type de vidéo</label>
                    <div class="video-type-tabs">
                        <div class="video-type-tab active" data-type="youtube">YouTube</div>
                        <div class="video-type-tab" data-type="vimeo">Vimeo</div>
                        <div class="video-type-tab" data-type="upload">Upload</div>
                        <div class="video-type-tab" data-type="embed">Embed Code</div>
                    </div>

                    <input type="hidden" name="video_type" id="video_type" value="youtube">

                    {{-- <div id="youtube-content" class="video-type-content active">
                        <label for="youtube_url" class="form-label">ID YouTube (ex: dQw4w9WgXcQ)</label>
                        <input type="text" name="youtube_url" id="youtube_url" class="form-control" value="{{ old('youtube_url') }}">
                    </div> --}}
                    <div class="form-group">
                        <label for="youtube_id" class="form-label">ID ou URL YouTube</label>
                        <input type="text" name="youtube_id" id="youtube_id" class="form-control" 
                               placeholder="Collez l'URL complète ou seulement l'ID" value="{{ old('youtube_id') }}">
                        <small class="form-text text-muted">Vous pouvez coller une URL complète comme https://www.youtube.com/watch?v=dQw4w9WgXcQ, l'ID sera extrait automatiquement</small>
                    </div>

                    <div id="vimeo-content" class="video-type-content">
                        <label for="vimeo_url" class="form-label">ID Vimeo (ex: 123456789)</label>
                        <input type="text" name="vimeo_url" id="vimeo_url" class="form-control" value="{{ old('vimeo_url') }}">
                    </div>

                    <div id="upload-content" class="video-type-content">
                        <label for="video_file" class="form-label">Fichier vidéo (MP4)</label>
                        <input type="file" name="video_file" id="video_file" class="form-control" accept="video/mp4">
                    </div>

                    <div id="embed-content" class="video-type-content">
                        <label for="video_embed" class="form-label">Code d'intégration</label>
                        <textarea name="video_embed" id="video_embed" class="form-control" rows="5">{{ old('video_embed') }}</textarea>
                    </div>

                    @error('video_url')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                    @error('video_file')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                    @error('video_embed')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="form-label">Description de la leçon</label>
                    <textarea name="description" id="description" class="form-control" rows="6">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-actions">
                    <a href="{{ route('courses.lessons', $course) }}" class="button">Annuler</a>
                    <button type="submit" class="button green">Enregistrer la leçon</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // JavaScript to handle the video type tabs
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.video-type-tab');
            const contents = document.querySelectorAll('.video-type-content');
            const videoTypeInput = document.getElementById('video_type');

            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    // Remove active class from all tabs and contents
                    tabs.forEach(t => t.classList.remove('active'));
                    contents.forEach(c => c.classList.remove('active'));

                    // Add active class to current tab and content
                    this.classList.add('active');
                    const type = this.getAttribute('data-type');
                    document.getElementById(`${type}-content`).classList.add('active');
                    
                    // Update hidden input value
                    videoTypeInput.value = type;
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
    // Sélectionner le champ d'entrée pour l'ID YouTube
    const youtubeIdInput = document.getElementById('youtube_id');
    
    if (youtubeIdInput) {
        // Ajouter un écouteur d'événement pour l'événement paste ou input
        youtubeIdInput.addEventListener('input', function() {
            const input = this.value.trim();
            
            // Si l'entrée ressemble à une URL YouTube
            if (input.includes('youtube.com') || input.includes('youtu.be')) {
                let youtubeId = extractYoutubeId(input);
                
                if (youtubeId) {
                    // Remplacer l'URL par l'ID uniquement
                    this.value = youtubeId;
                    
                    // Afficher un message de confirmation temporaire
                    showFeedback(this, 'ID YouTube extrait avec succès');
                }
            }
        });
    }
    
    // Fonction pour extraire l'ID YouTube à partir de différents formats d'URL
    function extractYoutubeId(url) {
        // Format standard: https://www.youtube.com/watch?v=VIDEO_ID
        let match = url.match(/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i);
        
        if (match && match[1]) {
            return match[1];
        }
        
        // Si aucune correspondance n'est trouvée, retourner null
        return null;
    }
    
    // Fonction pour afficher un message de feedback temporaire
    function showFeedback(inputElement, message) {
        // Vérifier si un élément de feedback existe déjà
        let feedback = inputElement.parentNode.querySelector('.feedback-message');
        
        // Si non, en créer un nouveau
        if (!feedback) {
            feedback = document.createElement('div');
            feedback.className = 'feedback-message text-success mt-1';
            inputElement.parentNode.appendChild(feedback);
        }
        
        // Définir le message
        feedback.textContent = message;
        
        // Supprimer le message après 3 secondes
        setTimeout(function() {
            feedback.textContent = '';
        }, 3000);
    }
});
    </script>
</body>
</html>