

{{-- @extends('layouts.app')

@section('title', 'Student Dashboard')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold">Student Dashboard</h2>
        <p class="mt-2">Hi, {{ auth()->user()->name }}! You are logged in as a student.</p>
        <p class="mt-2">Hi, {{ auth()->user()->name }}! vous etes connecté en tant étudiant</p>
    </div>

     <!-- Logout Button -->
     <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
        <h2>Liste des Cours Disponibles</h2>

        @if($cours->isEmpty())
            <p>Aucun cours disponible pour le moment.</p>
        @else
        
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Enseignant</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cours as $cour)
                        <tr>
                            <td>{{ $cour->id }}</td>
                            <td>{{ $cour->titre }}</td>
                            <td>{{ $cour->description }}</td>
                            <td>{{ $cour->enseignant->name ?? 'Inconnu' }}</td>
                            <td>
                                <a href="{{ route('cour.show', $cour->id) }}" class="btn btn-primary">Voir</a>
                                <a href="{{ route('categorie.index') }}" class="btn btn-success">categorie</a> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif --}}
    
{{-- 
        <h2>Tableau de bord - Mes cours suivis</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Enseignant</th>
                    <th>Date d'inscription</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cours as $cour)
                    <tr>
                        <td>{{ $cour->id }}</td>
                        <td>{{ $cour->titre }}</td>
                        <td>{{ $cour->description }}</td>
                        <td>{{ $cour->teacher }}</td>
                        <td>{{ $cour->pivot->created_at->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table> --}}
{{-- @endsection --}}


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Étudiant - TUTOACADEMY</title>
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
            display: flex;
            min-height: 100vh;
        }
        
        a {
            text-decoration: none;
            color: inherit;
        }
        
        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background-color: #333;
            color: white;
            padding: 30px 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }
        
        .sidebar-logo {
            font-size: 24px;
            font-weight: 700;
            padding: 0 20px 30px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 20px;
            color: white;
        }
        
        .sidebar-menu {
            list-style: none;
        }
        
        .sidebar-menu-item {
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .sidebar-menu-item:hover, .sidebar-menu-item.active {
            background-color: rgba(255,255,255,0.1);
        }
        
        .sidebar-menu-item.active {
            border-left: 4px solid #FF6B35;
        }
        
        .sidebar-icon {
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .sidebar-profile {
            padding: 20px;
            margin-top: auto;
            border-top: 1px solid rgba(255,255,255,0.1);
            display: flex;
            align-items: center;
            gap: 12px;
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: #333;
        }
        
        .profile-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #FF6B35;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        
        .profile-info {
            overflow: hidden;
        }
        
        .profile-name {
            font-weight: 600;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        .profile-role {
            font-size: 12px;
            color: rgba(255,255,255,0.7);
        }
        
        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 250px;
            padding: 30px;
            max-width: calc(100vw - 250px);
        }
        
        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .page-title {
            font-size: 24px;
            font-weight: 700;
        }
        
        .header-actions {
            display: flex;
            gap: 15px;
            align-items: center;
        }
        
        .search-form {
            position: relative;
        }
        
        .search-input {
            padding: 10px 15px 10px 40px;
            border: 1px solid #ddd;
            border-radius: 50px;
            width: 250px;
            font-size: 14px;
            outline: none;
        }
        
        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }
        
        .notification-bell {
            width: 40px;
            height: 40px;
            background-color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            position: relative;
        }
        
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 18px;
            height: 18px;
            background-color: #FF6B35;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 11px;
            font-weight: 600;
        }
        
        /* Dashboard Cards */
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }
        
        .dashboard-card {
            background-color: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .dashboard-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .dashboard-card-title {
            font-weight: 600;
            color: #666;
        }
        
        .dashboard-card-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 16px;
        }
        
        .icon-courses {
            background-color: #FF6B35;
        }
        
        .icon-complete {
            background-color: #48B899;
        }
        
        .icon-progress {
            background-color: #6B66F8;
        }
        
        .icon-certificate {
            background-color: #F8C546;
        }
        
        .dashboard-card-value {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .dashboard-card-stats {
            display: flex;
            align-items: center;
            color: #666;
            font-size: 14px;
        }
        
        /* Course Cards */
        .section-heading {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .view-all {
            font-size: 14px;
            color: #FF6B35;
            font-weight: 500;
        }
        
        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }
        
        .course-card {
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }
        
        .course-card:hover {
            transform: translateY(-5px);
        }
        
        .course-card-header {
            position: relative;
            height: 120px;
            background-color: #f4f4f4;
        }
        
        .course-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .course-progress-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 5px 10px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .progress-low {
            background-color: #feedeb;
            color: #f87171;
        }
        
        .progress-medium {
            background-color: #fef3c7;
            color: #d97706;
        }
        
        .progress-high {
            background-color: #d1fae5;
            color: #059669;
        }
        
        .course-card-body {
            padding: 20px;
        }
        
        .course-card-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .course-instructor {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            font-size: 14px;
            color: #666;
        }
        
        .instructor-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 12px;
        }
        
        .course-progress {
            height: 5px;
            background-color: #e5e7eb;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        
        .progress-bar {
            height: 100%;
            background-color: #FF6B35;
            border-radius: 5px;
        }
        
        .progress-text {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: #666;
            margin-bottom: 15px;
        }
        
        .course-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .course-duration {
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
            color: #666;
        }
        
        .continue-btn {
            background-color: #FF6B35;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .continue-btn:hover {
            background-color: #e55a24;
        }

        /* Learning Path Progress */
        .learning-path {
            margin-bottom: 30px;
        }
        
        .path-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .path-title {
            font-size: 18px;
            font-weight: 600;
        }
        
        .path-progress-text {
            font-size: 14px;
            color: #666;
        }
        
        .path-progress-bar {
            height: 10px;
            background-color: #e5e7eb;
            border-radius: 5px;
            margin-bottom: 15px;
            position: relative;
        }
        
        .path-progress-fill {
            height: 100%;
            background-color: #FF6B35;
            border-radius: 5px;
        }
        
        .path-milestones {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin-top: -20px;
            margin-bottom: 15px;
        }
        
        .milestone {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background-color: white;
            border: 2px solid #e5e7eb;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }
        
        .milestone.completed {
            background-color: #FF6B35;
            border-color: #FF6B35;
            color: white;
        }
        
        .milestone.current {
            border-color: #FF6B35;
            color: #FF6B35;
            font-weight: 600;
        }
        
        .milestone-label {
            position: absolute;
            top: 30px;
            transform: translateX(-50%);
            font-size: 12px;
            color: #666;
            text-align: center;
            width: 80px;
        }

        /* Assignment and calendar section */
        .assignments-and-calendar {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }
        
        .assignment-card {
            display: flex;
            padding: 15px;
            background-color: white;
            border-radius: 10px;
            margin-bottom: 15px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            border-left: 4px solid #FF6B35;
        }
        
        .assignment-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }
        
        .assignment-details {
            flex: 1;
        }
        
        .assignment-title {
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .assignment-course {
            font-size: 12px;
            color: #666;
            margin-bottom: 10px;
        }
        
        .assignment-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
        }
        
        .assignment-due {
            color: #f87171;
            font-weight: 500;
        }
        
        .submit-btn {
            background-color: transparent;
            color: #FF6B35;
            border: 1px solid #FF6B35;
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .submit-btn:hover {
            background-color: #FF6B35;
            color: white;
        }
        
        /* Calendar */
        .calendar-card {
            background-color: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .calendar-title {
            font-weight: 600;
        }
        
        .calendar-nav {
            display: flex;
            gap: 10px;
        }
        
        .calendar-nav-button {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
        
        .calendar-weekdays {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            text-align: center;
            font-weight: 600;
            color: #666;
            margin-bottom: 10px;
        }
        
        .calendar-days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
        }
        
        .calendar-day {
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            cursor: pointer;
            font-size: 14px;
        }
        
        .calendar-day:hover {
            background-color: #f4f4f4;
        }
        
        .calendar-day.current {
            background-color: #FF6B35;
            color: white;
            font-weight: 600;
        }
        
        .calendar-day.has-event {
            position: relative;
        }
        
        .calendar-day.has-event::after {
            content: '';
            position: absolute;
            bottom: 3px;
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background-color: #48B899;
        }

        /* Recommended courses section */
        .recommended-course {
            display: flex;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 15px;
            transition: transform 0.3s ease;
        }
        
        .recommended-course:hover {
            transform: translateY(-3px);
        }
        
        .recommended-course-img {
            width: 120px;
            height: 100px;
            object-fit: cover;
        }
        
        .recommended-course-content {
            padding: 15px;
            flex: 1;
        }
        
        .recommended-course-title {
            font-weight: 600;
            font-size: 15px;
            margin-bottom: 5px;
        }
        
        .recommended-course-details {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: #666;
            margin-bottom: 10px;
        }
        
        .recommended-course-button {
            background-color: #FF6B35;
            color: white;
            border: none;
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .recommended-course-button:hover {
            background-color: #e55a24;
        }
        
        /* Responsive */
        @media (max-width: 1024px) {
            .assignments-and-calendar {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                height: auto;
                position: static;
                padding: 15px 0;
            }
            
            .sidebar-profile {
                position: static;
                margin-top: 20px;
            }
            
            .main-content {
                margin-left: 0;
                max-width: 100%;
                padding: 20px;
            }
            
            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }
            
            .header-actions {
                width: 100%;
                justify-content: space-between;
            }
            
            .search-input {
                width: 200px;
            }
            
            .dashboard-cards {
                grid-template-columns: 1fr;
            }
            
            .courses-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-logo">TUTOACADEMY</div>
        <ul class="sidebar-menu">
            <li class="sidebar-menu-item active">
                <div class="sidebar-icon">📊</div>
                <span>Tableau de bord</span>
            </li>
            <li class="sidebar-menu-item">
                <div class="sidebar-icon">📚</div>
                <span> <a href="{{route('categories.index')}}">Mes cours</a></span>
            </li>
            <li class="sidebar-menu-item">
                <div class="sidebar-icon">📝</div>
                <span>Devoirs</span>
            </li>
            <li class="sidebar-menu-item">
                <div class="sidebar-icon">📅</div>
                <span>Calendrier</span>
            </li>
            <li class="sidebar-menu-item">
                <div class="sidebar-icon">🛒</div>
                <span><a href="{{route('categories.index')}}">Catalogue</a></span>
            </li>
           
            <li class="sidebar-menu-item">
                <div class="sidebar-icon">💬</div>
                <span><a href="{{route('chat.index')}}">Messages</a></span>
            </li>
          
        </ul>
       
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <div class="sidebar-profile">
            <div class="profile-avatar"></div>
            <div class="profile-info">
        {{-- <p class="mt-2">Hi, {{ auth()->user()->name }}! You are logged in as a student.</p> --}}
        <p class="mt-2">Hi, {{ auth()->user()->name }}! vous etes connecté en tant étudiant</p>
    </div>
</div>
</div>
</div>
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <div>
                <h1 class="mt-2">Bonjour, {{ auth()->user()->name }} 👋</h1>
                    <p style="color: #666;">Continuez votre apprentissage là où vous vous êtes arrêtée</p>
            </div>
            <div class="header-actions">
                <form class="search-form">
                    <div class="search-icon">🔍</div>
                    <input type="text" class="search-input" placeholder="Rechercher un cours...">
                </form>
                <div class="notification-bell">
                    🔔
                    <div class="notification-badge">5</div>
                </div>
            </div>
        </div>
        
        <!-- Stats Cards -->
        <div class="dashboard-cards">
            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <div class="dashboard-card-title">Cours inscrits</div>
                    <div class="dashboard-card-icon icon-courses">📚</div>
                </div>
                <div class="dashboard-card-value">6</div>
                <div class="dashboard-card-stats">
                    +2 ce mois
                </div>
            </div>
            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <div class="dashboard-card-title">Cours terminés</div>
                    <div class="dashboard-card-icon icon-complete">✅</div>
                </div>
                <div class="dashboard-card-value">2</div>
                <div class="dashboard-card-stats">
                    +1 ce mois
                </div>
            </div>
            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <div class="dashboard-card-title">En cours</div>
                    <div class="dashboard-card-icon icon-progress">🔄


                    </div>
                    <div class="dashboard-card-value">4</div>
                    <div class="dashboard-card-stats">
                        80 heures d'apprentissage
                    </div>
                </div>
                <div class="dashboard-card">
                    <div class="dashboard-card-header">
                        <div class="dashboard-card-title">Certificats</div>
                        <div class="dashboard-card-icon icon-certificate">🏆</div>
                    </div>
                    <div class="dashboard-card-value">2</div>
                    <div class="dashboard-card-stats">
                        Félicitations!
                    </div>
                </div>
            </div>
            
            <!-- Learning Path Progress -->
            <div class="learning-path">
                <div class="path-header">
                    <div class="path-title">Parcours d'apprentissage: Développement Web Full Stack</div>
                    <div class="path-progress-text">45% terminé</div>
                </div>
                <div class="path-progress-bar">
                    <div class="path-progress-fill" style="width: 45%;"></div>
                </div>
                <div class="path-milestones">
                    <div class="milestone completed">1</div>
                    <div class="milestone completed">2</div>
                    <div class="milestone current">3</div>
                    <div class="milestone">4</div>
                    <div class="milestone">5</div>
                    
                    <div class="milestone-label" style="left: 0%">HTML/CSS</div>
                    <div class="milestone-label" style="left: 25%">JavaScript</div>
                    <div class="milestone-label" style="left: 50%">React</div>
                    <div class="milestone-label" style="left: 75%">Node.js</div>
                    <div class="milestone-label" style="left: 100%">Projet</div>
                </div>
            </div>
            
            <!-- Your Courses -->
            <div class="section-heading">
                <h2>Vos cours en cours</h2>
                <a href="{{route('courses.indexs')}}" class="view-all">Voir tout</a>
            </div>
            <div class="courses-grid">
                <div class="course-card">
                    <div class="course-card-header">
                        <img src="/api/placeholder/400/320" alt="React - Les fondamentaux" class="course-image">
                        <div class="course-progress-badge progress-medium">65% terminé</div>
                    </div>
                    <div class="course-card-body">
                        <h3 class="course-card-title">React - Les fondamentaux</h3>
                        <div class="course-instructor">
                            <p class="mt-2"> {{ auth()->user()->name }} </p>
                        </div>
                        <div class="course-progress">
                            <div class="progress-bar" style="width: 65%"></div>
                        </div>
                        <div class="progress-text">
                            <span>Progression: 65%</span>
                            <span>13/20 leçons</span>
                        </div>
                        <div class="course-card-footer">
                            <div class="course-duration">⏱️ 3h restantes</div>
                            <button class="continue-btn"><a href="{{route('courses.indexs')}}">Continuer</a></button>
                        </div>
                    </div>
                </div>
                
                <div class="course-card">
                    <div class="course-card-header">
                        <img src="/api/placeholder/400/320" alt="UX/UI Design Avancé" class="course-image">
                        <div class="course-progress-badge progress-low">28% terminé</div>
                    </div>
                    <div class="course-card-body">
                        <h3 class="course-card-title">UX/UI Design Avancé</h3>
                        <div class="course-instructor">
                            <p class="mt-2"> {{ auth()->user()->name }} </p>
                        </div>
                        <div class="course-progress">
                            <div class="progress-bar" style="width: 28%"></div>
                        </div>
                        <div class="progress-text">
                            <span>Progression: 28%</span>
                            <span>5/18 leçons</span>
                        </div>
                        <div class="course-card-footer">
                            <div class="course-duration">⏱️ 8h restantes</div>
                            <button class="continue-btn"><a href="{{route('courses.indexs')}}">Continuer</a></button>
                        </div>
                    </div>
                </div>
                
                <div class="course-card">
                    <div class="course-card-header">
                        <img src="/api/placeholder/400/320" alt="Git pour la collaboration" class="course-image">
                        <div class="course-progress-badge progress-high">82% terminé</div>
                    </div>
                    <div class="course-card-body">
                        <h3 class="course-card-title">Git pour la collaboration</h3>
                        <div class="course-instructor">
                            <p class="mt-2"> {{ auth()->user()->name }} </p>
                        </div>
                        <div class="course-progress">
                            <div class="progress-bar" style="width: 82%"></div>
                        </div>
                        <div class="progress-text">
                            <span>Progression: 82%</span>
                            <span>9/11 leçons</span>
                        </div>
                        <div class="course-card-footer">
                            <div class="course-duration">⏱️ 1h restante</div>
                            <button class="continue-btn"><a href="{{route('courses.indexs')}}">continuer</a></button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Assignments and Calendar Section -->
            <div class="assignments-and-calendar">
                <div class="assignments">
                    <div class="section-heading">
                        <h2>Devoirs à rendre</h2>
                        <a href="{{route('categories.index')}}" class="view-all">Voir tout</a>
                    </div>
                    
                    <div class="assignment-card">
                        <div class="assignment-icon">📝</div>
                        <div class="assignment-details">
                            <div class="assignment-title">Projet React: Todo List</div>
                            <div class="assignment-course">React - Les fondamentaux</div>
                            <div class="assignment-footer">
                                <div class="assignment-due">À rendre: 10 avril 2025</div>
                                <button class="submit-btn"><a href="{{route('teacher.dashboard')}}"></a>Soumettre</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="assignment-card">
                        <div class="assignment-icon">📝</div>
                        <div class="assignment-details">
                            <div class="assignment-title">Étude de cas UX</div>
                            <div class="assignment-course">UX/UI Design Avancé</div>
                            <div class="assignment-footer">
                                <div class="assignment-due">À rendre: 15 juin 2025</div>
                                <button class="submit-btn">Soumettre</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="assignment-card">
                        <div class="assignment-icon">📝</div>
                        <div class="assignment-details">
                            <div class="assignment-title">Exercice Git Flow</div>
                            <div class="assignment-course">Git pour la collaboration</div>
                            <div class="assignment-footer">
                                <div class="assignment-due">À rendre: 8 juin 2025</div>
                                <button class="submit-btn">Soumettre</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- <div>
                    <div class="calendar-card">
                        <div class="calendar-header">
                            <div class="calendar-title">Avril 2025</div>
                            <div class="calendar-nav">
                                <div class="calendar-nav-button">←</div>
                                <div class="calendar-nav-button">→</div>
                            </div>
                        </div>
                        <div class="calendar-weekdays">
                            <div>L</div>
                            <div>M</div>
                            <div>M</div>
                            <div>J</div>
                            <div>V</div>
                            <div>S</div>
                            <div>D</div>
                        </div>
                        <div class="calendar-days">
                            <div class="calendar-day">31</div>
                            <div class="calendar-day">1</div>
                            <div class="calendar-day">2</div>
                            <div class="calendar-day">3</div>
                            <div class="calendar-day">4</div>
                            <div class="calendar-day">5</div>
                            <div class="calendar-day has-event">6</div>
                            <div class="calendar-day has-event current">7</div>
                            <div class="calendar-day has-event">8</div>
                            <div class="calendar-day">9</div>
                            <div class="calendar-day has-event">10</div>
                            <div class="calendar-day">11</div>
                            <div class="calendar-day">12</div>
                            <div class="calendar-day">13</div>
                            <div class="calendar-day">14</div>
                            <div class="calendar-day has-event">15</div>
                            <div class="calendar-day">16</div>
                            <div class="calendar-day">17</div>
                            <div class="calendar-day">18</div>
                            <div class="calendar-day">19</div>
                            <div class="calendar-day">20</div>
                            <div class="calendar-day">21</div>
                            <div class="calendar-day">22</div>
                            <div class="calendar-day">23</div>
                            <div class="calendar-day">24</div>
                            <div class="calendar-day">25</div>
                            <div class="calendar-day">26</div>
                            <div class="calendar-day">27</div>
                            <div class="calendar-day">28</div>
                            <div class="calendar-day">29</div>
                            <div class="calendar-day">30</div>
                            <div class="calendar-day">1</div>
                            <div class="calendar-day">2</div>
                            <div class="calendar-day">3</div>
                            <div class="calendar-day">4</div>
                        </div>
                    </div>
                </div>
            </div> --}}
            
            <!-- Recommended Courses -->
            <div class="section-heading">
                <h2>Cours recommandés pour vous</h2>
                <a href="{{route('categories.index')}}" class="view-all">Explorer le catalogue</a>
            </div>
            
            <div class="recommended-courses">
                <div class="recommended-course">
                    <img src="/api/placeholder/400/320" alt="Node.js pour débutants" class="recommended-course-img">
                    <div class="recommended-course-content">
                        <h3 class="recommended-course-title">Node.js pour débutants</h3>
                        <div class="recommended-course-details">
                            <p class="mt-2"> {{ auth()->user()->name }} </p>
                            <span>4.8 ★ (428 avis)</span>
                        </div>
                        <button class="recommended-course-button">S'inscrire</button>
                    </div>
                </div>
                
                <div class="recommended-course">
                    <img src="/api/placeholder/400/320" alt="Base de données SQL/NoSQL" class="recommended-course-img">
                    <div class="recommended-course-content">
                        <h3 class="recommended-course-title">Base de données SQL/NoSQL</h3>
                        <div class="recommended-course-details">
                            <span>Sophie Dubois • 18h de contenu</span>
                            <span>4.7 ★ (356 avis)</span>
                        </div>
                        <button class="recommended-course-button">S'inscrire</button>
                    </div>
                </div>
                
                <div class="recommended-course">
                    <img src="/api/placeholder/400/320" alt="APIs RESTful avec Express" class="recommended-course-img">
                    <div class="recommended-course-content">
                        <h3 class="recommended-course-title">APIs RESTful avec Express</h3>
                        <div class="recommended-course-details">
                            <span>Marc Bernard • 12h de contenu</span>
                            <span>4.9 ★ (512 avis)</span>
                        </div>
                        <button class="recommended-course-button">S'inscrire</button>
                    </div>
                </div>
            </div>
            
    
            
            <!-- Footer -->
            <div style="text-align: center; margin-top: 50px; padding: 20px 0; border-top: 1px solid #eee; color: #666; font-size: 14px;">
                <div>© 2025 TUTOACADEMY - Tous droits réservés</div>
                <div style="margin-top: 10px;">
                    <a href="#" style="color: #666; margin: 0 10px;">Aide</a>
                    <a href="#" style="color: #666; margin: 0 10px;">Conditions d'utilisation</a>
                    <a href="#" style="color: #666; margin: 0 10px;">Politique de confidentialité</a>
                    <a href="{{route('chat.index')}}" style="color: #666; margin: 0 10px;">Contact</a>
                </div>
            </div>
        </div>
        
        <script>
            // JavaScript pour la navigation et l'interactivité
            document.addEventListener('DOMContentLoaded', function() {
                // Gestion du menu latéral
                const menuItems = document.querySelectorAll('.sidebar-menu-item');
                menuItems.forEach(item => {
                    item.addEventListener('click', function() {
                        menuItems.forEach(i => i.classList.remove('active'));
                        this.classList.add('active');
                    });
                });
                
                // Gestion des notifications
                const notificationBell = document.querySelector('.notification-bell');
                notificationBell.addEventListener('click', function() {
                    alert('Vous avez 5 nouvelles notifications!');
                });
                
                // Gestion des boutons "Continuer"
                const continueBtns = document.querySelectorAll('.continue-btn');
                continueBtns.forEach(btn => {
                    btn.addEventListener('click', function() {
                        const courseTitle = this.closest('.course-card').querySelector('.course-card-title').textContent;
                        alert(`Reprise du cours: ${courseTitle}`);
                    });
                });
                
                // Gestion du calendrier
                const calendarDays = document.querySelectorAll('.calendar-day');
                calendarDays.forEach(day => {
                    day.addEventListener('click', function() {
                        calendarDays.forEach(d => d.classList.remove('current'));
                        this.classList.add('current');
                        
                        if(this.classList.contains('has-event')) {
                            alert(`Événements pour le ${this.textContent} avril 2025`);
                        }
                    });
                });
            });
        </script>
    </body>
    </html>

