{{-- @extends('layouts.app')
@section('content')
<h1>Chapitres</h1>
<a href="{{ route('chapitre.create', $cour->id) }}">Ajouter un chapitre</a>
<ul>
    @foreach($chapitre as $chapitre)
        <li>
            <a href="{{ route('chapitre.show', $chapitre->id) }}">{{ $chapitre->titre }}</a>
        </li>
    @endforeach
</ul>
@endsection --}}

  {{-- @extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Chapitres du cours : {{ $cour->titre }}</h1>  --}}

    {{-- @if (Auth::user()->isEnseignant()) --}}
         {{-- <a href="{{ route('chapitre.create', $cour) }}" class="bg-blue-500 text-blue px-4 py-2 rounded-md mb-4 inline-block">Ajouter un chapitre</a>  --}}
    {{-- @endif --}}
 
     {{-- @if ($chapitre->isEmpty())
        <p class="text-gray-600">Aucun chapitre disponible pour ce cours.</p>
    @else 
         <div class="space-y-4">
            @foreach ($chapitre as $chapitre)
                <div class="p-4 border rounded-lg shadow-sm bg-white">
                    <h2 class="text-lg font-semibold text-gray-900">{{ $chapitre->titre }}</h2>
                    <p class="text-gray-700">{{ $chapitre->description }}</p>

                    <div class="mt-2 flex items-center space-x-2">
                        <a href="{{ route('chapitre.show', $chapitre) }}" class="text-blue-500 hover:underline">Voir détails</a>
                        <a href="{{ route('chapitre.index', $cour) }}">Voir les chapitres</a>  --}}
                        {{-- @if (Auth::user()->isEnseignant()) --}}
                             {{-- <a href="{{ route('chapitre.edit', $chapitre) }}" class="text-yellow-500 hover:underline">Modifier</a>

                            <form action="{{ route('chapitre.destroy', $chapitre) }}" method="POST" onsubmit="return confirm('Voulez-vous supprimer ce chapitre ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Supprimer</button>
                            </form>  --}}
                        {{-- @endif --}}
                    {{-- </div>
                </div>
            @endforeach
        </div>  --}}

        {{-- <div class="mt-6">
            {{ $chapitre->links() }}
        </div> --}}
    {{-- @endif
</div>
@endsection    --}}

{{-- @extends('layouts.app')

@section('content')
    <h2>Chapitres du cours : {{ $cour->titre }}</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <ul>
        @forelse ($chapitre as $chapitre)
            <li>{{ $chapitre->titre }} - {{ $chapitre->description }}</li>
        @empty
            <p>Aucun chapitre disponible.</p>
        @endforelse
    </ul>
    {{-- <a href="{{ route('chapitre.index', ['cour' => $chapitre->cour->id]) }}">Voir tous les chapitres</a> --}}

    {{-- <a href="{{ route('chapitre.create', $cour) }}">Ajouter un chapitre</a>
@endsection  --}}


{{-- @extends('layouts.app')

@section('content')
    <h1>Chapitres du cours : {{ $cour->titre }}</h1>
    
    <a href="{{ route('cour.chapitre.create', $cour->id) }}" class="btn btn-primary">Ajouter un chapitre</a> --}}

    {{-- @if ($chapitre->isEmpty())
        <p>Aucun chapitre trouvé.</p>
    @else --}}
        {{-- <ul>
            @foreach ($chapitre as $chapitre)
                <li>
                    <a href="{{ route('cour.chapitre.show', [$cour->id, $chapitre->id]) }}">{{ $chapitre->titre }}</a>
                    <a href="{{ route('cour.chapitre.edit', [$cour->id, $chapitre->id]) }}">Modifier</a>

                    <form action="{{ route('cour.chapitre.destroy', [$cour->id, $chapitre->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </li>
            @endforeach
        </ul> --}}
        
    {{-- @endif --}}
    {{-- <div class="mt-6">
        @foreach($chapitre as $chapitre)
        <div class="bg-white p-4 rounded shadow mb-4">
            <h2 class="text-xl font-semibold">{{ $categorie->titre}}</h2>

                        <a href= "{{ route('cour.chapitre.show', [$cour->id, $chapitre->id]) }}">{{ $chapitre->titre }}</a>
                        <a href= "{{ route('cour.chapitre.edit', [$cour->id, $chapitre->id]) }}">Modifier</a>
                        
                        <form action="{{ route('cour.chapitre.destroy', [$cour->id, $chapitre->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(event)">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                @endforeach
    </div>
</div>
@endsection --}}

{{-- 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Cours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, #1e3a8a 50%, #000000 50%);
            color: white;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            width: 100%;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Liste des Commentaires et Notes d’une Leçon</h2>
        <div class="card">
            <h4>Commentaires :</h4>
            <ul>
                @foreach($lecon->commentaires as $commentaire)
                    <li>{{ $commentaire->contenu }} - <strong>{{ $commentaire->auteur }}</strong></li>
                @endforeach
            </ul>
        </div>
        <div class="card mt-3">
            <h4>Notes :</h4>
            <ul>
                @foreach($lecon->notes as $note)
                    <li>Note : {{ $note->valeur }} / 5</li>
                @endforeach
            </ul>
            <h5>Moyenne : {{ $lecon->notes->avg('valeur') }} / 5</h5>
        </div>
    </div>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Affichage d’un Cours avec ses Chapitres et Leçons</h2>
        <div class="card">
            <h3>{{ $cours->titre }}</h3>
            <p>{{ $cours->description }}</p>
            <h4>Chapitres :</h4>
            <ul>
                @foreach($cours->chapitres as $chapitre)
                    <li>
                        <strong>{{ $chapitre->titre }}</strong>
                        <ul>
                            @foreach($chapitre->lecons as $lecon)
                                <li>{{ $lecon->titre }} - <a href="#">Voir</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Affichage d’un Chapitre avec ses Leçons</h2>
        <div class="card">
            <h3>{{ $chapitre->titre }}</h3>
            <p>{{ $chapitre->description }}</p>
            <h4>Leçons :</h4>
            <ul>
                @foreach($chapitre->lecons as $lecon)
                    <li>{{ $lecon->titre }} - <a href="#">Voir</a></li>
                @endforeach
            </ul>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> --}}

@extends('layouts.app')

@section('content')
    <h1>Chapitres du cours : {{ $cours->titre }}</h1>
    <a href="{{ route('chapitre/create/{id}', $cours) }}" class="btn btn-primary">Ajouter un Chapitre</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <ul class="list-group mt-3">
        @foreach($chapitres as $chapitre)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('chapitre.show', [$cours, $chapitre]) }}">{{ $chapitre->titre }}</a>
                
                <div>
                    <a href="{{ route('chapitre.edit', [$cours, $chapitre]) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('chapitre.destroy', [$cours, $chapitre]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous supprimer ce chapitre ?');">Supprimer</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection


