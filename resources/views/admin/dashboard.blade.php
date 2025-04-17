<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrateur | TUTOACADEMY</title>
    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }
        
        a {
            text-decoration: none;
            color: inherit;
        }
        
        /* Layout */
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar */
        .sidebar {
            width: 280px;
            background-color: #333;
            color: white;
            padding: 25px 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }
        
        .sidebar-header {
            padding: 0 25px 25px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 20px;
        }
        
        .logo {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 25px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 20px;
        }
        
        .avatar {
            width: 45px;
            height: 45px;
            background-color: #FF6B35;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 18px;
        }
        
        .user-details h4 {
            font-size: 16px;
            margin-bottom: 3px;
        }
        
        .user-role {
            font-size: 12px;
            opacity: 0.7;
        }
        
        .menu-list {
            list-style: none;
        }
        
        .menu-item {
            margin-bottom: 5px;
        }
        
        .menu-link {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px 25px;
            transition: all 0.3s ease;
        }
        
        .menu-link:hover, .menu-link.active {
            background-color: rgba(255,255,255,0.1);
            border-left: 4px solid #FF6B35;
        }
        
        .menu-icon {
            width: 20px;
            text-align: center;
        }
        
        .menu-section {
            padding: 15px 25px 10px;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 1px;
            opacity: 0.5;
            font-weight: 600;
        }
        
        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 30px;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background-color: white;
            padding: 15px 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
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
        
        .search-box {
            position: relative;
        }
        
        .search-input {
            padding: 10px 15px 10px 40px;
            border: 1px solid #e1e1e1;
            border-radius: 50px;
            outline: none;
            width: 250px;
        }
        
        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }
        
        .notification-bell {
            width: 40px;
            height: 40px;
            background-color: #f5f7fa;
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
            color: white;
            border-radius: 50%;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Dashboard Cards */
        .stats-cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background-color: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 15px;
        }
        
        .stat-icon.purple {
            background-color: #f3e8ff;
            color: #9333ea;
        }
        
        .stat-icon.blue {
            background-color: #e0f2fe;
            color: #0284c7;
        }
        
        .stat-icon.orange {
            background-color: #ffedd5;
            color: #f97316;
        }
        
        .stat-icon.green {
            background-color: #dcfce7;
            color: #16a34a;
        }
        
        .stat-value {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .stat-label {
            color: #666;
            font-size: 14px;
        }
        
        /* Content Sections */
        .section {
            background-color: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .section-title {
            font-size: 20px;
            font-weight: 600;
        }
        
        .section-action {
            color: #FF6B35;
            font-weight: 500;
            font-size: 14px;
        }
        
        /* Tables */
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .data-table th, .data-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #e1e1e1;
        }
        
        .data-table th {
            font-weight: 600;
            color: #666;
            border-bottom: 2px solid #e1e1e1;
        }
        
        .data-table tbody tr:hover {
            background-color: #f9f9f9;
        }
        
        .status-badge {
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .status-badge.active {
            background-color: #dcfce7;
            color: #16a34a;
        }
        
        .status-badge.pending {
            background-color: #fff7ed;
            color: #ea580c;
        }
        
        .status-badge.draft {
            background-color: #f3f4f6;
            color: #6b7280;
        }
        
        /* Row actions */
        .row-actions {
            display: flex;
            gap: 10px;
        }
        
        .action-button {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .action-button.edit {
            background-color: #e0f2fe;
            color: #0284c7;
        }
        
        .action-button.delete {
            background-color: #fee2e2;
            color: #ef4444;
        }
        
        .action-button.view {
            background-color: #f3e8ff;
            color: #9333ea;
        }
        
        .action-button:hover {
            opacity: 0.8;
        }
        
        /* Charts */
        .charts-container {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 25px;
            margin-bottom: 30px;
        }
        
        .chart {
            height: 300px;
            background-color: #f9f9f9;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
        }
        
        /* Activity Feed */
        .activity-feed {
            list-style: none;
        }
        
        .activity-item {
            padding: 15px 0;
            border-bottom: 1px solid #e1e1e1;
            display: flex;
            gap: 15px;
        }
        
        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        
        .activity-icon.blue {
            background-color: #e0f2fe;
            color: #0284c7;
        }
        
        .activity-icon.green {
            background-color: #dcfce7;
            color: #16a34a;
        }
        
        .activity-icon.orange {
            background-color: #ffedd5;
            color: #f97316;
        }
        
        .activity-content {
            flex: 1;
        }
        
        .activity-text {
            margin-bottom: 5px;
        }
        
        .activity-text strong {
            font-weight: 600;
        }
        
        .activity-time {
            font-size: 12px;
            color: #666;
        }
        
        /* Buttons */
        .button, .dropdown-button {
            background-color: #FF6B35;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .button:hover {
            background-color: #e65c28;
        }
        
        .button.secondary {
            background-color: #f3f4f6;
            color: #333;
        }
        
        .button.secondary:hover {
            background-color: #e5e7eb;
        }
        
        /* Dropdown */
        .dropdown {
            position: relative;
            display: inline-block;
        }
        
        .dropdown-button {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .dropdown-content {
            position: absolute;
            right: 0;
            top: 100%;
            background-color: white;
            min-width: 200px;
            border-radius: 8px;
            box-shadow: 0 10px 15px rgba(0,0,0,0.1);
            z-index: 1;
            display: none;
        }
        
        .dropdown-content a {
            display: block;
            padding: 12px 20px;
            color: #333;
            transition: background-color 0.3s ease;
        }
        
        .dropdown-content a:hover {
            background-color: #f3f4f6;
        }
        
        .dropdown:hover .dropdown-content {
            display: block;
        }
        
        /* Responsive */
        @media (max-width: 1200px) {
            .stats-cards {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .charts-container {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 992px) {
            .sidebar {
                width: 80px;
                padding: 20px 0;
            }
            
            .sidebar-header, .menu-text, .user-details, .menu-section {
                display: none;
            }
            
            .user-info {
                justify-content: center;
                padding: 15px 0;
            }
            
            .menu-link {
                justify-content: center;
                padding: 15px 0;
            }
            
            .menu-icon {
                margin: 0;
            }
            
            .main-content {
                margin-left: 80px;
            }
        }
        
        @media (max-width: 768px) {
            .stats-cards {
                grid-template-columns: 1fr;
            }
            
            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .header-actions {
                width: 100%;
            }
            
            .search-input {
                width: 100%;
            }

            .card {
            border-radius: 12px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            width: 100%;
        }
        .card-body {
            border-radius: 12px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
            background-color: rgba(255, 255, 255, 0.1);
            color:black;
            width: 100%;
        }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="logo">TUTOACADEMY</div>
                <div>Administration</div>
            </div>
            
            <div class="user-info">
                <div class="avatar">A</div>
                <div class="user-details">
                    <h4>Admin User</h4>
                    <div class="user-role">Super Administrator</div>
                </div>
            </div>
            
            <nav>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="#" class="menu-link active">
                            <span class="menu-icon">📊</span>
                            <span class="menu-text">Tableau de bord</span>
                        </a>
                    </li>
                    
                    <div class="menu-section">Gestion Éducative</div>
                    
                    <li class="menu-item">
                        <a href="{{route('courses.index')}}" class="menu-link">
                            <span class="menu-icon">📚</span>
                            <span class="menu-text">Cours</span>
                        </a>
                    </li>
                    
                    <li class="menu-item">
                        <a href="#" class="menu-link">
                            <span class="menu-icon">👨‍🏫</span>
                            <span class="menu-text">Enseignants</span>
                        </a>
                    </li>
                    
                    <li class="menu-item">
                        <a href="#" class="menu-link">
                            <span class="menu-icon">🧑‍🎓</span>
                            <span class="menu-text">Étudiants</span>
                        </a>
                    </li>
                    
                    <li class="menu-item">
                        <a href="#" class="menu-link">
                            <span class="menu-icon">📝</span>
                            <span class="menu-text">Inscriptions</span>
                        </a>
                    </li>
                    
                    <div class="menu-section">Contenu</div>
                    
                    <li class="menu-item">
                        <a href="{{route('categories.index')}}" class="menu-link">
                            <span class="menu-icon">🏷️</span>
                            <span class="menu-text">Catégories</span>
                        </a>
                    </li>
                    
                    <li class="menu-item">
                        <a href="{{route('courses.indexs')}}" class="menu-link">
                            <span class="menu-icon">💬</span>
                            <span class="menu-text">Commentaires</span>
                        </a>
                    </li>
                    
                    <li class="menu-item">
                        <a href="{{route('courses.indexs')}}" class="menu-link">
                            <span class="menu-icon">⭐</span>
                            <span class="menu-text">Évaluations</span>
                        </a>
                    </li>
                    
                    <div class="menu-section">Finance</div>
                    
                    <li class="menu-item">
                        <a href="#" class="menu-link">
                            <span class="menu-icon">💰</span>
                            <span class="menu-text">Paiements</span>
                        </a>
                    </li>
                    
                    <li class="menu-item">
                        <a href="#" class="menu-link">
                            <span class="menu-icon">📃</span>
                            <span class="menu-text">Factures</span>
                        </a>
                    </li>
                    
                    <div class="menu-section">Configuration</div>
                    
                    <li class="menu-item">
                        <a href="#" class="menu-link">
                            <span class="menu-icon">👥</span>
                            <span class="menu-text">Utilisateurs</span>
                        </a>
                    </li>
                    
                    <li class="menu-item">
                        <a href="#" class="menu-link">
                            <span class="menu-icon">⚙️</span>
                            <span class="menu-text">Paramètres</span>
                        </a>
                    </li>
                    
                    <li class="menu-item">
                        <a href="#" class="menu-link">
                            <span class="menu-icon">📤</span>
                            <span class="menu-text">Déconnexion</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <main class="main-content">
            <div class="header">
                <h1 class="page-title">Tableau de bord</h1>
                
                <div class="header-actions">
                    <div class="search-box">
                        <input type="text" class="search-input" placeholder="Rechercher...">
                        <span class="search-icon">🔍</span>
                    </div>
                    
                    <div class="notification-bell">
                        🔔
                        <span class="notification-badge">3</span>
                    </div>
                    
                    <div class="dropdown">
                        <button class="dropdown-button">
                            Ajouter
                            <span>▼</span>
                        </button>
                        <div class="dropdown-content">
                            <a href="{{route('courses.create')}}">Nouveau cours</a>
                            <a href="{{route('register')}}">Nouvel enseignant</a>
                            <a href="{{route('register')}}">Nouvel étudiant</a>
                            <a href="{{route('categories.create')}}">Nouvelle catégorie</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Stats Cards -->
            <div class="stats-cards">
                <div class="stat-card">
                    <div class="stat-icon purple">👨‍🎓</div>
                    <div class="stat-value">1,254</div>
                    <div class="stat-label">Étudiants inscrits</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon blue">📚</div>
                    <div class="stat-value">85</div>
                    <div class="stat-label">Cours disponibles</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon orange">👨‍🏫</div>
                    <div class="stat-value">32</div>
                    <div class="stat-label">Instructeurs actifs</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon green">💰</div>
                    <div class="stat-value">12,540€</div>
                    <div class="stat-label">Revenus ce mois</div>
                </div>
            </div>
            
            <!-- Charts -->
            <div class="charts-container">
                <div class="section">
                    <div class="section-header">
                        <h2 class="section-title">Inscriptions par mois</h2>
                        <a href="#" class="section-action">Voir le rapport</a>
                    </div>
                  
                    <div class="card  text-dark p-3">
                        <canvas id="userChart"></canvas>
                    </div>
                   
                </div>
                
                <div class="section">
                    <div class="section-header">
                        <h2 class="section-title">Catégories populaires</h2>
                        <a href="#" class="section-action">Détails</a>
                    </div>
                    <div class="chart">Graphique des catégories (représentation visuelle)</div>
                </div>
            </div>
            
            <!-- Recent Courses -->
            <div class="section">
                <div class="section-header">
                    <h2 class="section-title">Cours récents</h2>
                    <a href="{{route('courses.index')}}" class="section-action">Voir tous les cours</a>
                </div>
                
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Cours</th>
                            <th>Instructeur</th>
                            <th>Catégorie</th>
                            <th>Date</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Introduction à HTML & CSS</td>
                            <td>Martin Dupont</td>
                            <td>Développement Web</td>
                            <td>12/03/2025</td>
                            <td><span class="status-badge active">Actif</span></td>
                            <td>
                                <div class="row-actions">
                                    <div class="action-button view"><a href="{{route('courses.indexs')}}">👁️</a></div>
                                    <div class="action-button edit"><a href="{{route('courses.indexs')}}">✏️</a></div>
                                    <div class="action-button delete"><a href="{{route('courses.indexs')}}">🗑️</a></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Photographie pour débutants</td>
                            <td>Sophie Martin</td>
                            <td>Design</td>
                            <td>08/03/2025</td>
                            <td><span class="status-badge active">Actif</span></td>
                            <td>
                                <div class="row-actions">
                                    <div class="action-button view"><a href="{{route('courses.indexs')}}">👁️</a></div>
                                    <div class="action-button edit"><a href="{{route('courses.indexs')}}">✏️</a></div>
                                    <div class="action-button delete"><a href="{{route('courses.indexs')}}">🗑️</a></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Marketing Digital Avancé</td>
                            <td>Julie Dubois</td>
                            <td>Marketing</td>
                            <td>05/03/2025</td>
                            <td><span class="status-badge pending">En attente</span></td>
                            <td>
                                <div class="row-actions">
                                    <div class="action-button view"><a href="{{route('courses.indexs')}}">👁️</a></div>
                                    <div class="action-button edit"><a href="{{route('courses.indexs')}}">✏️</a></div>
                                    <div class="action-button delete"><a href="{{route('courses.indexs')}}">🗑️</a></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>JavaScript pour les nuls</td>
                            <td>Thomas Bernard</td>
                            <td>Développement Web</td>
                            <td>01/03/2025</td>
                            <td><span class="status-badge draft">Brouillon</span></td>
                            <td>
                                <div class="row-actions">
                                    <div class="action-button view"><a href="{{route('courses.indexs')}}">👁️</a></div>
                                    <div class="action-button edit"><a href="{{route('courses.indexs')}}">✏️</a></div>
                                    <div class="action-button delete"><a href="{{route('courses.indexs')}}">🗑️</a></div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!-- Recent Activity -->
            <div class="section">
                <div class="section-header">
                    <h2 class="section-title">Activités récentes</h2>
                    <a href="{{route('categories.index')}}" class="section-action">Voir toutes les activités</a>
                </div>
                
                <ul class="activity-feed">
                    <li class="activity-item">
                        <div class="activity-icon blue">👨‍🎓</div>
                        <div class="activity-content">
                            <div class="activity-text"><strong>Marc Lefevre</strong> s'est inscrit au cours <strong>UX Design Principles</strong></div>
                            <div class="activity-time">Il y a 35 minutes</div>
                        </div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon green">👨‍🏫</div>
                        <div class="activity-content">
                            <div class="activity-text"><strong>Sophie Martin</strong> a ajouté une nouvelle leçon à <strong>Photographie pour débutants</strong></div>
                            <div class="activity-time">Il y a 2 heures</div>
                        </div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon orange">💬</div>
                        <div class="activity-content">
                            <div class="activity-text"><strong>Laurent Mercier</strong> a commenté sur <strong>Introduction à HTML & CSS</strong></div>
                            <div class="activity-time">Il y a 5 heures</div>
                        </div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon blue">💰</div>
                        <div class="activity-content">
                            <div class="activity-text">Nouveau paiement reçu pour <strong>JavaScript Avancé</strong></div>
                            <div class="activity-time">Il y a 8 heures</div>
                        </div>
                    </li>
                </ul>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('userChart').getContext('2d');
        const userChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json(array_keys($usersByMonth->toArray())),
                datasets: [{
                    label: 'Inscriptions par mois',
                    data: @json(array_values($usersByMonth->toArray())),
                    backgroundColor: 'rgba(54, 162, 235, 0.5)'
                }]
            }
        });
    </script>
</body>
</html>





{{-- @extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold">Admin Dashboard</h2>
        <p class="mt-2">Welcome, {{ auth()->user()->name }}! You are logged in as an admin.</p>
    </div>

    <!-- Logout Button -->
    <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
        
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card bg-primary text-white p-3">
                        <h5>Total Utilisateurs</h5>
                        <h3>{{ $totalUsers }}</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-primary text-white p-3">
                        <h5>Total Cours</h5>
                        <h3>{{ $totalCours }}</h3>
                    </div>
                </div>
                {{-- <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card p-3">
                            <h5>Ajouter un nouveau cours</h5>
                            <form action="{{ route('admin.create') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Titre du cours</label>
                                    <input type="text" name="titre" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Catégorie</label>
                                    <select name="categorie_id" class="form-control" required>
                                        @foreach(App\Models\Categorie::all() as $categorie)
                                            <option value="{{ $categorie->id }}">{{ $categorie->titre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Enseignant</label>
                                    <select name="teacher_id" class="form-control" required>
                                        @foreach(App\Models\User::where('role', 'teacher')->get() as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                        </div>
                    </div>
                </div> --}}
                 {{-- <div class="col-md-4">
                    <div class="card bg-primary text-dark p-3">
                        <h5>Nouveaux Utilisateurs (30j)</h5>
                        <h3>{{ $newUsers }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card  text-dark p-3">
                    <h5>Évolution des inscriptions</h5>
                    <canvas id="userChart"></canvas>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-dark p-3">
                    <h5>Gestion des utilisateurs</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Rôle</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(App\Models\User::all() as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <a href="{{ route('admin.destroy', $user->id) }}" class="btn btn-sm btn-danger">Supprimer</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card text-dark p-3">
                <h5>Gestion des cours</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Catégorie</th>
                            <th>Enseignant</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(App\Models\Cour::all() as $cours)
                        <tr>
                            <td>{{ $cours->titre }}</td>
                            <td>{{ $cours->categorie->name ?? 'Non classé' }}</td>
                            <td>{{ $cours->teacher->name ?? 'Inconnu' }}</td>
                            <td>
                                <a href="{{ route('cour.edit', $cours->id) }}" class="btn btn-sm btn-primary">Modifier un cours</a>
                                <a href="{{ route('cour.index', $cours->id) }}" class="btn btn-sm btn-danger">Supprimer un cours</a>
                                <a href="{{ route('chapitre.show', $cours->id) }}" class="btn btn-sm btn-danger">Supprimer une lecon</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('userChart').getContext('2d');
        const userChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json(array_keys($usersByMonth->toArray())),
                datasets: [{
                    label: 'Inscriptions par mois',
                    data: @json(array_values($usersByMonth->toArray())),
                    backgroundColor: 'rgba(54, 162, 235, 0.5)'
                }]
            }
        });
    </script>
@endsection    --}}


