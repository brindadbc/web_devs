@extends('layouts.app')

@section('content')
<div class="container">
    <section class="page-header">
        <h1 class="page-title">Edit <span class="highlight">Course</span></h1>
        <p class="page-description">Update course details and information.</p>
    </section>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('courses.update', $course) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="title" class="form-label">Course Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $course->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description', $course->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                {{-- <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="price" class="form-label">Price ($)</label>
                        <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $course->price) }}" required>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    
                    {{-- <div class="col-md-6">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category }}" {{ old('category', $course->category) == $category ? 'selected' : '' }}>{{ $category }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div> --}}
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="instructor_name" class="form-label">Instructor Name</label>
                        <input type="text" class="form-control @error('instructor_name') is-invalid @enderror" id="instructor_name" name="instructor_name" value="{{ old('instructor_name', $course->instructor_name) }}" required>
                        @error('instructor_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label for="image" class="form-label">Course Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                        @if($course->image)
                            <div class="mt-2">
                                <small class="text-muted">Current image:</small>
                                <div class="mt-1">
                                    <img src="{{ $course->image_url }}" alt="{{ $course->title }}" style="max-height: 100px;">
                                </div>
                            </div>
                        @endif
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="category_id" class="form-label">Catégorie</label>
                    <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                        <option value="">Sélectionner une catégorie</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="rating" class="form-label">Rating (1-5)</label>
                        <input type="number" min="1" max="5" class="form-control @error('rating') is-invalid @enderror" id="rating" name="rating" value="{{ old('rating', $course->rating) }}">
                        @error('rating')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="lessons_count" class="form-label">Number of Lessons</label>
                        <input type="number" min="0" class="form-control @error('lessons_count') is-invalid @enderror" id="lessons_count" name="lessons_count" value="{{ old('lessons_count', $course->lessons_count) }}">
                        @error('lessons_count')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label for="hours_count" class="form-label">Course Hours</label>
                        <input type="number" min="0" class="form-control @error('hours_count') is-invalid @enderror" id="hours_count" name="hours_count" value="{{ old('hours_count', $course->hours_count) }}">
                        @error('hours_count')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('courses.indexs') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="cta-button" style="border: none;">Update Course</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection