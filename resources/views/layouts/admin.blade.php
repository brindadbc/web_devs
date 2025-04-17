<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Plateforme de Cours')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Définir une couleur par défaut */
            
        }

        /* Arrière-plan bleu et noir */
        .bg-blue-black {
            background: linear-gradient(to bottom, #1e3a8a 50%, #000000 50%);
            color: white;
        }
        .bg-b-b {
            background: linear-gradient(to right, #1e3a8a, #000000);
        color: white;
        }
        
       
        /* Arrière-plan bleu */
        .bg-blue {
            background-color: #1e3a8a;
            color: white;
        }
        

        /* Arrière-plan noir */
        .bg-black {
            background-color: #000000;
            color: white;
         }

        /* Style de carte pour toutes les pages */
         .card {
            border-radius: 12px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
            background-color: rgba(255, 255, 255, 0.1);
        } */

        .navbar-custom {
            background: linear-gradient(to right, #1e3a8a, #000000);
        } 
        .hero {
            background: url('https://source.unsplash.com/1600x900/?education,learning') no-repeat center center;
            background-size: cover;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
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
        .navbar {
            background-color: rgba(0, 0, 0, 0.8) !important;
        }
        .navbar-nav {
            display: flex;
            justify-content: center;
            width: 100%;
        }
        .navbar-nav .nav-item {
            margin: 0 15px;
        }
        @media (max-width: 768px) {
            .card {
                width: 100%;
            }
        }
    </style>
</head>
<body class="@yield('body-class', '')">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.indexs') }}">Utilisateurs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Déconnexion
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-5">
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>