@extends('layouts.app')

@section('content')
<div class="container">
    <section class="page-header">
        <h1 class="page-title">Gérer les <span class="highlight">Catégories</span></h1>
        <p class="page-description">Créez, modifiez et gérez les catégories de cours.</p>
    </section>

    @if(session('success'))
    <div class="alert alert-success mb-4" role="alert">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger mb-4" role="alert">
        {{ session('error') }}
    </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Toutes les catégories</h2>
        <a href="{{ route('categories.create') }}" class="cta-button">Ajouter une catégorie</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Couleur</th>
                    <th>Nombre de cours</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($category->description, 50) }}</td>
                    <td>
                        <div style="width: 30px; height: 30px; background-color: {{ $category->color }}; border-radius: 50%;"></div>
                    </td>
                    <td>{{ $category->courses_count }}</td>
                    <td class="d-flex">
                        <a href="{{ route('categories.show', $category) }}" class="btn btn-sm btn-primary me-2">Voir</a>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-secondary me-2">Modifier</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Aucune catégorie trouvée. <a href="{{ route('categories.create') }}">Créez-en une maintenant</a>.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $categories->links() }}
    </div>
</div>
@endsection