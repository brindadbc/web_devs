<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChapitreController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeconController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SuivreController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Models\Contact;
use App\Models\Courses;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('welcome');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified',])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::resource('contact', ContactController::class);




Route::get('courses/indexs', [CoursesController::class, 'indexs'])->name('courses.indexs');
Route::get('courses/{course}/lessons', [CoursesController::class, 'lessons'])->name('courses.lessons');
Route::get('courses/{course}/lessons/{lesson}', [CoursesController::class, 'showLesson'])->name('courses.showLesson');
Route::get('courses/{course}/create_lesson', [CoursesController::class, 'createLesson'])->name('courses.createLesson');
Route::post('courses/{course}/lessons', [CoursesController::class, 'storeLesson'])->name('courses.storeLesson');
Route::get('courses/{course}/lessons/{lesson}/edit', [CoursesController::class, 'editLesson'])->name('courses.editLesson');
Route::put('courses/{course}/lessons/{lesson}', [CoursesController::class, 'updateLesson'])->name('courses.updateLesson');
Route::delete('courses/{course}/lessons/{lesson}', [CoursesController::class, 'destroyLesson'])->name('courses.destroyLesson');

Route::get('/courses/{course_id}/lessons/{lesson_id}', [CoursesController::class, 'showLesson'])
    ->name('courses.show_lesson');
Route::resource('categories', CategoryController::class);



Route::resource("courses", CoursesController::class);
Route::resource("About", AboutController::class);


    







// Group middleware for authentication
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard')->middleware('role:admin');
    Route::get('/teacher/dashboard', [TeacherController::class, 'index'])->name('teacher.dashboard')->middleware('role:teacher');
    Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student.dashboard')->middleware('role:student');
    Route::get('/admin/indexs', [AdminController::class, 'indexs'])->name('admin.indexs')->middleware('role:admin');
    Route::get('/admin/edit', [AdminController::class, 'edit'])->name('admin.edit')->middleware('role:admin');
    Route::get('/admin/destroy', [AdminController::class, 'destroy'])->name('admin.destroy')->middleware('role:admin');
    Route::get('/admin/update', [AdminController::class, 'update'])->name('admin.update')->middleware('role:admin');


});

// General dashboard route (optional)
Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif (auth()->user()->role === 'teacher') {
        return redirect()->route('teacher.dashboard');
    } elseif (auth()->user()->role === 'student') {
        return redirect()->route('student.dashboard');
    }

    return abort(404); // Show error if role is unknown
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Authentication routes
require __DIR__.'/auth.php';





Route::middleware(['auth', 'verified'])->group(function () {
    // Commentaires
    Route::post('/courses/{course}/lessons/{lesson}/comment', [CoursesController::class, 'addComment'])->name('courses.lessons.comment');
    Route::delete('/courses/{course}/lessons/{lesson}/comments/{comment}', [CoursesController::class, 'deleteComment'])->name('courses.lessons.comment.delete');
    
    // Notation
    Route::post('/courses/{course}/lessons/{lesson}/rate', [CoursesController::class, 'rateLesson'])->name('courses.lessons.rate');
    
    // Like
    Route::post('/courses/{course}/lessons/{lesson}/like', [CoursesController::class, 'toggleLikeLesson'])->name('courses.lessons.like');
    
    // Favoris
    Route::post('/courses/{course}/lessons/{lesson}/favorite', [CoursesController::class, 'toggleFavoriteLesson'])->name('courses.lessons.favorite');
    
    // Page des favoris
    Route::get('/favorites', [CoursesController::class, 'userFavorites'])->name('courses.favorites');
});

Route::middleware(['auth'])->group(function () {
    // Routes pour le chat
    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
    Route::get('/chat/create', [ChatController::class, 'create'])->name('chat.create');
    Route::post('/chat', [ChatController::class, 'store'])->name('chat.store');
    Route::get('/chat/{conversation}', [ChatController::class, 'show'])->name('chat.show');
    Route::post('/chat/{conversation}/message', [ChatController::class, 'sendMessage'])->name('chat.message.send');
    // Route pour les messages
    Route::post('/chat/{conversation}/messages', [MessageController::class, 'store'])->name('messages.store');
    
    // Routes pour les fichiers
    Route::post('/chat/{conversation}/files', [FileController::class, 'store'])->name('files.store');
    Route::get('/files/{file}/download', [FileController::class, 'download'])->name('files.download');
});

// Routes pour les canaux de diffusion
Broadcast::channel('conversation.{conversationId}', function ($user, $conversationId) {
    return $user->conversations->contains($conversationId);
}); 

// Route pour enregistrer les messages
Route::post('/contact', [App\Http\Controllers\MessageController::class, 'store'])->name('contact.store');

// Routes pour l'admin (protégées par middleware)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/messages', [App\Http\Controllers\MessageController::class, 'index'])->name('admin.messages.index');
    Route::get('/admin/messages/{message}', [App\Http\Controllers\MessageController::class, 'show'])->name('admin.messages.show');
    Route::delete('/admin/messages/{message}', [App\Http\Controllers\MessageController::class, 'destroy'])->name('admin.messages.destroy');
});

