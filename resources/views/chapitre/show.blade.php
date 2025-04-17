{{-- @extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white p-6 rounded-lg shadow">
        <h1 class="text-2xl font-bold text-gray-800">{{ $chapitre->titre }}</h1> --}}
        {{-- <p class="text-gray-600 mt-2">Cours : <a href="{{ route('cour.show', $chapitre->cour->id) }}" class="text-blue-500 hover:underline">{{ $chapitre->cour->titre }}</a></p> --}}
        {{-- <a href="{{ route('chapitre.index') }}">Tous les chapitres</a> --}}
        {{-- @if ($chapitre->cour)
    <p class="text-gray-600 mt-2">Cours : 
        <a href="{{ route('cour.show', $chapitre->cour->id) }}" class="text-blue-500 hover:underline">
            {{ $chapitre->cour->titre }}
        </a>
    </p>
@else
    <p class="text-red-500 mt-2">Aucun cours associé.</p>
@endif --}}
{{-- 
        <div class="mt-4 text-gray-700">
            {!! nl2br(e($chapitre->contenu)) !!}
        </div>
        <a href="{{ route('cour.show', $chapitre->cour->id) }}" class="mt-6 inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Retour au cours</a>
    </div>
</div>
@endsection --}}
{{-- 
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $chapitre->titre }}</h1>
    <p>{{ $chapitre->description }}</p>
    <a href="{{ route('cour.show', $cour->id) }}">Retour au cours</a>
</div>
@endsection --}}
{{-- 
@extends('layouts.app')

@section('content')
    <h1>{{ $chapitre->titre }}</h1>
    <p>{{ $chapitre->description }}</p>

    <a href="{{ route('cour.chapitre.edit', [$cour->id, $chapitre->id]) }}">Modifier</a>
    
    <form action="{{ route('cour.chapitre.destroy', [$cour->id, $chapitre->id]) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer</button>
    </form>

    <a href="{{ route('cour.chapitre.index', $cours->id) }}">Retour aux chapitres</a>
@endsection --}}
{{-- @extends('layouts.app')

@section('content')
    <h1>{{ $chapitre->titre }}</h1>
    <p>{{ $chapitre->description }}</p>

    <a href="{{ route('chapitre.index', $cours) }}" class="btn btn-secondary">Retour aux chapitres</a>
    <a href="{{ route('chapitre.edit', [$cours, $chapitre]) }}" class="btn btn-warning">Modifier</a>

    <form action="{{ route('chapitre.destroy', [$cours, $chapitre]) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous supprimer ce chapitre ?');">Supprimer</button>
    </form>
@endsection --}}

 {{-- @extends('layouts.app')

@section('content')
<div class="container mt-5"> --}}
    {{-- <h2 class="text-center">titre du cours:{{ $cours->titre }}</h2> --}}
    {{-- <h2 class="text-center">titre du chapitre:{{ $chapitre->titre }}</h2> --}}
    {{-- <p class="text-center text-muted">{{ $chapitre->description }}</p> --}}

    {{-- <div class="d-flex justify-content-between">
        <h4>Leçons</h4> --}}
        
{{--        
        <a href="{{ route('lecon.create', $chapitre) }}" class="btn btn-primary">Ajouter une leçon</a>

    </div>

    <div class="row mt-3">
        @foreach($chapitre->lecons as $lecon)
        <div class="col-md-4">
            <div class="card text-dark p-3 shadow-sm">
                <h5>{{ $lecon->titre }}</h5>
                <p>{{ Str::limit($lecon->description, 100) }}</p>
                <a href="{{ route('lecon.show', [$chapitre->id, $lecon->id]) ) }}" class="btn btn-info btn-sm">Voir la leçon</a>
                <a href="{{ route('lecon.edit',  [$chapitre->id, $lecon->id])) }}" class="btn btn-warning btn-sm">modifier</a>
                <form action="{{ route('lecon.destroy',  [$chapitre->id, $lecon->id])) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous supprimer cette lecon ?');">Supprimer</button>
                </form>
            </div>
 
          
            
        </div>
        @endforeach
    </div>
  
    <a href="{{ route('cour.show', $chapitre->cour_id) }}" class="btn btn-secondary mt-4">Retour au cours</a>
</div>
@endsection  --}}




