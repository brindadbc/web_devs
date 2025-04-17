{{-- @extends('layouts.app')

@section('content')
    <h1>Modifier : {{ $chapitre->titre }}</h1>

    <form action="{{ route('cour.chapitre.update', [$cour->id, $chapitre->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Titre :</label>
        <input type="text" name="titre" value="{{ $chapitre->titre }}" required>

        <label>Description :</label>
        <textarea name="description" required>{{ $chapitre->description }}</textarea>

        <button type="submit">Mettre à jour</button>
    </form>
@endsection --}}
 {{-- @extends('layouts.app')


@extends('layouts.app')

@section('content')
    <h1>Modifier le chapitre : {{ $chapitre->titre }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('chapitre.update', [$cours, $chapitre]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Titre</label>
            <input type="text" name="titre" class="form-control" value="{{ old('titre', $chapitre->titre) }}" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ old('description', $chapitre->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-warning">Modifier</button>
    </form>
@endsection --}}


@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Modifier le chapitre</h2>
    <div class="card p-4 shadow-lg">
        <form action="{{ route('chapitre.update', $chapitre->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="titre" class="form-label">Titre du chapitre</label>
                <input type="text" class="form-control" id="titre" name="titre" value="{{ $chapitre->titre }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $chapitre->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Mettre à jour</button>
            <a href="{{ route('cour.show', $chapitre->cour_id) }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection

