@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-4">
        <a href="{{ route('courses.indexs') }}" class="btn btn-outline-secondary">
            <span>&larr; retour à la page des cours</span>
        </a>
    </div>

    <section class="featured-section" style="padding: 40px; margin-bottom: 30px;">
        <div class="featured-course">
            <div class="featured-image">
                <img src="{{ $course->image_url }}" alt="{{ $course->title }}" style="max-width: 100%; height: auto;">
            </div>
            <div class="featured-content">
                @if($course->is_featured)
                <div class="featured-tag">Featured Course</div>
                @endif
                {{-- <div class="course-tag">{{ $course->category }}</div> --}}
                <h3 class="featured-title">{{ $course->title }}</h3>
                <p class="featured-description">{{ $course->description }}</p>
                
                <div class="featured-stats">
                    @if($course->hours_count)
                    <div class="featured-stat">
                        <div class="stat-value">{{ $course->hours_count }} Hours</div>
                        <div class="stat-label">Course Length</div>
                    </div>
                    @endif
                    
                    @if($course->lessons_count)
                    <div class="featured-stat">
                        <div class="stat-value">{{ $course->lessons_count }} Lessons</div>
                        <div class="stat-label">Total Lessons</div>
                    </div>
                    @endif
                    
                    <div class="featured-stat">
                        <div class="stat-value">{{ $course->rating }}.0 ⭐</div>
                        <div class="stat-label">Rating</div>
                    </div>
                    
                    <div class="featured-stat">
                        <div class="stat-value">{{ $course->students_count }}</div>
                        <div class="stat-label">Students</div>
                    </div>
                </div>
                
                <div class="mt-4">
                    <div class="instructor-info mb-4">
                        <h5>Instructor</h5>
                        <div class="course-instructor" style="margin-top: 10px;">
                            <div class="instructor-avatar"></div>
                            <div class="instructor-name">{{ $course->instructor_name }}</div>
                        </div>
                    </div>
                    
                    {{-- <div class="price-info">
                        <h5>Price</h5>
                        <div class="course-price" style="font-size: 24px; margin-top: 5px;">{{ $course->formatted_price }}</div>
                    </div> --}}
                </div>
                
                <div class="d-flex gap-3 mt-4">
                    <a href="{{ route('courses.edit', $course) }}" class="cta-button" style="background-color: #48B899;">Edit Course</a>
                    <form action="{{ route('courses.destroy', $course) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this course?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="cta-button" style="background-color: #ff4d4d;">Delete Course</button>
                    </form>
                    <a href="{{ route('courses.lessons', $course) }}" class="cta-button" style="background-color: #1714cf;">Voir les lecons</a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection