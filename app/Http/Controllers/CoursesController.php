<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment as ModelsComment;
use App\Models\Courses;
use App\Models\Lesson;
use App\Models\LessonFavorite;
use App\Models\LessonLike;
use App\Models\LessonRating;
use Dom\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CoursesController extends Controller
{
    public function __construct(){
       
        $this->middleware(["auth", "verified"])->except([ "index","indexs"]);

      
        
    }
    public function indexs()
    {
        

        // $courses = Courses::latest()->paginate(6);
        $courses = Courses::with('category')->latest()->paginate(6);
        return view('courses.indexs', compact('courses'));
    }


    public function index()
    {
        // $courses = Courses::latest()->paginate(6);
        // return view('courses.index', compact('courses'));
        return view('courses.index');
    }

    /**
     * Show the form for creating a new course.
     */
    public function create()
    {
       
       
        // $categories = ['Design', 'Development', 'Marketing', 'Business', 'Photography', 'Writing', 'Music'];
        $categories = Category::all();
        // $categories = Category::select('id', 'name')->get();
        return view('courses.create', compact('categories'));
    }

    /**
     * Store a newly created course.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            // 'price' => 'required|numeric|min:0',
           'category_id' => 'required|exists:categories,id',
            'instructor_name' => 'required|string|max:255',
            'rating' => 'nullable|integer|min:0|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'lessons_count' => 'nullable|integer|min:0',
            'hours_count' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('courses', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['is_featured'] = $request->has('is_featured');

        Courses::create($validated);

        return redirect()->route('courses.indexs')
            ->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified course.
     */
    public function show(Courses $course)
    {
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified course.
     */
    public function edit(Courses $course)
    {
        $categories = Category::all();
        // $categories = ['Design', 'Development', 'Marketing', 'Business', 'Photography', 'Writing', 'Music'];
        return view('courses.edit', compact('course', 'categories'));
    }

    /**
     * Update the specified course.
     */
    public function update(Request $request, Courses $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            // 'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'instructor_name' => 'required|string|max:255',
            'rating' => 'nullable|integer|min:0|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'lessons_count' => 'nullable|integer|min:0',
            'hours_count' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($course->image) {
                Storage::disk('public')->delete($course->image);
            }
            
            $imagePath = $request->file('image')->store('courses', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['is_featured'] = $request->has('is_featured');

        $course->update($validated);

        return redirect()->route('courses.indexs')
            ->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified course.
     */
    public function destroy(Courses $course)
    {
        // Delete the course image if it exists
        if ($course->image) {
            Storage::disk('public')->delete($course->image);
        }
        
        $course->delete();

        return redirect()->route('courses.indexs')
            ->with('success', 'Course deleted successfully.');
      
    }

    public function lessons($id)
    {
        $course = Courses::findOrFail($id);
        $lessons = $course->lessons()->orderBy('order')->get();
        return view('courses.lessons', compact('course', 'lessons'));
    }
    
    // public function showLesson($course_id, $lesson_id)
    // {
    //     $course = Courses::findOrFail($course_id);
    //     $lesson = Lesson::findOrFail($lesson_id);
    //     $nextLesson = Lesson::where('course_id', $course_id)
    //                         ->where('order', '>', $lesson->order)
    //                         ->orderBy('order')
    //                         ->first();
    //     $prevLesson = Lesson::where('course_id', $course_id)
    //                         ->where('order', '<', $lesson->order)
    //                         ->orderBy('order', 'desc')
    //                         ->first();
    //     $courseLessons = $course->lessons()->orderBy('order')->get();
                            
    //     return view('courses.show_lesson', compact('course', 'lesson', 'nextLesson', 'prevLesson','courseLessons'));
    // }
    
    public function createLesson($course_id)
    {
        $course = Courses::findOrFail($course_id);
        
        return view('courses.create_lesson', compact('course'));
    }
    
    

    public function storeLesson(Request $request, $course_id)
    {
        // Base validation pour les champs communs
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'video_type' => 'required|in:youtube,vimeo,upload,embed',
            'duration' => 'nullable|string',
            'order' => 'required|integer',
        ];
        
        // Ajouter des règles spécifiques selon le type de vidéo
        switch ($request->input('video_type')) {
            case 'youtube':
                $rules['youtube_id'] = 'required|string';
                break;
            case 'vimeo':
                $rules['vimeo_url'] = 'required|string';
                break;
            case 'upload':
                $rules['video_file'] = 'required|file|mimes:mp4,mov,ogg,webm|max:100000';
                break;
            case 'embed':
                $rules['video_embed'] = 'required|string';
                break;
        }
        
        $validated = $request->validate($rules);
        
        $course = Courses::findOrFail($course_id);
        
        $lesson = new Lesson();
        $lesson->course_id = $course_id;
        $lesson->title = $validated['title'];
        $lesson->description = $validated['description'];
        $lesson->video_type = $validated['video_type'];
        $lesson->duration = $validated['duration'] ?? '00:00';
        $lesson->order = $validated['order'];
        
        if ($validated['video_type'] == 'youtube') {
            // Extract YouTube ID from input
            $youtubeInput = $request->input('youtube_id');
            $youtubeId = $youtubeInput;
            
            // Extract ID from a complete YouTube URL
            if (strpos($youtubeInput, 'youtube.com') !== false) {
                parse_str(parse_url($youtubeInput, PHP_URL_QUERY), $params);
                if (isset($params['v'])) {
                    $youtubeId = $params['v'];
                }
            } else if (strpos($youtubeInput, 'youtu.be') !== false) {
                $youtubeId = substr(parse_url($youtubeInput, PHP_URL_PATH), 1);
            }
            
            $lesson->video_url = $youtubeId;
        } elseif ($validated['video_type'] == 'vimeo') {
            // Extract Vimeo ID from URL if needed
            $vimeoInput = $request->input('vimeo_url');
            // Simple extraction - you might need more complex logic
            $vimeoId = preg_replace('/[^0-9]/', '', $vimeoInput);
            $lesson->video_url = $vimeoId;
        } elseif ($validated['video_type'] == 'upload') {
            // Handle file upload
            $path = $request->file('video_file')->store('lessons', 'public');
            $lesson->video_url = $path;
        } else {
            // Embed code
            $lesson->video_url = $request->input('video_embed');
        }
        
        $lesson->save();
        
        return redirect()->route('courses.lessons', $course_id)
            ->with('success', 'Leçon ajoutée avec succès!');
    }
    
    public function editLesson($course_id, $lesson_id)
    {
        $course = Courses::findOrFail($course_id);
        $lesson = Lesson::findOrFail($lesson_id);
        return view('courses.edit_lesson', compact('course', 'lesson'));
    }
    
    public function updateLesson(Request $request, $course_id, $lesson_id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'video_type' => 'required|in:youtube,vimeo,upload,embed',
            'video_url' => 'nullable|string',
            'video_file' => 'nullable|file|mimes:mp4,mov,ogg,webm|max:100000',
            'duration' => 'nullable|string',
            'order' => 'required|integer',
        ]);
        
        $lesson = Lesson::findOrFail($lesson_id);
        $lesson->title = $validated['title'];
        $lesson->description = $validated['description'];
        $lesson->duration = $validated['duration'] ?? $lesson->duration;
        $lesson->order = $validated['order'];
        
        // Only update video if type or URL changed
        if ($lesson->video_type != $validated['video_type'] || 
            ($request->has('video_url') && $lesson->video_url != $validated['video_url']) ||
            $request->hasFile('video_file')) {
            
            $lesson->video_type = $validated['video_type'];
            
            if ($validated['video_type'] == 'youtube') {
                $video_id = $this->getYoutubeId($validated['video_url']);
                $lesson->video_url = $video_id;
            } elseif ($validated['video_type'] == 'vimeo') {
                $video_id = $this->getVimeoId($validated['video_url']);
                $lesson->video_url = $video_id;
            } elseif ($validated['video_type'] == 'upload' && $request->hasFile('video_file')) {
                $path = $request->file('video_file')->store('lessons', 'public');
                $lesson->video_url = $path;
            } elseif ($validated['video_type'] == 'embed') {
                $lesson->video_url = $validated['video_url'];
            }
        }
        
        $lesson->save();
        
        return redirect()->route('courses.lessons', $course_id)
            ->with('success', 'Leçon mise à jour avec succès!');
    }
    
    public function destroyLesson($course_id, $lesson_id)
    {
        $lesson = Lesson::findOrFail($lesson_id);
        $lesson->delete();
        
        return redirect()->route('courses.lessons', $course_id)
            ->with('success', 'Leçon supprimée avec succès!');
    }
    
    private function getYoutubeId($url)
    {
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
        return isset($match[1]) ? $match[1] : $url;
    }
    
    private function getVimeoId($url)
    {
        preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $url, $match);
        return isset($match[3]) ? $match[3] : $url;
    }

    public function showLesson($course_id, $lesson_id)
    {
        $course = Courses::findOrFail($course_id);
        $lesson = Lesson::findOrFail($lesson_id);
        $nextLesson = Lesson::where('course_id', $course_id)
                            ->where('order', '>', $lesson->order)
                            ->orderBy('order')
                            ->first();
        $prevLesson = Lesson::where('course_id', $course_id)
                            ->where('order', '<', $lesson->order)
                            ->orderBy('order', 'desc')
                            ->first();
        $courseLessons = $course->lessons()->orderBy('order')->get();
        
        // Récupérer les commentaires avec les informations utilisateur
        $comments = $lesson->comments()->with('user')->orderBy('created_at', 'desc')->get();
        
        // Vérifier si l'utilisateur authentifié a déjà liké ou favori cette leçon
        $userLiked = false;
        $userFavorited = false;
        $userRating = null;
        
        if (Auth::check()) {
            $userId = Auth::id();
            $userLiked = $lesson->isLikedByUser($userId);
            $userFavorited = $lesson->isFavoritedByUser($userId);
            $userRating = $lesson->getRatingByUser($userId);
        }
        
        return view('courses.show_lesson', compact(
            'course', 
            'lesson', 
            'nextLesson', 
            'prevLesson',
            'courseLessons',
            'comments',
            'userLiked',
            'userFavorited',
            'userRating'
        ));
    }
    
    // Les méthodes existantes...
    
    // Nouvelles méthodes pour les interactions
    
    public function addComment(Request $request, $course_id, $lesson_id)
    {
        $request->validate([
            'content' => 'required|string|min:3'
        ]);
        
        $comment = new ModelsComment();
        $comment->user_id = Auth::id();
        $comment->lesson_id = $lesson_id;
        $comment->content = $request->content;
        $comment->save();
        
        return redirect()->back()->with('success', 'Commentaire ajouté avec succès!');
    }
    
    public function deleteComment($course_id, $lesson_id, $comment_id)
    {
        $comment = ModelsComment::findorFail($comment_id);
        
        // Vérifier que l'utilisateur est le propriétaire du commentaire
        if ($comment->user_id != Auth::id()) {
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à supprimer ce commentaire.');
        }
        
        $comment->delete();
        return redirect()->back()->with('success', 'Commentaire supprimé avec succès!');
    }
    
    public function rateLesson(Request $request, $course_id, $lesson_id)
    {
        // Debug - check if we're receiving the rating
        // dd($request->all(), $request->rating);
        
        $request->validate([
            'rating' => 'required|integer|min:1|max:5'
        ]);
        
        // Upsert - Mettre à jour si existe, sinon créer
        LessonRating::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'lesson_id' => $lesson_id,
            ],
            [
                'rating' => $request->rating
            ]
        );
        
        return redirect()->back()->with('success', 'Votre note a été enregistrée!');
    }
    
    public function toggleLikeLesson(request $request,$course_id, $lesson_id)
    {
        $userId = Auth::id();
        
        $like = LessonLike::where('user_id', $userId)
                         ->where('lesson_id', $lesson_id)
                         ->first();
        
        if ($like) {
            // Si le like existe déjà, on le supprime
            $like->delete();
            $message = 'Like retiré!';
        } else {
            // Sinon, on crée un nouveau like
            LessonLike::create([
                'user_id' => $userId,
                'lesson_id' => $lesson_id,
            ]);
            $message = 'Leçon likée avec succès!';
        }
        
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'isLiked' => !$like, // État actuel après le toggle
                'likesCount' => Lesson::findOrFail($lesson_id)->likes()->count()
            ]);
        }
        
        return redirect()->back()->with('success', $message);
    }
    
    public function toggleFavoriteLesson( request $request ,$course_id, $lesson_id)
    {
        $userId = Auth::id();
        
        $favorite = LessonFavorite::where('user_id', $userId)
                                ->where('lesson_id', $lesson_id)
                                ->first();
        
        if ($favorite) {
            // Si le favori existe déjà, on le supprime
            $favorite->delete();
            $message = 'Retiré des favoris!';
        } else {
            // Sinon, on crée un nouveau favori
            LessonFavorite::create([
                'user_id' => $userId,
                'lesson_id' => $lesson_id,
            ]);
            $message = 'Ajouté aux favoris!';
        }
        
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'isFavorited' => !$favorite, // État actuel après le toggle
            ]);
        }
        
        return redirect()->back()->with('success', $message);
    }
    
    public function userFavorites()
    {
        $favoriteItems = LessonFavorite::where('user_id', Auth::id())
                                      ->with('lesson.course')
                                      ->get();
                                      
        return view('courses.favorites', compact('favoriteItems'));
    }
}
