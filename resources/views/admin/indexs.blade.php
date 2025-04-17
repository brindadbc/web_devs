@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Gestion des utilisateurs</h2>
    
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
                {{-- <th>Avatar</th> --}}
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->role) }}</td>
                    {{-- <td>
                        <img src="{{ $user->getAvatarUrl() }}" width="40" height="40" class="rounded-circle">
                    </td> --}}
                    <td>
                        <a href="{{ route('admin.edit', $user) }}" class="btn btn-sm btn-primary">Modifier</a>
                        {{-- <form action="{{ route('admin.destroy', $user) }}" method="POST" class="d-inline"> --}}
                            <form action="{{ route('admin.destroy', $user->id) }}" method="POST" class="delete-form d-inline">

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                        </form>
                        {{-- <form action="{{ route('admin.destroy', $user) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(event)">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
