<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Courses;
use App\Models\Lesson;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    public function index(Courses $course)
    {
        $lessons = $course->lessons;
        return view('lessons.index', compact('course', 'lessons'));
    }

    public function create(Courses $course)
    {
        return view('lessons.create', compact('course'));
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'video' => 'required|mimes:mp4,mov,avi|max:500000',
        'duration' => 'required|integer',
        'position' => 'required|integer',
        'is_preview' => 'boolean',
        'course_id' => 'required|exists:courses,id'  // Ajoutez cette validation
    ]);
    
    $videoPath = $request->file('video')->store('lessons', 'public');
    
    $lesson = new Lesson([
        'title' => $request->title,
        'description' => $request->description,
        'video_url' => $videoPath,
        'duration' => $request->duration,
        'position' => $request->position,
        'is_preview' => $request->is_preview ?? false,
        'course_id' => $request->course_id  // Récupérez course_id du formulaire
    ]);
    
    $lesson->save();
    
    return redirect()->route('lessons.index')
        ->with('success', 'Leçon créée avec succès!');
}

    public function show(Courses $course, Lesson $lesson)
    {
        $lesson = $course->lesson; // ou une autre façon de récupérer les leçons
        $nextLesson = Lesson::where('course_id', $course->id)
            ->where('position', '>', $lesson->position)
            ->orderBy('position')
            ->first();
            
        $previousLesson = Lesson::where('course_id', $course->id)
            ->where('position', '<', $lesson->position)
            ->orderBy('position', 'desc')
            ->first();
            
        $comments = $lesson->comments()->with('user')->latest()->get();
        $userRating = Auth::check() ? 
            Rating::where('lesson_id', $lesson->id)
                ->where('user_id', Auth::id())
                ->first() : null;
                
        return view('lessons.show', compact(
            'course', 
            'lesson', 
            'nextLesson', 
            'previousLesson', 
            'comments', 
            'userRating'
        ));
    }

    public function edit(Courses $course, Lesson $lesson)
    {
        return view('lessons.edit', compact('course', 'lesson'));
    }

    public function update(Request $request, Courses $course, Lesson $lesson)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'video' => 'nullable|mimes:mp4,mov,avi|max:500000',
            'duration' => 'required|integer',
            'position' => 'required|integer',
            'is_preview' => 'boolean'
        ]);

        if ($request->hasFile('video')) {
            // Delete old video
            if ($lesson->video_url) {
                Storage::disk('public')->delete($lesson->video_url);
            }
            $videoPath = $request->file('video')->store('lessons', 'public');
            $lesson->video_url = $videoPath;
        }

        $lesson->title = $request->title;
        $lesson->description = $request->description;
        $lesson->duration = $request->duration;
        $lesson->position = $request->position;
        $lesson->is_preview = $request->is_preview ?? false;
        $lesson->save();

        // return redirect()->route('courses.lessons.index', $course)
        return redirect()->route('lessons.index', $course)
            ->with('success', 'Leçon mise à jour avec succès!');
    }

    public function destroy(Courses $course, Lesson $lesson)
    {
        // Delete video file
        if ($lesson->video_url) {
            Storage::disk('public')->delete($lesson->video_url);
        }
        
        // Delete comments & ratings
        Comment::where('lesson_id', $lesson->id)->delete();
        Rating::where('lesson_id', $lesson->id)->delete();
        
        $lesson->delete();

        // return redirect()->route('courses.lessons.index', $course)
        return redirect()->route('lessons.index', $course)
            ->with('success', 'Leçon supprimée avec succès!');
    }
    
    public function addComment(Request $request, Courses $course, Lesson $lesson)
    {
        $request->validate([
            'content' => 'required|string'
        ]);
        
        $comment = new Comment([
            'content' => $request->content,
            'lesson_id' => $lesson->id,
            'user_id' => Auth::id()
        ]);
        
        $comment->save();
        
        return back()->with('success', 'Commentaire ajouté avec succès!');
    }
    
    public function rate(Request $request, Courses $course, Lesson $lesson)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5'
        ]);
        
        $rating = Rating::updateOrCreate(
            [
                'lesson_id' => $lesson->id,
                'user_id' => Auth::id()
            ],
            [
                'value' => $request->rating
            ]
        );
        
        return back()->with('success', 'Note ajoutée avec succès!');
    }
}

