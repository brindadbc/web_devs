@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Mes cours suivis</h2>
    <div class="row">
        @foreach($cours as $cour)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $cour->title }}</h5>
                        <p class="card-text">{{ $cour->description }}</p>
                        <a href="{{ route('student.lecon', $cour->id) }}" class="btn btn-primary">Voir le cours</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
