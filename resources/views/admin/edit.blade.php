@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Modifier l'utilisateur : {{ $user->name }}</h2>
    
    <form action="{{ route('admin.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="role" class="form-label">Rôle</label>
            <select name="role" id="role" class="form-control">
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Administrateur</option>
                <option value="teacher" {{ $user->role === 'teacher' ? 'selected' : '' }}>Enseignant</option>
                <option value="student" {{ $user->role === 'student' ? 'selected' : '' }}>Étudiant</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
    </form>
</div>
@endsection
