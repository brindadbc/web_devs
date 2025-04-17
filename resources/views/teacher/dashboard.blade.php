<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Enseignant - TUTOACADEMY</title>
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
        
        .icon-students {
            background-color: #FF6B35;
        }
        
        .icon-courses {
            background-color: #48B899;
        }
        
        .icon-revenue {
            background-color: #6B66F8;
        }
        
        .icon-ratings {
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
            color: #48B899;
            font-size: 14px;
        }
        
        .dashboard-card-stats.down {
            color: #F94687;
        }
        
        /* Course Section */
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
        
        .course-status {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 5px 10px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .status-active {
            background-color: #d1fae5;
            color: #059669;
        }
        
        .status-draft {
            background-color: #e5e7eb;
            color: #4b5563;
        }
        
        .course-card-body {
            padding: 20px;
        }
        
        .course-card-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .course-card-stats {
            display: flex;
            justify-content: space-between;
            color: #666;
            margin-bottom: 15px;
            font-size: 14px;
        }
        
        .course-progress {
            height: 5px;
            background-color: #e5e7eb;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        
        .progress-bar {
            height: 100%;
            background-color: #FF6B35;
            border-radius: 5px;
        }
        
        .course-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .course-price {
            font-weight: 600;
        }
        
        .course-actions {
            display: flex;
            gap: 10px;
        }
        
        .action-button {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .action-button:hover {
            background-color: #e5e7eb;
        }
        
        /* Student Activity */
        .activity-and-calendar {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }
        
        .students-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .students-table th {
            text-align: left;
            padding: 15px;
            background-color: #f9f9f9;
            color: #666;
            font-weight: 600;
        }
        
        .students-table tr {
            transition: all 0.3s ease;
        }
        
        .students-table tr:hover {
            background-color: #f9f9f9;
        }
        
        .students-table td {
            padding: 15px;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .student-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .student-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }
        
        .student-name {
            font-weight: 600;
        }
        
        .student-email {
            font-size: 13px;
            color: #666;
        }
        
        .activity-badge {
            padding: 5px 10px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
            text-align: center;
        }
        
        .activity-enrolled {
            background-color: #d1fae5;
            color: #059669;
        }
        
        .activity-assignment {
            background-color: #e0f2fe;
            color: #0284c7;
        }
        
        .activity-completed {
            background-color: #fef3c7;
            color: #d97706;
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
        
        .upcoming-events {
            margin-top: 20px;
        }
        
        .event-item {
            display: flex;
            gap: 15px;
            padding: 10px 0;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .event-time {
            font-size: 12px;
            background-color: #f4f4f4;
            color: #666;
            padding: 5px;
            border-radius: 5px;
            width: 50px;
            text-align: center;
        }
        
        .event-details {
            flex: 1;
        }
        
        .event-title {
            font-weight: 600;
            font-size: 14px;
        }
        
        .event-desc {
            font-size: 12px;
            color: #666;
        }
        
        /* Add Course Button */
        .add-course-btn {
            background-color: #FF6B35;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 50px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .add-course-btn:hover {
            background-color: #e55a24;
        }
        
        /* Responsive */
        @media (max-width: 1024px) {
            .activity-and-calendar {
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
                <span><a href="{{route('courses.indexs')}}">Mes cours</a></span>
            </li>
            <li class="sidebar-menu-item">
                <div class="sidebar-icon">👥</div>
                <span>Étudiants</span>
            </li>
            <li class="sidebar-menu-item">
                <div class="sidebar-icon">📝</div>
                <span><a href="{{route('courses.indexs')}}">Devoirs</a></span>
            </li>
            <li class="sidebar-menu-item">
                <div class="sidebar-icon">💬</div>
                <span><a href="{{route('chat.index')}}">Messages</a></span>
            </li>
            {{-- <li class="sidebar-menu-item">
                <div class="sidebar-icon">📊</div>
                <span>Analyses</span>
            </li> --}}
           
        </ul>
        <div class="sidebar-profile">
            <div class="profile-avatar"></div>
            <div class="profile-info">
                
                <p class="mt-2">Hi, {{ auth()->user()->name }}! vous etes connecté en tant enseignant</p>
            </div>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <h1 class="page-title">Tableau de bord enseignant</h1>
            <div class="header-actions">
                <form class="search-form">
                    <div class="search-icon">🔍</div>
                    <input type="text" class="search-input" placeholder="Rechercher...">
                </form>
                <div class="notification-bell">
                    🔔
                    <div class="notification-badge">3</div>
                </div>
                <button class="add-course-btn">
                   <a href="{{route('courses.create')}}">+ Créer un cours</a> 
                </button>
            </div>
        </div>
        
        <!-- Stats Cards -->
        <div class="dashboard-cards">
            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <div class="dashboard-card-title">Total Étudiants</div>
                    <div class="dashboard-card-icon icon-students">👥</div>
                </div>
                <div class="dashboard-card-value">487</div>
                <div class="dashboard-card-stats">
                    ↑ +15% ce mois
                </div>
            </div>
            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <div class="dashboard-card-title">Cours Actifs</div>
                    <div class="dashboard-card-icon icon-courses">📚</div>
                </div>
                <div class="dashboard-card-value">12</div>
                <div class="dashboard-card-stats">
                    ↑ +2 ce mois
                </div>
            </div>
            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <div class="dashboard-card-title">Revenus</div>
                    <div class="dashboard-card-icon icon-revenue">💰</div>
                </div>
                <div class="dashboard-card-value"></div>
                <div class="dashboard-card-stats">
                    ↑ +8.3% ce mois
                </div>
            </div>
            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <div class="dashboard-card-title">Avis Moyen</div>
                    <div class="dashboard-card-icon icon-ratings">⭐</div>
                </div>
                <div class="dashboard-card-value">4.8/5</div>
                <div class="dashboard-card-stats">
                    ↑ +0.2 ce mois
                </div>
            </div>
        </div>
        
        <!-- Courses Section -->
        <div class="section-heading">
            <h2>Mes cours</h2>
            <a href="{{route('courses.indexs')}}" class="view-all">Voir tout</a>
        </div>
        
        <div class="courses-grid">
            <div class="course-card">
                <div class="course-card-header">
                    <img src="/api/placeholder/300/120" alt="Course" class="course-image">
                    <div class="course-status status-active">Actif</div>
                </div>
                <div class="course-card-body">
                    <h3 class="course-card-title">Figma UI UX Design</h3>
                    <div class="course-card-stats">
                        <div>24 Leçons</div>
                        <div>185 Étudiants</div>
                    </div>
                    <div class="course-progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <div class="course-card-footer">
                        <div class="course-price"></div>
                        <div class="course-actions">
                            <div class="action-button">✏️</div>
                            <div class="action-button">📊</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="course-card">
                <div class="course-card-header">
                    <img src="/api/placeholder/300/120" alt="Course" class="course-image">
                    <div class="course-status status-active">Actif</div>
                </div>
                <div class="course-card-body">
                    <h3 class="course-card-title">Webflow Development</h3>
                    <div class="course-card-stats">
                        <div>18 Leçons</div>
                        <div>132 Étudiants</div>
                    </div>
                    <div class="course-progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <div class="course-card-footer">
                        <div class="course-price"></div>
                        <div class="course-actions">
                            <div class="action-button">✏️</div>
                            <div class="action-button">📊</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="course-card">
                <div class="course-card-header">
                    <img src="/api/placeholder/300/120" alt="Course" class="course-image">
                    <div class="course-status status-draft">Brouillon</div>
                </div>
                <div class="course-card-body">
                    <h3 class="course-card-title">Adobe Photoshop Mastery</h3>
                    <div class="course-card-stats">
                        <div>32 Leçons</div>
                        <div>0 Étudiants</div>
                    </div>
                    <div class="course-progress">
                        <div class="progress-bar" style="width: 65%"></div>
                    </div>
                    <div class="course-card-footer">
                        <div class="course-price"></div>
                        <div class="course-actions">
                            <div class="action-button">✏️</div>
                            <div class="action-button">📊</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Activity and Calendar -->
        <div class="activity-and-calendar">
            <!-- Student Activity -->
            <div class="dashboard-card">
                <div class="section-heading" style="margin-bottom: 15px;">
                    <h2>Activité récente des étudiants</h2>
                    <a href="{{route('courses.indexs')}}" class="view-all">Voir tout</a>
                </div>
                <table class="students-table">
                    <thead>
                        <tr>
                            <th>Étudiant</th>
                            <th>Cours</th>
                            <th>Activité</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="student-info">
                                    <div class="student-avatar">MR</div>
                                    <div>
                                        <div class="student-name">Marie Robert</div>
                                        <div class="student-email">marie.r@example.com</div>
                                    </div>
                                </div>
                            </td>
                            <td>Figma UI UX Design</td>
                            <td><div class="activity-badge activity-enrolled">Inscrit</div></td>
                            <td>Aujourd'hui</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="student-info">
                                    <div class="student-avatar">TL</div>
                                    <div>
                                        <div class="student-name">Thomas Leroux</div>
                                        <div class="student-email">thomas.l@example.com</div>
                                    </div>
                                </div>
                            </td>
                            <td>Webflow Development</td>
                            <td><div class="activity-badge activity-assignment">Devoir</div></td>
                            <td>Hier</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="student-info">
                                    <div class="student-avatar">SB</div>
                                    <div>
                                        <div class="student-name">Sophie Blanc</div>
                                        <div class="student-email">sophie.b@example.com</div>
                                    </div>
                                </div>
                            </td>
                            <td>Figma UI UX Design</td>
                            <td><div class="activity-badge activity-completed">Terminé</div></td>
                            <td>Il y a 2 jours</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="student-info">
                                    <div class="student-avatar">ND</div>
                                    <div>
                                        <div class="student-name">Nicolas Dubois</div>
                                        <div class="student-email">nicolas.d@example.com</div>
                                    </div>
                                </div>
                            </td>
                            <td>Webflow Development</td>
                            <td><div class="activity-badge activity-enrolled">Inscrit</div></td>
                            <td>Il y a 3 jours</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!-- Calendar -->
            <div class="calendar-card">
                <div class="calendar-header">
                    <h3 class="calendar-title">Avril 2025</h3>
                    <div class="calendar-nav">
                        <div class="calendar-nav-button">◀</div>
                        <div class="calendar-nav-button">▶</div>
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
                    <div class="calendar-day">1</div>
                    <div class="calendar-day">2</div>
                    <div class="calendar-day">3</div>
                    <div class="calendar-day">4</div>
                    <div class="calendar-day">5</div>
                    <div class="calendar-day has-event">6</div>
                    <div class="calendar-day current">7</div>
                    <div class="calendar-day">8</div>
                    <div class="calendar-day has-event">9</div>
                    <div class="calendar-day">10</div>
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
                    <div class="calendar-day has-event">23</div>
                    <div class="calendar-day">24</div>
                    <div class="calendar-day">25</div>
                    <div class="calendar-day">26</div>
                    <div class="calendar-day">27</div>
                    <div class="calendar-day">28</div>
                    <div class="calendar-day">29</div>
                    <div class="calendar-day">30</div>
                </div>
                
                <div class="upcoming-events">
                    <h4 style="margin-bottom: 10px;">Événements à venir</h4>
                    <div class="event-item">
                        <div class="event-time">9:00</div>
                        <div class="event-details">
                            <div class="event-title">Session en direct</div>
                            <div class="event-desc">Webflow Development - Module 3</div>
                        </div>
                    </div>
                    <div class="event-item">
                        <div class="event-time">14:30</div>
                        <div class="event-details">
                            <div class="event-title">Correction des devoirs</div>
                            <div class="event-desc">Figma UI UX Design</div>
                        </div>
                    </div>
                    <div class="event-item">
                        <div class="event-time">16:00</div>
                        <div class="event-details">
                            <div class="event-title">Réunion département</div>
                            <div class="event-desc">Planning des cours</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Course Progress & Reviews -->
        <div class="activity-and-calendar">
            <!-- Progress -->
            <div class="dashboard-card">
                <div class="section-heading" style="margin-bottom: 15px;">
                    <h2>Progression des cours</h2>
                </div>
                <div style="padding: 0px 10px;">
                    <div style="margin-bottom: 20px;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                            <h4>Figma UI UX Design</h4>
                            <span>100%</span>
                        </div>
                        <div class="course-progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                    </div>
                    
                    <div style="margin-bottom: 20px;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                            <h4>Webflow Development</h4>
                            <span>100%</span>
                        </div>
                        <div class="course-progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                    </div>
                    
                    <div style="margin-bottom: 20px;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                            <h4>Adobe Photoshop Mastery</h4>
                            <span>65%</span>
                        </div>
                        <div class="course-progress">
                            <div class="progress-bar" style="width: 65%"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Reviews -->
            <div class="dashboard-card">
                <div class="section-heading" style="margin-bottom: 15px;">
                    <h2>Avis récents</h2>
                    <a href="#" class="view-all">Voir tout</a>
                </div>
                
                <div style="padding: 10px;">
                    <div style="border-bottom: 1px solid #f0f0f0; padding-bottom: 15px; margin-bottom: 15px;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                            <h4>Figma UI UX Design</h4>
                            <div>⭐⭐⭐⭐⭐</div>
                        </div>
                        <p style="font-size: 14px; color: #666;">"Excellent cours, très complet avec des exemples concrets. J'ai beaucoup appris!"</p>
                        <div style="font-size: 12px; color: #999; text-align: right;">- Marie Robert, il y a 2 jours</div>
                    </div>
                    
                    <div style="border-bottom: 1px solid #f0f0f0; padding-bottom: 15px; margin-bottom: 15px;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                            <h4>Webflow Development</h4>
                            <div>⭐⭐⭐⭐</div>
                        </div>
                        <p style="font-size: 14px; color: #666;">"Contenu très intéressant, mais j'aurais aimé plus d'exercices pratiques."</p>
                        <div style="font-size: 12px; color: #999; text-align: right;">- Thomas Leroux, il y a 1 semaine</div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div style="text-align: center; margin-top: 30px; padding: 20px 0; color: #666; font-size: 14px; border-top: 1px solid #eee;">
            © 2025 TUTOACADEMY. Tous droits réservés.
        </div>
    </div>
</body>
</html>







{{-- @extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Tableau de bord Enseignant</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Mes cours</h5>
                    <p class="card-text">Gérez vos cours et ajoutez-en de nouveaux.</p>
                    <a href="{{ route('teacher.cour') }}" class="btn btn-primary">Gérer mes cours</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Créer un cours</h5>
                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
{{-- 
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Tableau de Bord Enseignant</h2>
    
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total des cours</h5>
                    <p class="card-text">{{ $totalCours ?? 0 }}</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Étudiants inscrits</h5>
                    <p class="card-text">{{ $totalStudents ?? 0 }}</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Messages reçus</h5>
                    <p class="card-text">{{ $totalMessages ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('teacher.cour') }}" class="btn btn-primary mt-4">Gérer mes cours</a>
</div>
@endsection --}}

{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <h1>
            @if(auth()->user()->role == 'admin')
                Admin Dashboard
            @elseif(auth()->user()->role == 'teacher')
                Teacher Dashboard
            @elseif(auth()->user()->role == 'student')
                Student Dashboard
            @else
                Dashboard
            @endif
        </h1>

        <p>Welcome, {{ auth()->user()->name }}!</p>
        <p>vous etes connecté en tant que {{ auth()->user()->role }}.</p>
        <p>you are logged in as a {{ auth()->user()->role }}.</p>
        <!-- Logout Button -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div> --}}

    
{{--         
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Messages reçus</h5>
                    <p class="card-text">{{ $totalMessages ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>   --}}
    

{{-- <div class="row">
    <!-- Nombre de cours -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Mes cours</h5>
                <p class="card-text">{{ $cours->count() }} cours créés</p>
            </div>
        </div>
    </div>

    <!-- Nombre d'étudiants inscrits -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Étudiants inscrits</h5>
                <p class="card-text">{{ $nombreStudent }} étudiants</p>
            </div>
        </div>
    </div>
</div>

<!-- Liste des cours -->
<h3 class="mt-4">Mes Cours</h3>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Description</th>
            <th>Date de création</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cours as $cour)
            <tr>
                <td>{{ $cour->id }}</td>
                <td>{{ $cour->titre }}</td>
                <td>{{ $cour->description }}</td>
                <td>{{ $cour->created_at->format('d/m/Y') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('courses.indexs') }}" class="btn btn-primary mt-4">Gérer mes cours</a>
<div>
    <p class="card-text">Ajoutez de nouveaux contenus pour vos étudiants.</p>
    <a href="{{ route('courses.create') }}" class="btn btn-success">Créer un cours</a>
</div>
</div>


@endsection --}}
