@extends('layouts.app')

@section('content')
<div class="container">
    <section class="page-header" style="background-color: {{ $category->color }}20;">
        <h1 class="page-title">Catégorie: <span class="highlight">{{ $category->name }}</span></h1>
        <p class="page-description">{{ $category->description }}</p>
    </section>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Cours dans cette catégorie</h2>
        <div>
            <a href="{{ route('categories.edit', $category) }}" class="btn btn-secondary">Modifier la catégorie</a>
            <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Retour aux catégories</a>
        </div>
    </div>

    <div class="courses-grid">
        @forelse($courses as $course)
        <div class="course-card">
            <div class="course-image {{ strtolower($category->name) }}" style="background-color: {{ $category->color }}20;">
                <img src="{{ $course->image_url ?? '/api/placeholder/80/80' }}" alt="{{ $course->title }}">
                <div class="course-tag" style="background-color: {{ $category->color }};">{{ $category->name }}</div>
                @if(isset($course->is_featured) && $course->is_featured)
                <div class="course-tag" style="right: 15px; left: auto; background-color: #48B899;">Featured</div>
                @endif
            </div>
            <div class="course-content">
                <h3 class="course-title">{{ $course->title }}</h3>
                <div class="course-instructor">
                    <div class="instructor-avatar"></div>
                    <div class="instructor-name">{{ $course->instructor_name }}</div>
                </div>
                <div class="course-stats">
                    <div class="course-stat">
                        <span>⭐</span>
                        <span>{{ $course->rating ?? '0' }}</span>
                    </div>
                    <div class="course-stat">
                        <span>👥</span>
                        <span>{{ $course->students_count ?? '0' }}</span>
                    </div>
                    <div class="course-price">{{ $course->formatted_price ?? '$0' }}</div>
                </div>
                <div class="mt-3 d-flex justify-content-between">
                    <a href="{{ route('courses.lessons', $course) }}" class="btn btn-sm btn-primary">Voir</a>
                    <a href="{{ route('courses.edit', $course) }}" class="btn btn-sm btn-secondary">Modifier</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info">Aucun cours trouvé dans cette catégorie. <a href="{{ route('courses.create') }}">Créez-en un maintenant</a>.</div>
        </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $courses->links() }}
    </div>
</div>
@endsection