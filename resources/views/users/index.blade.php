@if(auth()->user()->role === 'admin')
    <a href="{{ route('users.index') }}">Gérer les utilisateurs</a>
@endif
