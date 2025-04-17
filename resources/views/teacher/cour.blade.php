{{-- @extends('layouts.app')
@section('body-class','bg-b-b') 
@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Mes cours créés</h2>
    <div class="row">
        @foreach($cours as $cour)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-titre">{{ $cour->titre }}</h5>
                        <p class="card-text">{{ $cour->description }}</p>
                        <a href="#" class="btn btn-primary">Modifier</a>
                        <a href="#" class="btn btn-danger">Supprimer</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection --}}

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Mes Cours Créés</h2>
    <a href="{{ route('teacher.create_cour') }}" class="btn btn-success mb-3">Ajouter un nouveau cours</a>

    <div class="row">
        @foreach($courses as $course)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->titre }}</h5>
                        <p class="card-text">{{ Str::limit($course->description, 100) }}</p>
                        <a href="{{ route('teacher.edit_cour', $course->id) }}" class="btn btn-primary">Modifier</a>
                        <form action="{{ route('teacher.delete_cour', $course->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

