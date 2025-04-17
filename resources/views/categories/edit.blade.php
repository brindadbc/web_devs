@extends('layouts.app')

@section('content')
<div class="container">
    <section class="page-header">
        <h1 class="page-title">Modifier la <span class="highlight">Catégorie</span></h1>
        <p class="page-description">Modifiez les détails de la catégorie.</p>
    </section>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('categories.update', $category) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="name" class="form-label">Nom de la catégorie</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $category->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $category->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="color" class="form-label">Couleur</label>
                    <input type="color" class="form-control form-control-color @error('color') is-invalid @enderror" id="color" name="color" value="{{ old('color', $category->color) }}">
                    @error('color')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="d-flex justify-content-between">
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Annuler</a>
                    <button type="submit" class="cta-button">Mettre à jour la catégorie</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection