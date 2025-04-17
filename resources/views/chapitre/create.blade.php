{{-- @extends('layouts.app')

@section('content')
    <h1>Créer un chapitre pour : {{ $cours->titre }}</h1>  <!-- Utiliser $cours ici -->

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('chapitre.store') }}" method="POST">
        @csrf
        <label for="title">Titre du Chapitre</label>
        <input type="text" name="title" id="title" required>
        
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
        </div> --}}
    
        {{-- <label for="cours_id">Cours associé</label>
        <select name="cours_id" id="cours_id">
            <option value="{{ $cours->id }}">{{ $cours->titre }}</option>  <!-- Assure-toi d'utiliser $cours ici -->  --}}
            {{-- @if($cours)
    <option value="{{ $cours->id }}">{{ $cours->titre }}</option>
@else
    <option disabled>Aucun cours sélectionné</option>
@endif --}}

        {{-- </select> --}}
        {{-- <div class="mb-3">
            <label for="cour" class="form-label">cour</label>
            <select class="form-select" id="cour" name="cour_id" required>
                <option value="">Sélectionner un cours</option>
                @foreach($cours as $cour)
                    <option value="{{ $cour->id }}">{{ $cour->titre }}</option>
                @endforeach
            </select>
        </div>
    
        <button type="submit">Créer le Chapitre</button>
    </form>
    
@endsection --}}

 
{{-- @extends('layouts.app')

@section('content')
    <h1>Créer un chapitre pour : {{ $cour->titre }}</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

   

    <form action="{{ route('chapitre.store') }}" method="POST">
        @csrf
        <label for="title">Titre du Chapitre</label>
        <input type="text" name="title" id="title" required>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
        </div>
    
        <label for="cours_id">Cours associé</label>
        <select name="cours_id" id="cours_id">
            <option value="{{ $cours->id }}">{{ $cours->titre }}</option>
        </select>
    
        <button type="submit">Créer le Chapitre</button>
    </form>
    
@endsection  --}}

{{-- <form action="{{ route('cour.chapitre.store', $cour->id) }}" method="POST">
     
    @csrf 
          <input type="hidden" name="cour_id" value="{{ $cour->id }}">
         <div class="mb-3">
            <label for="titre" class="form-label">Titre du chapitre</label>
            <input type="text" name="titre" id="titre" class="form-control" value="{{ old('titre') }}" required>
        </div>
    
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
        </div>
        <button type="submit">Ajouter</button>
    </form> --}}


    @extends('layouts.app')

    @section('content')
        <h1>Créer un chapitre</h1>
    
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form action="{{ route('chapitre.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titre du Chapitre</label>
                <input type="text" name="titre" id="title" class="form-control" required value="{{ old('titre') }}">
            </div>
    
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" required>{{ old('description') }}</textarea>
            </div>
    
            <div class="mb-3">
                <label for="cour" class="form-label">Cours associé</label>
                <select class="form-select" id="cour" name="cour_id" required>
                    <option value="">Sélectionner un cours</option>
                    @foreach($Cours as $cour) <!-- Utilisation de $listeCours pour éviter la confusion -->
                        <option value="{{ $Cours->id }}">{{ $Cours->titre }}</option>
                        @if(isset($cours))
    <p>Le cours existe : {{ $cours->id }}</p>
@else
    <p>Le cours est introuvable !</p>
@endif

                    @endforeach
                </select>
            </div>
            
            
    
            <button type="submit" class="btn btn-primary">Créer le Chapitre</button>
            <a href="{{ route('categorie.index') }}" class="btn btn-secondary">Annuler</a>

        </form>
    @endsection  


    {{-- @extends('layouts.app')
    @section('body-class','bg-blue')
@section('content')
<div class="container mt-5">
    <h2 class="text-center">Créer un nouveau chapitre</h2>
    <div class="card p-4 shadow-lg">
        <form action="{{ route('chapitre.store') }}" method="POST">
            @csrf
            <input type="hidden" name="cours_id" value="{{ $listCours->id }}">
            
            <div class="mb-3">
                <label for="titre" class="form-label">Titre du chapitre</label>
                <input type="text" class="form-control" id="titre" name="titre" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="cour" class="form-label">Cours associé</label>
                <select class="form-select" id="cour" name="cours_id" required>
                    <option value="">Sélectionner un cours</option>
                    @foreach($listCours as $cour) <!-- Utilisation de $listeCours pour éviter la confusion -->
                        <option value="{{ $listCours->id }}">{{ $listCours->titre }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Créer</button>
            <a href="{{ route('cour.show', $listCours->id) }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection
 --}}

    








